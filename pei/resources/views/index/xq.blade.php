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
        <div class="main">
                <p id="breadcrumbs">
                    您当前位置：
                    <a href="/">
                        网站首页
                    </a>
                    &raquo;
                    <a href="/?id={{$lm['id']}}">
                        {{$lm['column']}}
                    </a>
                    &raquo;{{$ar['title']}}
                </p>
                <div class="left">
                    <div class="article">
                        <h1>
                            {{$ar['title']}}
                        </h1>
                        <div class="article_info">
                            作者：往事随风 &nbsp; 发布：{{$ar['uptime']}} &nbsp; 分类：
                            <a href="/?id={{$lm['id']}}" rel="category tag">
                               {{$lm['column']}}
                            </a>
                            &nbsp; 热度：{{$ar['read']}} ℃ &nbsp;
                            <a href="http://www.laozuo.org/10424.html#comments">
                                1条评论
                            </a>
                            &nbsp;
                        </div>
                        <div class="clear">
                        </div>
                        <div class="context">
                            <div class="nodetial">
                                <div class="node_img">
                                    <img width="280" height="180" src="{{$ar['img']}}"
                                    class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                    original=""
                                    />
                                </div>
                                <div class="node_star">
                                    <ol>
                                        <li class="calender">
                                            {{$ar['uptime']}}
                                        </li>
                                        <li class="read">
                                            热度 {{$ar['read']}} ℃
                                            <!-- <a href="http://www.laozuo.org/10424.html#comments">
                                                1条评论
                                            </a> -->
                                        </li>
                                        <li class="tag">
                                            标签：
                                            <a href="http://www.laozuo.org/tag/hostkvm" rel="tag">
                                                {{$ar['label']}}
                                            </a>
                                        </li>
                                        <li class="ratings">
                                        </li>
                                    </ol>
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                            <div id="vps2plan">
                            <?php echo $ar['content']?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="articles">
                    <div class="sing60ads">
                        <a href="#" target="_blank" title="">
                            <img src="http://www.laozuo.org/wp-content/themes/weisaysimple/images/image-pending.gif"
                            border="0" width="665px" original=""
                            />
                        </a>
                    </div>
                    <div class="qq_box">
                        QQ群：58581751
                    </div>
                </div>
                <div class="articles">
                    【上一篇】
                    <a href="/xq/{{$syp['id']}}" rel="prev">
                       @if(!empty($syp)){{$syp['title']}} @else  <a href="/">没有了,来主页看看吧</a>  @endif
                    </a>
                    <br />
                    【下一篇】
                    <a href="/xq/{{$xyp['id']}}" rel="next">
                        @if(!empty($xyp)){{$xyp['title']}} @else  <a href="/">没有了,来主页看看吧</a>  @endif
                    </a>
                </div>
            </div>
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
                            <span class="selected">
                                最新日志
                            </span>
                        </h3>
                        @foreach($desc as $k => $v)
                            <a href="/xq/{{$v['id']}}" class="read" value="{{$v['id']}}"  rel="bookmark" title="{{$v['title']}}">
                            {{$v['title']}}
                            <hr style="border:1px dotted #DEDEDE;">
                            </a>
                         @endforeach
                    </div>
                </div>
                <div class="clear">
                </div>
                <div class="widget">
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
    <div id="_BD_chrome" channel="" version="" date="">
    </div>
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
    </script>
</body>
</html>