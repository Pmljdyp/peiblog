<?php

?>
@extends('admin.index')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <h1 class="page-header">信息总览</h1>
      <div class="row placeholders">
        <div class="col-xs-6 col-sm-3 placeholder">
          <h4>文章</h4>
          <span class="text-muted">0 条</span> </div>
        <div class="col-xs-6 col-sm-3 placeholder">
          <h4>评论</h4>
          <span class="text-muted">0 条</span> </div>
        <div class="col-xs-6 col-sm-3 placeholder">
          <h4>友链</h4>
          <span class="text-muted">0 条</span> </div>
        <div class="col-xs-6 col-sm-3 placeholder">
          <h4>访问量</h4>
          <span class="text-muted">0</span> </div>
      </div>
      <h1 class="page-header">状态</h1>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <tbody>
            <tr>
              <td>登录者: <span>admin</span>，这是您第 <span>13</span> 次登录</td>
            </tr>
            <tr>
              <td>上次登录时间: 2016-01-08 15:50:28 , 上次登录IP: ::1:55570</td>
            </tr>
          </tbody>
        </table>
      </div>
      <h1 class="page-header">系统信息</h1>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr> </tr>
          </thead>
          <tbody>
            <tr>
              <td>管理员个数:</td>
              <td>2 人</td>
              <td>服务器软件:</td>
              <td>{{$ser['SERVER_SOFTWARE'] }}</td>
            </tr>
            <tr>
              <td>浏览器:</td>
              <td>{{ $ser['HTTP_USER_AGENT'] }}</td>
              <td>PHP版本:</td>
              <td><?PHP echo PHP_VERSION; ?></td>
            </tr>
            <tr>
              <td>操作系统:</td>
              <td><?PHP echo PHP_OS; ?></td>
              <td>PHP运行方式:</td>
              <td></td>
            </tr>
            <tr>
              <td>登录者IP:</td>
              <td>{{ $ip }}</td>
              <td>MYSQL版本:</td>
              <td>5.6</td>
            </tr>
            <tr>
              <td>程序版本:</td>
              <td class="version">YlsatCMS 1.0 <font size="-6" color="#BBB">(20160108160215)</font></td>
              <td>上传文件:</td>
              <td>可以 <font size="-6" color="#BBB">
              <?php
              echo get_cfg_var ("upload_max_filesize")?get_cfg_var ("upload_max_filesize"):"不允许上传附件";
              ?>
              </font></td>
            </tr>
            <tr>
              <td>程序编码:</td>
              <td>UTF-8</td>
              <td>当前时间:</td>
              <td><?php
                  echo date("Y-m-d G:i:s");
              ?></td>
            </tr>
          </tbody>
          <tfoot>
            <tr></tr>
          </tfoot>
        </table>
      </div>
      <footer>
        <h1 class="page-header">程序信息</h1>
        <div class="table-responsive">
        <table class="table table-striped table-hover">
          <tbody>
            <tr>
              <td><span style="display:inline-block; width:8em"></span></td>
            </tr>
            <tr>
            <script type="text/javascript">
               window.onload = function () {
                  var loadTime = window.performance.timing.domContentLoadedEventEnd-window.performance.timing.navigationStart; 
                 console.log('Page load time is '+ loadTime);
              }
            </script>
              <td><span style="display:inline-block;width:8em">页面加载时间</span> PROCESSED IN 1.0835s  SECONDS 更多模板：<a href="http://w

              ww.aspku.com/" target="_blank">源码之家</a></td>
            </tr>
          </tbody>
        </table>
        </div>
      </footer>
    </div>
@stop