- php危险函数并不是代表这些函数本身就是漏洞，而是攻击者能够控制这些函数的参数情况下，可以利用这些函数进行攻击

1. 命令执行类函数：
   - system( ) 执行系统命令，并且直接输出执行结果
   - exec( ) 执行系统命令，默认不直接输出，返回最后一行结果
   - shell_exec( ) 执行系统命令，并且返回完整输出内容
   - passthru( ) 执行系统命令，并输出原始执行结果。常用于执行二进制程序

2. 文件包含类：
   - include( )
   - require( ) 功能与include相似，但文件不存在时直接终止程序
   - include_once( ) 文件只包含一次
   - require_once( ) 在require函数基础上，只能进行一次

3. 文件操作类：
   - file_get_contents( ) 读取整个文件内容
   - file_put_contents( ) 向文件编写内容。同时原文件会被覆盖
   - fopen( ) 打开文件
   - fread( ) 读取文件
   - fwrite( ) 写入文件
   - unlink( ) 删除文件
   - rename( ) 重命名文件

4. 代码执行类：
   - eval( ) 执行字符串中的php代码

5. 序列化类：
   - serialize( ) 对象序列化
   - unserialize( ) 对象反序列化

6. 网络请求类：
   - curl_exec( ) 发送php请求
   - fsockopen( ) 建立socket连接

7. 数据库操作类：
   - mysqli_query( ) 执行sql语句
   - PDO::query( ) 执行sql语句
