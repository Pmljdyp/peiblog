@extends('admin.index')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <div class="col-md-5">
          <h1 class="page-header">添加</h1>
          <form action="/admin/addcolumn" method="post" autocomplete="off">
            <div class="form-group">
              <label for="category-name">栏目名称</label>
              <input type="text" id="category-name" name="column" class="form-control" placeholder="在此处输入栏目名称" required autocomplete="off">
              <span class="prompt-text">这将是它在站点上显示的名字。</span> </div>
            <div class="form-group">
              <label for="category-alias">栏目别名</label>
              <input type="text" id="category-alias" name="alias" class="form-control" placeholder="在此处输入栏目别名" required autocomplete="off">
              <span class="prompt-text">“别名”是在URL中使用的别称，它可以令URL更美观。通常使用小写，只能包含字母，数字和连字符（-）。</span> </div>
            <div class="form-group">
             {{--  <label for="category-fname">父节点</label>
              <select id="category-fname" class="form-control" name="fid">
                <option value="0" selected>无</option>
                <option value="1">前端技术</option>
                <option value="2">后端程序</option>
                <option value="3">管理系统</option>
                <option value="4">授人以渔</option>
                <option value="5">程序人生</option>
              </select> --}}
              <span class="prompt-text" style="display:none">栏目是有层级关系的，您可以有一个“音乐”分类目录，在这个目录下可以有叫做“流行”和“古典”的子目录。</span> </div>
           {{--  <div class="form-group">
              <label for="category-keywords">关键字</label>
              <input type="text" id="category-keywords" name="keywords" class="form-control" placeholder="在此处输入栏目关键字" autocomplete="off">
              <span class="prompt-text">关键字会出现在网页的keywords属性中。</span> </div> --}}
            {{-- <div class="form-group">
              <label for="category-describe">描述</label>
              <textarea class="form-control" id="category-describe" name="describe" rows="4" autocomplete="off"></textarea>
              <span class="prompt-text">描述会出现在网页的description属性中。</span> </div> --}}
              {{csrf_field()}}
            <button class="btn btn-primary" type="submit" >添加新栏目</button>
          </form>
        </div>
        <div class="col-md-7">
          <h1 class="page-header">管理 <span class="badge">{{$count}}</span></h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
              
                <tr>
                  <th><span class="glyphicon glyphicon-paperclip"></span> <span class="visible-lg">ID</span></th>
                  <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">名称</span></th>
                  <th><span class="glyphicon glyphicon-list-alt"></span> <span class="visible-lg">别名</span></th>
                  <th><span class="glyphicon glyphicon-pushpin"></span> <span class="visible-lg">总数</span></th>
                  <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
                </tr>
                
              </thead>
              <tbody>
              @foreach($ins as $k => $v)
                <tr>
                  <td>{{$v['id']}}</td>
                  <td>{{$v['column']}}</td>
                  <td>{{$v['alias']}}</td>
                  <td>暂无</td>
                  <td>
                  <a href="/admin/jcuplanmu/{{$v['id']}}">修改</a> 
                  <a href="" class="boo" rel="{{ $v['id'] }}">删除</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>
            <span class="prompt-text"><strong>注：</strong>删除一个栏目也会删除栏目下的文章和子栏目,请谨慎删除!</span> </div>
        </div>
      </div>
    </div>
    <script>
//是否确认删除
$(function(){   
  $(".boo").click(function(){
   
   //  var name = $(this);
   // // 
    var id = $(this).attr("rel"); //对应id 
     var de = $(this);
    
      if(window.confirm("此操作不可逆，是否确认？"))
      {
       
        $.ajax({
          type: "get",
          url: "/admin/decolumn/"+id,
          // data: "id=" + id,
          // cache: false, //不缓存此页面  
          success: function (data) {
            if(data == '1') {
              de.parent().parent().remove();
            }
          }
        });
        return false;//确认不刷新
      };
      return false;//不确认也不刷新
  });   
});
</script>
@stop