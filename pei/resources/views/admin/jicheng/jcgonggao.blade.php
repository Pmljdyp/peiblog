@extends('admin.index')
@section('content')
 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <form action="" method="post" >
        <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a href="/admin/jcaddgg">增加公告</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge">{{ $count }}</span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">标题</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
            @foreach($list as $k => $v)
              <tr>
                <td>
                  <input type="checkbox" class="input-control check" name="checkbox[]" id="{{ $v['id'] }}"/>
                </td>
                <td class="article-title">{{ $v['title'] }}</td>
                <td>{{ $v['uptime'] }}</td>
                <td><a href="/admin/upgg/{{ $v['id'] }}">修改</a> <a href="" class="dele" rel="{{ $v['id'] }}">删除</a></td>
              </tr>
            @endforeach
             <script>
                  {{-- ajax无刷新删除 --}}
                  //是否确认删除
                  $(function(){   
                    $(".dele").click(function(){
                     
                     //  var name = $(this);
                     // // 
                      var id = $(this).attr("rel"); //对应id 
                       var de = $(this);
                      
                        if(window.confirm("此操作不可逆，是否确认？"))
                        {
                          $.ajax({
                            type: "get",
                            url: "/admin/degg/"+id,
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
            </tbody>
          </table>
        </div>
        <footer class="message_footer">
          <nav>
            <div class="btn-toolbar operation" role="toolbar">
              <div class="btn-group" role="group"> <a class="btn btn-default" onClick="select()">全选</a> <a class="btn btn-default" onClick="reverse()">反选</a> <a class="btn btn-default" onClick="noselect()">不选</a> </div>
              <div class="btn-group" role="group">
                <button class="btn btn-default deles" data-toggle="tooltip" data-placement="bottom" title="删除全部选中">删除</button>
              </div>
              <script> 
                  var id=[];
                  $('.deles').click(function() {
                  
                   $('input:checked').each(function() {
                    // res.push($(this).attr('id'));
                    id.push($(this).attr('id'));
                    var de = $(this);
                    });
                   if(window.confirm("此操作不可逆，是否确认？"))
                        {
                          $.ajax({
                            type: "get",
                            url: "/admin/degg/"+id,
                            success: function (data) {
                               if(data != '') {
                                location.reload(true);
                             }
                              // console.log(data);
                            }
                          });
                          return false;//确认不刷新
                        };
                        return false;//不确认也不刷新
                  });
              </script>
            </div>
            <ul class="pagination pagenav">
              <li class="disabled"><a aria-label="Previous"> <span aria-hidden="true">&laquo;</span> </a> </li>
              <li class="active"><a>1</a></li>
              <li class="disabled"><a aria-label="Next"> <span aria-hidden="true">&raquo;</span> </a> </li>
            </ul>
          </nav>
        </footer>
      </form>
    </div>
@stop