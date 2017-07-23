 @extends('admin.index')
@section('content')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <form action="/admin/upwenzhang/{{$Ar['id'] }}" method="post" class="add-article-form">
          <div class="col-md-9">
            <h1 class="page-header">撰写新文章</h1>
            <div class="form-group">
              <label for="article-title" class="sr-only">标题</label>
              <input type="text" id="article-title" value="{{ $Ar['title'] }}" name="title" class="form-control" placeholder="在此处输入标题" required autofocus autocomplete="off">
            </div>
            <div class="form-group">
              <label for="article-content" class="sr-only">内容</label>
              <textarea id="article-content"  name="content" type="text/plain">{{ $Ar['content'] }}</textarea>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>关键字</span></h2>
              <div class="add-article-box-content">
              	<input type="text" class="form-control" value="{{ $Ar['keywords'] }}" placeholder="请输入关键字" name="keywords" required="" autocomplete="off">
                <span class="prompt-text">多个标签请用英文逗号,隔开。</span>
              </div>
            </div>
          {{--   <div class="add-article-box">
              <h2 class="add-article-box-title"><span>描述</span></h2>
              <div class="add-article-box-content">
              	<textarea class="form-control" name="describe" autocomplete="off"></textarea>
                <span class="prompt-text">描述是可选的手工创建的内容总结，并可以在网页描述中使用</span>
              </div>
            </div> --}}
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
                      <input name="name" type="radio" value="{{ $v['id'] }}" @if($Ar['cid'] == $v['id']) checked @endif>
                      {{ $v['column'] }} <em class="hidden-md">( 栏目ID: <span>{{ $v['id'] }}</span> )</em></label>
                  </li>
                </ul>
              </div>
            @endforeach

            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>标签</span></h2>
              <div class="add-article-box-content">
                <input type="text" value="{{ $Ar['label'] }}" class="form-control" required="" placeholder="输入新标签" name="label" autocomplete="off">
                <span class="prompt-text">多个标签请用英文逗号,隔开</span> </div>
            </div>
            {{-- <div class="add-article-box">
              <h2 class="add-article-box-title"><span>标题图片</span></h2>
              <div class="add-article-box-content">
                <input type="text" class="form-control" placeholder="点击按钮选择图片" id="pictureUpload" name="titlepic" autocomplete="off">
              </div>
              <div class="add-article-box-footer">
                <button class="btn btn-default" type="button" ID="upImage">选择</button>
              </div>
            </div> --}}
             <div class="add-article-box">
              <div class="box">
                <div class="demo2">
                  <input placeholder="请输入日期" value="{{ $Ar['uptime'] }}" name="uptime" required="" class="laydate-icon" onClick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"><span class="prompt-text">选择发布日期</span>
                </div>
              </div>
            </div>
            <div class="add-article-box">
              <h2 class="add-article-box-title"><span>发布</span></h2>
          {{--     <div class="add-article-box-content">
              	<p><label>状态：</label><span class="article-status-display">未发布</span></p>
                <p><label>公开度：</label><input type="radio" name="visibility" value="0" checked/>公开 <input type="radio" name="visibility" value="1" />加密</p>
                <p><label>发布于：</label><span class="article-time-display"><input style="border: none;" type="datetime" name="time" value="2016-01-09 17:29:37" /></span></p>
              </div> --}}
              <div class="add-article-box-footer">
                  {{csrf_field()}}
                <button class="btn btn-primary" type="submit">修改</button>
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