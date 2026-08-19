<?php
include "../../../includes/auth.php";
session_require_login();
include("classes.php");

$result = '';
if (isset($_GET['data']) && !empty($_GET['data'])) {
    /**
     * 为什么这里需要缓冲区？
     * 魔术方法的 echo 是在"触发的那一刻"直接输出的：
     * - unserialize() 触发 __wakeup  → 输出跑到导航栏上面（header 还没 include）
     * - 脚本结束时触发 __destruct    → 输出跑到 footer 下面
     * 它们的输出时机我们控制不了，但用 ob_start 可以把这些输出"拦进袋子里"，
     * 最后统一倒进 $result，想显示在哪就显示在哪。
     */
    ob_start();                              // ① 开袋：下面所有输出都被拦进缓冲区

    $obj = @unserialize($_GET['data']);      // ② 反序列化（__wakeup 若触发，输出进袋子）

    if ($obj === false) {                    // ③ 序列化字符串格式不对时返回 false
        ob_end_clean();                      //    袋子里的内容不要了，直接丢弃
        $result = "序列化数据解析失败";
    } else {
        // ④ 只有带 __toString 的类才能被 echo。
        //    你的三个类里只有 A_toString 有；echo 另外两个类的对象会直接致命错误
        if (is_object($obj) && method_exists($obj, '__toString')) {
            echo $obj;                       //    __toString 的输出进袋子
        }

        // ⑤ unset() 会立刻触发 __destruct。
        //    不 unset 的话 destruct 要等整个脚本跑完才执行，输出会落到 footer 下面
        unset($obj);                         //    __destruct 的输出也进袋子

        // ⑥ 取出袋子里的全部内容（字符串），同时关闭缓冲区
        $result = ob_get_clean();
    }
}

/*
$a = new A();
$a->b = new test();
$str = 'O:1:"A":1:{s:1:"b";O:1:"B":0:{}}';
$obj = unserialize($str);

$a1 = new A();
$a1->b = new C();
$a1->b->c = new faker();
$a1->b->c->cmd = "whoami";
$str = serialize($a1);
echo $str;
$str = 'O:1:"A":1:{s:1:"b";O:1:"C":1:{s:1:"c";O:5:"faker":1:{s:3:"cmd";s:12:"echo success";}}}';
$obj = unserialize($str);*/
// 通过后端直接修改代码进行的基础学习内容
?>

<?php
include "../../../includes/header.php";
?>
<div class="main-center">

    <div class="login-box">
        <div class="vuln-title">PHP反序列化靶场测试</div>
        <div class="vuln-desc">请输入序列化参数进行测试</div>
        <?php echo $result; ?>
        <form method="GET">
            <input type="text" name="data"> <br>
            <input type="submit" value="提交">
        </form>
    </div>
</div>
<?php
include "../../../includes/footer.php";
?>