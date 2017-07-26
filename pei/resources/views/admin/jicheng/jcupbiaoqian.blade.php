@extends('admin.index')
@section('content')


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <h1 class="page-header">修改标签</h1>
      <form action="/admin/upbiaoqian/{{$upla['id']}}" method="post">
        <div class="form-group">
          <font style="color:red">{{Session::get('info')}}</font>
          <br>
          <label for="category-name">标签名称</label>
          <input type="text" id="category-name" name="label" value="{{$upla['label']}}" class="form-control" placeholder="在此处输入标签名称" required="" autocomplete="off">
          <span class="prompt-text">这将是它在站点上显示的名字。</span> </div>
        {{ csrf_field() }}
        <button class="btn btn-primary" type="submit">更新</button>
      </form>
    </div>
@stop