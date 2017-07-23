<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>后台登录</title>
<link rel="stylesheet" type="text/css" href="/home/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/home/css/style.css">
<link rel="stylesheet" type="text/css" href="/home/css/login.css">
<link rel="apple-touch-icon-precomposed" href="/home/images/icon/icon.png">
<link rel="shortcut icon" href="images/icon/favicon.ico">
<script src="/home/js/jquery-2.1.4.min.js"></script>

</head>
<body class="user-select">
<div class="container">
  <div class="siteIcon"><img src="/home/images/icon/icon.png" alt="" data-toggle="tooltip" data-placement="top" title="2017往事随风" draggable="false" /></div>
  <form action="/admin/login" method="post" autocomplete="off" class="form-signin">
    <h2 class="form-signin-heading">开始你的表演</h2>{{ Session::get('info') }}
    <label for="userName" class="sr-only">账户</label>
    <input type="text" id="userName" name="username" class="form-control" placeholder="输入账户" required autofocus autocomplete="off" maxlength="10">
    <label for="userPwd" class="sr-only">密码</label>
    <input type="password" id="userPwd" name="password" class="form-control" placeholder="输入密码" required autocomplete="off" maxlength="18">
    <a href="main.html">
    {{ csrf_field() }}
    <button class="btn btn-lg btn-primary btn-block" type="submit" id="signinSubmit">登录</button></a>
  </form>

</div>
<script src="/home/js/bootstrap.min.js"></script> 
</body>
</html>
