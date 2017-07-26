
<!doctype html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>往事随风博客管理系统</title>
<link rel="stylesheet" type="text/css" href="/home/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/home/css/admin.css">
<link rel="stylesheet" type="text/css" href="/home/css/font-awesome.min.css">
<script type="text/javascript" src="/home/js/tagscloud.js"></script>
<link rel="apple-touch-icon-precomposed" href="">
<link rel="shortcut icon" href="images/icon/favicon.ico">
<script type="text/javascript" src="/home/js/laydate.js"></script>
<script src="/home/js/jquery-2.1.4.min.js"></script>
<!-- 广告 -->
<link rel="stylesheet" type="text/css" href="/home/css/css.css" />
<script type="text/javascript" src="/home/js/jquery.min.js"></script>
<!-- 屏蔽js代码错误信息 -->
<SCRIPT language=javascript> 
window.onerror=function(){return true;} 
</SCRIPT> 
<style type="text/css">
    body{ font-family:"微软雅黑", Arial, sans-serif;} #main{border:none; background:none;}
    body,ul,li,h1,h2,h3,p,form{margin:0;padding:0;}body{background:#fbfbfb;color:#444;font-size:14px;}
    a{color:#444;text-decoration:none;}a:hover{color:red;}
    #tagscloud{width:250px;height:260px;position:relative;font-size:12px;color:#333;margin:20px auto 0;text-align:center;}
    #tagscloud a{position:absolute;top:0px;left:0px;color:#333;font-family:Arial;text-decoration:none;margin:0 10px 15px 0;line-height:18px;text-align:center;font-size:12px;padding:1px 5px;display:inline-block;border-radius:3px;}
    #tagscloud a.tagc1{background:#666;color:#fff;}
    #tagscloud a.tagc2{background:#F16E50;color:#fff;}
    #tagscloud a.tagc5{background:#006633;color:#fff;}
    #tagscloud a:hover{color:#fff;background:#0099ff;}
</style>
</head>
<body class="user-select">
<section class="container-fluid">
  <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">切换导航</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="/">PMLJDYP</a> </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/tui" onClick="if(!confirm('是否确认退出？'))return false;">退出登录</a></li>
          </ul>
           <?php
            $name = \Cookie::get('name');
            if(!empty($name)){       
          ?>
          <ul class="nav navbar-nav navbar-right">
            <li><a >欢迎您：<span class="badge">往事随风</span></a></li>
          </ul>
          <?php
            }
          ?>
        </div>
      </div>
    </nav>
  </header>
  <div class="row">
    <aside class="col-sm-3 col-md-2 col-lg-2 sidebar">
      <ul class="nav nav-sidebar">
        <li class="active"><a href="/admin">首页</a></li>
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="/admin/jcwenzhang">文章管理</a></li>
        <li><a href="/admin/jcgonggao">公告管理</a></li>
       <!--  <li><a href="/admin/jcpinglun">评论</a></li> -->
<!--         <li><a data-toggle="tooltip" data-placement="bottom" title="网站暂无留言功能">留言</a></li> -->
      </ul>
      <ul class="nav nav-sidebar">
        <li><a href="/admin/jclanmu">栏目管理</a></li>
        <li><a href="/admin/jcbiaoqian">标签管理</a></li>
        <li><a href="/admin/jcguanggao">广告管理</a></li>
        </li>
      </ul>
      <ul class="nav nav-sidebar">
        <!-- <li><a class="dropdown-toggle" id="userMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">用户</a>
          <ul class="dropdown-menu" aria-labelledby="userMenu">
            <li><a data-toggle="modal" data-target="#areDeveloping">管理用户组</a></li>
            <li><a href="manage-user.html">管理用户</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="loginlog.html">管理登录日志</a></li>
          </ul>
        </li> -->
        <li>
          <a href="/admin/jcwangzhanpeizhi" class="dropdown-toggle" id="settingMenu">网站设置</a>
        </li>
      </ul>
    </aside>
    @yield('content')
  </div>
</section>

<!--个人登录记录模态框-->
<div class="modal fade" id="seeUserLoginlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" >登录记录</h4>
      </div>
      <div class="modal-body">
          <table class="table" style="margin-bottom:0px;">
            <thead>
              <tr>
                <th>登录IP</th>
                <th>登录时间</th>
                <th>状态</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>::1:55570</td>
                <td>2016-01-08 15:50:28</td>
                <td>成功</td>
              </tr>
              <tr>
                <td>::1:64377</td>
                <td>2016-01-08 10:27:44</td>
                <td>成功</td>
              </tr>
              <tr>
                <td>::1:64027</td>
                <td>2016-01-08 10:19:25</td>
                <td>成功</td>
              </tr>
              <tr>
                <td>::1:57081</td>
                <td>2016-01-06 10:35:12</td>
                <td>成功</td>
              </tr>
            </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">朕已阅</button>
      </div>
    </div>
  </div>
</div>

<script src="/home/js/bootstrap.min.js"></script> 
<script src="/home/js/admin-scripts.js"></script>
<script src="/home/js/bootstrap.min.js"></script> 

<!--summernote富文本编辑器-->
<link rel="stylesheet" type="text/css" href="/home/lib/summernote/summernote.css">
<script src="/home/lib/summernote/summernote.js"></script> 
<script src="/home/lib/summernote/lang/summernote-zh-CN.js"></script> 
<script>
$('#article-content').summernote({
  lang: 'zh-CN'
});
</script>
</body>
</html>
