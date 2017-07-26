<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>@if(empty($conf)) 佩的博客|往事随风 @else {{ $conf['title'] }} @endif</title>
<meta name="description" content="@if(empty($conf)) 专注php,Linux技术分享,欢迎来到我的博客 @else {{ $conf['description'] }} @endif">
<meta name="keywords" content="@if(empty($conf)) 佩的博客,往事随风,PHP,Linux @else {{ $conf['keywords'] }} @endif">
<link rel="stylesheet" type="text/css" href="/home/css/style.css">
<script type="text/javascript" src="/home/js/jquery.js"></script>
<script type="text/javascript" src="/home/js/jquery-migrate.min.js"></script>
<script type="text/javascript" src="/home/js/si_captcha.js"></script>
<script type="text/javascript" src="/home/js/jquery(1).js"></script>
<script type="text/javascript" src="/home/js/lazyload.js"></script>
{{-- 屏蔽js代码错误信息 --}}
<SCRIPT language=javascript> 
window.onerror=function(){return true;} 
</SCRIPT>
</head>
<body>
    <div id="page">
        <div id="header">
            <div id="top">
                <div id="top_logo">
                    <div id="blogname">
                        <a href="">
                            @if(empty($conf))
                                佩的博客
                            @else
                                 {{ $conf['title'] }}
                            @endif
                        </a>
                        <div id="blogtitle">
                            @if(empty($conf))
                                往事随风,随叶散
                            @else
                                 {{ $conf['subtitle'] }}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="clear">
                </div>
                <div class="topnav">
                    <ul id="nav" class="menu">
                        <li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-14">
                            <a href="/">
                                网站首页
                            </a>
                            @foreach($co as $k => $v)
                            <a href="/?id={{ $v['id'] }}" value="{{ $v['id'] }}" class="content">
                                {{ $v['column'] }}
                            </a>
                            @endforeach
                        </li>
                        <li id="menu-item-14" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-14">
                            <a href="/">
                                
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div id="content">
        @section('main')
          <div class="main">
                <ul class="post-10406 post type-post status-publish format-standard has-post-thumbnail hentry category-log tag-cdn"
                id="post-10406">
                @foreach($ar as $k => $v)
                    <li>
                        <div class="article">
                            <h2>
                            <br>
                                <a href="/xq/{{$v['id']}}" rel="bookmark" class="read" value="{{$v['id']}}" title="{{ $v['title'] }}">{{ $v['title'] }}</a><span class="new"></span>
                            </h2>
                            <hr>
                            <div class="thumbnail_box">
                                <div class="thumbnail">
                                </div>
                                <!-- 截图 -->
                                <div class="thumbnail">
                                    <a href="/xq/{{$v['id']}}" rel="bookmark" >
                                        <img width="140" height="100" src="{{ $v['img'] }}"
                                        class="attachment-thumbnail size-thumbnail wp-post-image read" value="{{ $v['id'] }}" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="entry_post">
                                <span><?php
                                $con = htmlspecialchars_decode($v['content']);
                                echo mb_substr($con, 0, 500, 'utf-8');
                                ?></span>
                            </div>
                            <div class="clear">
                            </div>
                            <?php
                                //查询栏目
                                $db = DB::table('column') -> where('id',$v['cid']) -> first();
                            ?>
                            <div class="info">
                                发布：{{ $v['uptime'] }} | 栏目
                                <a href="/?id={{ $v['id'] }}" rel="category tag">
                                    {{ $db['column'] }}
                                </a>
                                | 阅读：{{$v['read']}} ℃ | 标签：
                                <a href="/?id={{ $v['id'] }}"
                                rel="tag">
                                    {{ $v['label'] }}
                                </a>
                            </div>
                            <!-- <div class="comments_num">
                                <a href="javascript:alert('未添加链接')">
                                    6条评论
                                </a>
                            </div> -->
                        </div>
                    </li>
                    @endforeach
                </ul>
                <div class="clear">
                </div>
                <!--分页 -->
                 <style type="text/css">
                  .pagination span,.pagination a{ border-radius:3px; border:1px solid #dfdfdf;display:inline-block; padding:5px 12px;}
                  .pagination a{ margin:0 0px;}
                  .pagination span.active{ background:#09F; color:#FFF; border-color:#09F; margin:0 0px;}
                  .pagination a:hover{background:#09F; color:#FFF; border-color:#09F; }
                  .pagination label{ padding-left:15px; color:#999;}
                  .pagination label b{color:red; font-weight:normal; margin:0 0px;}
                  li{
                   list-style-type :none;
                   float: left;
                  }
                </style>
                <div class="navigation">
                    <div class="pagination">
                         {!! $ar-> appends($data)->render() !!}
                    </div>
                </div>
            </div>
            @show
            <div id="sidebar">
                <div class="widget">
                </div>
                <div class="widget">
                    <h3>
                        站内搜索
                    </h3>
                    <div class="search">
                        <form id="searchform" method="get" action="/">
                            <input type="text"  name="keywords" size="30">
                            <button>
                                搜索
                            </button>
                        </form>
                    </div>
                </div>
                <div class="clear">
                </div>
                <div class="widget">
                    <h3>
                        广告专区
                    </h3>
                    <!-- 广告1 -->
                    @foreach($one as $k => $v)
                    <div class="s_ad125">
                        <a href="{{$v['url']}}"
                        target="_blank" rel="nofollow">
                            <img src="{{$v['img']}}" style="width:260px;height:200px;" border="0">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="widget">
                    <div id="tab-title">
                        <h3>
                            <span>
                                最新日志
                            </span>
                        </h3>
                         @foreach($desc as $k => $v)
                            <a href="/xq/{{$v['id']}}"  class="read" value="{{$v['id']}}" rel="bookmark" title="{{$v['title']}}">
                            {{$v['title']}}
                            <hr style="border:1px dotted #DEDEDE;">
                            </a>
                         @endforeach
                    </div>
                </div>
                <div id="tagscloud" style="height:260px;">
              </div>
            </div>
        <div class="clear">
        </div>
        <!-- 广告2 -->
        @foreach($tow as $k => $v)
        <div class="footerads">
            <a href="{{$v['url']}}"
            target="_blank" rel="nofollow">
                <img src="{{$v['img']}}" style="width:988px;height:100px;" border="0" title="">
            </a>
        </div>
        @endforeach
        <div class="clear">
        </div>
        <div id="footer">
            Copyright © 2017-2017
            <a href="javascript:alert('QQ1533102269 --往事随风')">
                佩的博客
            </a>
            .   设计者
            <a href="javascript:alert('QQ1533102269 --往事随风')">
                PMLJDYP
            </a>
        </div>
    </div>
    <!-- 主页雪花特效 -->
 <!--    <div id="_BD_chrome" channel="" version="" date="">
    </div>
    <script type="text/javascript" src="/home/js/snow.src.js"></script>
    <script language="javascript" type="text/javascript" class="s5">
    var nav = (document.layers);
    var tmr = null;
    var spd = 50;
    var x = 0;
    var x_offset = 5;
    var y = 0;
    var y_offset = 15;
    if(nav) document.captureEvents(Event.MOUSEMOVE);
    document.onmousemove = get_mouse;
    function get_mouse(e)
    {
      x = (nav) ? e.pageX : event.clientX+document.body.scrollLeft;
      y = (nav) ? e.pageY : event.clientY+document.body.scrollTop;
      x += x_offset;
      y += y_offset;
      beam(1);
    }
    function beam(n)
    {
      if(n<5)
      {
        if(nav)
        {
          eval("document.div"+n+".top="+y);
          eval("document.div"+n+".left="+x);
          eval("document.div"+n+".visibility='visible'");
        }
        else
        {
          eval("div"+n+".style.top="+y);
          eval("div"+n+".style.left="+x);
          eval("div"+n+".style.visibility='visible'");
        }
        n++;
        tmr=setTimeout("beam("+n+")",spd);
      }
      else
      {
         clearTimeout(tmr);
         fade(4);
      }
    }
    function fade(n)
    {
      if(n>0)
      {
        if(nav)eval("document.div"+n+".visibility='hidden'");
        else eval("div"+n+".style.visibility='hidden'");
        n--;
        tmr=setTimeout("fade("+n+")",spd);
      }
      else clearTimeout(tmr);
    }
    </script> -->
        <!-- 阅读量 -->
        <script>
            $('.read').click(function() {
            var id = $(this).attr('value');
            $.ajax({
                type:"get",
                url:"/read/"+id,
                // success:function(data){
                //     console.log(data);
                // }
            });
        });
        // 访问量
        window.onload = function() {
            $.ajax({
                type:'get',
                url:'/fwl',
            })
        }
        </script>
</body>
</html>