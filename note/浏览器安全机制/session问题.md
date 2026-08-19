# 对于这里所提到的session分为以下几个点：

1. session的作用：
   服务器给用户建立的临时身份档案
   比如：用户登录之后，服务器记录信息，返回给浏览器一个session，然后浏览器每次访问都带上session
2. session的安全点在于：
   数据均保存在了服务器里面，而浏览器只接触的到session，也就是一个码字，而服务器根据session进行判断身份
3. 注意点：
   一个浏览器通常只有一个登录身份，就相当于只有一个session
   如果登陆了其他账号，前一个session会被后一个新session覆盖

# 在login.php中session的作用:

如果不存在session，用户可以在url中直接进行访问admin.php文件，就相当于拿到了管理员的权限，实现越权操作

# session的更多作用：

csrf中，用户点击一个恶意连接之后，服务器就是根据session来接收请求验明身份的

# session机制：

对于session来说，只要登录之后，在登录以后进行的任何操作均是会携带上session的，就类似于一个仓库，而session是这个仓库的钥匙
