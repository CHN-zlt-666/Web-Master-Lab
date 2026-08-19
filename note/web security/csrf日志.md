# csrf漏洞产生的原因：

攻击者利用浏览器在发送请求时，会自带受害者的sessionid，而浏览器无法确认这个请求是否来自于受害者本人，攻击者构造恶意界面引导受害者点击之后导致的csrf

- **本质上来讲：crsf攻击不是因为session的泄露，更多的是攻击者利用浏览器自动携带sessionid而产生的**

# csrf防御措施：

1. 通过samesite限制cookie在跨站请求的发送
2. 通过referer和origin检查进行防御
3. **通过token进行防御**(详细见token日志)
4. 进行xss防御

# html内容：

1. iframe标签：在一个网页里面嵌套一个网页，在csrf中作用于修改信息之后，页面不进行跳转，需要把form标签的target赋值为iframe标签的name

# 对于samesite机制的一些误区：

1. samesite机制需要在第一次登录的时候就进行设置，并且要设置在创建session之前，否则后面写了就没用
2. 为什么在最开始没有设置samesite，后续csrf还是没有进行：

- 基于浏览器默认设置为Lax，导致了csrf后续跨站cookie被拦截
