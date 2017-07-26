@extends('admin.index')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <div class="row">
        <div class="col-md-5">
          <h1 class="page-header">添加</h1>
          <form action="/admin/addbiaoqian" method="post" autocomplete="off">
            <div class="form-group">
            <font style="color:red">{{Session::get('info')}}</font>
            <br>
              <label for="category-name">标签名称</label>
              <input type="text" id="category-name" name="label" class="form-control" placeholder="在此处输入栏目名称" required autocomplete="off">
              <span class="prompt-text">这将是它在站点上显示的名字。</span> </div>
            
              <div class="form-group">
              <span class="prompt-text" style="display:none">栏目是有层级关系的，您可以有一个“音乐”分类目录，在这个目录下可以有叫做“流行”和“古典”的子目录。</span> </div>
              {{csrf_field()}}
            <button class="btn btn-primary">添加新标签</button>
          </form>
        </div>
        <div class="col-md-7">
          <h1 class="page-header">管理 <span class="badge"></span></h1>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
              
                <tr>
                  <th><span class="glyphicon glyphicon-paperclip"></span> <span class="visible-lg">ID</span></th>
                  <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">名称</span></th>
                  <th><span class="glyphicon glyphicon-pushpin"></span> <span class="visible-lg">总数</span></th>
                  <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
                </tr>
                
              </thead>
              <tbody>
              <?php
                $label = DB::table('label') -> get();//全部标签
              ?>
                @foreach($label as $k=>$v)
                  <tr>
                    <td>{{$v['id']}}</td>
                    <td>{{$v['label']}}</td>
                    <td>暂无</td>
                    <td>
                    <a href="/admin/upbiaoqian/{{$v['id']}}">修改</a> 
                    <a href="" class="boo" rel="{{$v['id']}}">删除</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            <!-- <span class="prompt-text"><strong>注：</strong>删除一个栏目也会删除栏目下的文章和子栏目,请谨慎删除!</span> -->
          </div>
        </div>
      </div>
    </div>
    <script>
// 是否确认删除
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
          url: "/admin/debiaoqian/"+id,
          // data: "id=" + id,
          // cache: false, //不缓存此页面  
          success: function (data) {
            if(data == '1') {
              de.parent().parent().remove();
            }
            // console.log(data);
          }
        });
        return false;//确认不刷新
      };
      return false;//不确认也不刷新
  });   
});
</script>
@stop