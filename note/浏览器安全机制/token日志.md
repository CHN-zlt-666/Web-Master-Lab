- token放在session变量中，是因为攻击者无法拿到session，在一定程度上保护了token不被盗取

# token安全机制：

1. token为什么能够防御：
   通过f12能够看到hideen的input的input标签，用户可以轻易看到token，
   但是token安全在于攻击者拿不到并非用户能够看到
2. token自身安全机制：
   依赖于token的生命周期，根据不同需求配置得到的生命周期一定程度上保证了token的安全

# token存在的其他风险：

对于正常防御来讲，token是很难被攻击者拿到，但是如果存在xss攻击读取到token，那么token的防御机制则会失效，
所以xss能够打穿token防御机制，防御csrf的同时，需要做好对xss攻击的防御

# token的一些项目代码问题：

出现过这种问题

```php
....
$_SESSION['token'] = bin2hex(random_bytes(32));
....
```

会导致在后续php匹配token时出现问题，当html表单进行提交，走到php代码这里时，会生成一个新的token，
与表单进行提交的token不一致，采用以下方式进行解决：

```php
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
```

**csrf.php**文件可见
