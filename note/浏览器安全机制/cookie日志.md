1. session的一些问题
   对于session来说，sessionid是浏览器进行创建的，所以会存在同一个浏览器的登录界面在登录不同账号之后，sessionid相同的情况，
   但是session里面对应存放的数据不同
2. cookie和session的一些联系：
   - cookie可以存放一些小数据，更多是方便记录用户的一些偏好，而sessionid是一个特殊的东西，他更多的作用是作用于身份验证
   - session是存放于服务器内部的，而cookie是存放在浏览器之中的
3. httponly对cookie的限制作用：
   httponly限制了document文件直接读取cookie，但是在浏览器发送请求时不会影响，httponly于samesite共同搭建了cookie的安全
