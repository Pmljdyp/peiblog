@extends('admin.index')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <form action="/Comment/checkAll" method="post">
        <h1 class="page-header">管理 <span class="badge">4</span></h1>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th><span class="glyphicon glyphicon-th-large"></span> <span class="visible-lg">选择</span></th>
                <th><span class="glyphicon glyphicon-file"></span> <span class="visible-lg">摘要</span></th>
                <th><span class="glyphicon glyphicon-time"></span> <span class="visible-lg">日期</span></th>
                <th><span class="glyphicon glyphicon-pencil"></span> <span class="visible-lg">操作</span></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /></td>
                <td class="article-title">这是测试评论摘要这是测试评论摘要这是测试评论摘要这是测试评论摘要...</td>
                <td>2015-12-03</td>
                <td><a rel="1" name="see">查看</a> <a rel="1" name="delete">删除</a></td>
              </tr>
              <tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /></td>
                <td class="article-title">这是测试评论摘要这是测试评论摘要这是测试评论摘要这是测试评论摘要...</td>
                <td>2015-12-03</td>
                <td><a rel="2" name="see">查看</a> <a rel="2" name="delete">删除</a></td>
              </tr>
              <tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /></td>
                <td class="article-title">这是测试评论摘要这是测试评论摘要这是测试评论摘要这是测试评论摘要...</td>
                <td>2015-12-03</td>
                <td><a rel="3" name="see">查看</a> <a rel="3" name="delete">删除</a></td>
              </tr>
              <tr>
                <td><input type="checkbox" class="input-control" name="checkbox[]" value="" /></td>
                <td class="article-title">这是测试评论摘要这是测试评论摘要这是测试评论摘要这是测试评论摘要...</td>
                <td>2015-12-03</td>
                <td><a rel="4" name="see">查看</a> <a rel="4" name="delete">删除</a></td>
              </tr>
            </tbody>
          </table>
        </div>
        <footer class="message_footer">
          <nav>
            <div class="btn-toolbar operation" role="toolbar">
              <div class="btn-group" role="group"> <a class="btn btn-default" onClick="select()">全选</a> <a class="btn btn-default" onClick="reverse()">反选</a> <a class="btn btn-default" onClick="noselect()">不选</a> </div>
              <div class="btn-group" role="group">
                <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="删除全部选中" name="checkbox_delete">删除</button>
              </div>
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