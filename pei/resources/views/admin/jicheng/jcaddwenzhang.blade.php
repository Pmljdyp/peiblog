 @extends('admin.index')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <form action="/admin/addarticle" method="post" class="add-article-form" enctype="multipart/form-data">
          <div class="col-md-8">
            <h1 class="page-header">撰写新文章</h1>
            <div class="form-group">
              <label for="article-title" class="sr-only">标题</label>
              <input type="text" id="article-title" name="title" class="form-control" placeholder="在此处输入标题" required autofocus autocomplete="off">
            </div>
            <script type="text/javascript" charset="utf-8" src="/home/edit/ueditor.config.js"></script>
            <script type="text/javascript" charset="utf-8" src="/home/edit/ueditor.all.min.js"> </script>
            <script type="text/javascript" charset="utf-8" src="/home/edit/lang/zh-cn/zh-cn.js"></script>
            <script id="editor" type="text/plain" style="width:auto;height:auto;"></script>
            
            <script type="text/javascript">
                UE.getEditor('editor');
                window.onresize = function(){//判断浏览器窗口发生变化而触发的事件
                  location.reload(true);//刷新
              }
            </script>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>关键字</span></h2>
              <div class="add-article-box-content">
              	<input type="text" class="form-control" placeholder="请输入关键字" name="keywords" required="" autocomplete="off">
                <span class="prompt-text">多个标签请用英文逗号,隔开。</span>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h1 class="page-header">操作</h1>
            <div class="add-article-box">
            <h2 class="add-article-box-title"><span>栏目</span></h2>
            @foreach($col as $k => $v)
              <div class="add-article-box-content">
                <ul class="category-list">
                  <li>
                    <label>
                      <input name="name" type="radio" value="{{ $v['id'] }}" checked>
                      {{ $v['column'] }} <em class="hidden-md">( 栏目ID: <span>{{ $v['id'] }}</span> )</em></label>
                  </li>
                </ul>
              </div>
            @endforeach
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>文章封面</span></h2>
              <div class="add-article-box-content">
                <input type="file" class="form-control" required="" placeholder="" name="img" autocomplete="off">
                <span class="prompt-text">点击上传</span> </div>
            </div>
              <div id="tagscloud"">
                <h3 style="color:red">选择标签 <input id="lid" type="text" readOnly="true" name="label" value="" style="width:30px;"></h3>
                @foreach($lab as $k => $v)
                        <a href="javascript:(void)" value="{{$v['id']}}" class="tagc1" style="left: 90.062px; top: 30.0269px; z-index: 102;">{{$v['label']}}
                        </a>
                @endforeach
                <script>
                  $('.tagc1').click(function() {
                    var id = $(this).attr('value');
                    document.getElementById("lid").value = id;
                  });
                </script>
              </div>
             <div class="add-article-box">
              <div class="box">
                <div class="demo2">
                  <input placeholder="请输入日期" name="uptime" required="" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"><span class="prompt-text">选择发布日期</span>
                </div>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
              <div class="add-article-box-footer">
                  {{csrf_field()}}
                  <input type="text" name="read" value="326"> 阅读量
                <button class="btn btn-primary" type="submit">发布</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    {{-- 日历选择插件 --}}
<script type="text/javascript">

!function(){

  laydate.skin('dahong');//切换皮肤，请查看skins下面皮肤库

  laydate({elem: '#demo'});//绑定元素

}();



//日期范围限制

var start = {

    elem: '#start',

    format: 'YYYY-MM-DD',

    min: laydate.now(), //设定最小日期为当前日期

    max: '2099-06-16', //最大日期

    istime: true,

    istoday: false,

    choose: function(datas){

         end.min = datas; //开始日选好后，重置结束日的最小日期

         end.start = datas //将结束日的初始值设定为开始日

    }

};



var end = {

    elem: '#end',

    format: 'YYYY-MM-DD',

    min: laydate.now(),

    max: '2099-06-16',

    istime: true,

    istoday: false,

    choose: function(datas){

        start.max = datas; //结束日选好后，充值开始日的最大日期

    }

};

laydate(start);

laydate(end);



//自定义日期格式

laydate({

    elem: '#test1',

    format: 'YYYY年MM月DD日',

    festival: true, //显示节日

    choose: function(datas){ //选择日期完毕的回调

        alert('得到：'+datas);

    }

});



//日期范围限定在昨天到明天

laydate({

    elem: '#hello3',

    min: laydate.now(-1), //-1代表昨天，-2代表前天，以此类推

    max: laydate.now(+1) //+1代表明天，+2代表后天，以此类推

});

</script>
@stop