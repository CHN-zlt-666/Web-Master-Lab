# sql预处理语句

- $stmt=$conn->prepare(sql语句) 编译预处理语句
- $stmt->bind_param( ) 绑定参数
- $stmt->execue( ) 执行sql
- $stmt->get_result( ) 获取结果集
- $stmt->fetch_assoc( ) 获取一行数据
- $stmt->affected_rows( ) 查看影响行数

# xss防御函数

- htmlspecialchars() 将内容进行转义，浏览器将数据当作字符进行处理

# 文件上传函数：

- imagecreatefromjpeg( ) 对jepg类型的图片进行二次渲染
- uniqid( ) 随机生成字符串
- imagejpeg( ) 控制图片的存放位置
- image( ) 销毁图片
- 不同类型文件只需要更改函数后缀名

# session函数

- session_start( ) 创建session
- session_destroy( )
- session_get_cookie_params( ) 查看session配置
- session_set_cookie_params( ) 搭建session配置

  ```php
  session_set_cookie_params([
  "lifetime" => 3600, //cookie过期时间
  "path" => "/",
  "domain" => "",
  "secure" => false,//限制cookie只能通过https发送
  "httponly" => true,//禁止js读取cookie
  "samesite" => "Strict"//跨站cookie限制
  ]);
  ```

# cookie函数

- setcookie( ) 配置普通cookie的内容

  ```php
  setcookie(
    "test",
    "123",
    [
      "httponly" => true,
      "samesite" => "Strict"
    ]
  );
  ```

# hash加密函数：

- password_hash( ) 对数据进行哈希加密
- password_verify( ) 判断数据是否相同

# 字符串替代函数：

- str_replace( ) 将字符串中的某个字符进行替换

# jwt涉及到的函数

- json_encode( ) 把php数组转化为JSON字符串。JOSN_UNESCAPED_UNICODE字符串，写在该函数后，不让中文转成Unicode
- json_decode( ) 反函数
- base64_encode( ) 把二进制数据转为base64编码
- strtr( ) 字符串替换
- rtrim( ) 删除右侧字符
- hash_hmac( ) 使用密钥生成签名。带密钥的哈希算法
- explode( ) 按分隔符切割字符串
- list( ) 数组快速赋值
- str_repeat( ) 重复某个字符串
