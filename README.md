# Web-master —— Web安全漏洞学习平台

## 项目简介

Web-master是一个基于 php + mysql + phpstudy搭建的Windows环境下的Web安全学习平台。

项目围绕常见Web安全漏洞进行展开，对常见Web安全漏洞进行学习与实践。以“漏洞原理->漏洞模拟->漏洞利用->漏洞修复”的流程进行。实现了Web漏洞的学习与演示，适用于Web安全的基础学习，漏洞复现以及代码审计练习。同时，该项目也是一个对Web理论知识的实操与体现。

## 项目目标

- 理解常见Web漏洞的原理
- 能够复现漏洞
- 理解漏洞利用方式
- 编写对应的防御代码
- 提升开发与代码能力
- 加强代码审计能力
- 扩展Web安全的理论基础知识
- 培养从漏洞原理到安全防御的整体思想

## 项目特点

- 从零开始搭建PHP学习平台
- 包含漏洞演示、学习笔记和防御思路；各模块的可运行版本与验证范围见下文
- 不依赖于现成靶场进行Web安全学习，而是从源码出发，本质理解漏洞
- JWT，SSRF，XXE等模块较结合实际场景进行编写

## 项目目录树

```
  web-master/
  ├── web/
  │   ├── vuln/                    ← 漏洞靶场（sqli, xss, csrf, upload, include, command, deserialization, xxe, ssrf）
  │   ├── admin/                   ← 管理员页面（Session + JWT）
  │   ├── users/                   ← 用户页面（Session + JWT, 含越权）
  │   ├── css/                     ← 样式文件
  │   ├── index.php                ← 首页
  │   ├── login.php                ← 认证方式选择
  │   ├── login_session.php        ← 登录入口（Session 版）
  │   ├── login_jwt.php            ← 登录入口（JWT 版）
  │   ├── register.php             ← 注册
  │   └── tool/
  │       ├── jwt_tool.php         ← JWT 弱密钥爆破工具
  │       └── jwt_create.php       ← JWT 生成工具
  ├── includes/
  │   ├── db.php                   ← 数据库连接
  │   ├── auth.php                 ← 登录状态检查
  │   ├── jwt_function.php         ← JWT 生成与验证
  │   ├── header.php               ← 公共导航与页头
  │   └── footer.php               ← 公共页尾
  ├── note/                        ← 学习笔记（按模块 + 按安全机制分类）
  ├── database.sql                 ← 本地数据库初始化数据
  └── README.md
```

## 项目结构

主要分为以下三类:

1. web文件夹：
   - **vuln文件夹**：存放各类漏洞的源php代码
   - css文件夹：存放页面渲染所需要的代码
   - users和admin文件夹：users文件夹存放用户页面，admin为管理员页面。（jwt版本是用于后续的jwt学习内容）
   - 其他内容：  
     存放登录框代码和部分工具（弱密钥爆破以及根据密钥生成jwt工具）。通过login.php选择Session或JWT登录方式；工具位于web/tool目录。
2. note文件夹：

   该文件夹记录了此项目以来，不同漏洞的详细原理和搭建问题以及个人心得。
   - web security文件夹：存放基于浏览器攻击的笔记详细（该板块由于本人学过一部分内容的理论知识，所以部分笔记不是很详细）
   - 浏览器安全机制文件夹：更多存放的是这些漏洞下，浏览器有哪些特殊机制与防御方式
   - 服务器安全机制文件夹：存放基于服务器的漏洞的详细笔记，如：原理，防御方式，心得等。（该部分是最详细的笔记）
   - php_note文件夹：存放php学习时涉及到的函数以及php中较常见的危险函数
   - defence文件：记录了该项目中所有漏洞的防御方式以及防御思想
   - 攻击链文件：记录攻击链思路，当前实现和验证状态见下文

3. includes文件夹：存放数据库连接、认证函数和公共页面文件

## 已有学习模块

- sql注入 \*\*
- xss攻击 \*\*\*\*\*
- csrf \*\*
- 文件上传 \*\*\*
- 文件包含
- 命令注入 \*
- php反序列化 \*\*\*\*
- xxe \*\*\*\*
- ssrf \*\*\*
- jwt \*\*
- 越权 \*
- 此顺序也是自己学习的顺序，\*是对这些漏洞的难度评分。

## 模块组成

各模块围绕以下内容进行学习：

1. 漏洞环境
2. 漏洞利用
3. 漏洞修复

部分模块的防御仅记录在笔记或代码注释中，不能视为已运行并验证的修复版。反射型XSS模块已保留可切换的漏洞模式与HTML防御模式。

## 运行环境

- Windows + PHPStudy + Apache
- PHP 7.3.4（已确认本机命令行版本，站点版本以PHPStudy配置为准）
- MySQL 5.7.26（数据库初始化文件记录的版本）
- PHP扩展：mysqli、mysqlnd、GD、SimpleXML/libxml
- SSRF实验需要开启 `allow_url_fopen`
- phpMyAdmin用于数据库导入和管理

## 搭建方式

1. 将项目放入PHPStudy的WWW目录，站点根目录设置为项目的 `web` 目录。
2. 配置本地域名（例如 `web-master`），启动Apache与MySQL。
3. 在phpMyAdmin创建并选中 `websec` 数据库，导入项目根目录的 `database.sql`。
4. 修改 `includes/db.php`，填写本机的数据库连接信息。
5. 确保上传目录 `web/vuln/upload/uploads` 可写；XXE实验使用的日志目录也需要可写。
6. 访问 `http://web-master/` 进入首页，通过 `login.php` 选择Session或JWT登录方式。域名和端口按实际配置替换。

## 说明

该项目用于Web安全的基础学习，更适合基础较薄弱的学习者进行学习。这是作者的第一个项目，历史笔记记录了学习过程，描述与现有代码不一致时以当前实现为准。

本项目并非商业系统，而是本人学习Web安全全过程中自主设计并逐步完善的学习平台，用于记录漏洞原理，漏洞利用以及漏洞修复过程

## 作者

泽里鹈
