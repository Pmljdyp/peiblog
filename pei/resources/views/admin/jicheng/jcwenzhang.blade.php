@extends('admin.index')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
        <h1 class="page-header">操作</h1>
        <ol class="breadcrumb">
          <li><a href="/admin/jcaddwenzhang">增加文章</a></li>
        </ol>
        <h1 class="page-header">管理 <span class="badge"></span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">标题</span></th>
                <th><span class="glyphicon glyphicon-list"></span> <span class="visible-lg">栏目</span></th>
                <th class="hidden-sm"><span class="glyphicon glyphicon-tag"></span> <span class="visible-lg">标签</span></th>
                <th class="hidden-sm"><span class="glyphicon glyphicon-comment"></span> <span class="visible-lg">评论</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
            @foreach($list as $k=>$v)
              <tr>
                <td>
                  <input type="checkbox" class="input-control check" name="checkbox[]" id=""/>
                </td>
                <td class="article-title">{{$v['title']}}</td>
                <td>{{$v['column']}}</td>
                <td>{{$v['label']}}</td>
                <td>暂无</td>
                <td>{{$v['uptime']}}</td>
                <td><a href="/admin/jcupwenzhang/{{$v['id']}}">修改</a> <a href="" class="boo" rel="{{$v['id']}}">删除</a></td>
              </tr>
              @endforeach
            </tbody>
            <script>
                  // ajax无刷新删除
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
                            url: "/admin/dewenzhang/"+id,
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
            </tbody>
          </table>
        </div>
        <footer class="message_footer">
          <nav>
            <div class="btn-toolbar operation" role="toolbar">
              <div class="btn-group" role="group"> <a class="btn btn-default" onClick="select()">全选</a> <a class="btn btn-default" onClick="reverse()">反选</a> <a class="btn btn-default" onClick="noselect()">不选</a> </div>
              <div class="btn-group" role="group">
                  {{ csrf_field() }}
               <button class="btn btn-default dele" data-toggle="tooltip" data-placement="bottom" title="删除全部选中">删除</button>
              </div>
              <script> 
                  var id=[];
                  // var de = [];
                  $('.dele').click(function() {
                  
                   $('input:checked').each(function() {
                    // res.push($(this).attr('id'));
                    id.push($(this).attr('id'));
                    var de = $(this);
                    });

                   if(window.confirm("此操作不可逆，是否确认？"))
                        {
                          $.ajax({
                            type: "get",
                            url: "/admin/dewenzhang/"+id,
                            success: function (data) {
                              if(data != '') {
                                location.reload(true);
                             }
                              // console.log(data);
                            }
                          });
                        };
                  });
              </script>
            </div>
            <ul class="pagination pagenav">
              {!! $list->render() !!}
            </ul>
          </nav>
        </footer>
    </div>
@stop