@extends('admin.index')
@section('content')


<div class="col-sm-9 col-sm-offset-3 col-md-10 col-lg-10 col-md-offset-2 main" id="main">
      <h1 class="page-header">修改栏目</h1>
      <form action="/admin/uplanmu/{{ $ups['id'] }}" method="post">
        <div class="form-group">
          <label for="category-name">栏目名称</label>
          <input type="text" id="category-name" name="column" value="{{ $ups['column'] }}" class="form-control" placeholder="在此处输入栏目名称" required="" autocomplete="off">
          <span class="prompt-text">这将是它在站点上显示的名字。</span> </div>
        <div class="form-group">
          <label for="category-alias">栏目别名</label>
          <input type="text" id="category-alias" name="alias" value="{{ $ups['alias'] }}" class="form-control" placeholder="在此处输入栏目别名" required="" autocomplete="off">
          <span class="prompt-text">“别名”是在URL中使用的别称，它可以令URL更美观。通常使用小写，只能包含字母，数字和连字符（-）。</span> </div>
      {{--   <div class="form-group">
          <label for="category-fname">父节点</label>
          <select id="category-fname" class="form-control" name="fid">
            <option value="0" selected>无</option>
            <option value="1">前端技术</option>
            <option value="2">后端程序</option>
            <option value="3">管理系统</option>
            <option value="4">授人以渔</option>
            <option value="5">程序人生</option>
          </select>
          <span class="prompt-text">栏目是有层级关系的，您可以有一个“音乐”分类目录，在这个目录下可以有叫做“流行”和“古典”的子目录。</span> 
        </div> --}}
        {{-- <div class="form-group">
          <label for="category-keywords">关键字</label>
          <input type="text" id="category-keywords" name="keywords" value="HTML,CSS+DIV,JavaScript,jQuery" class="form-control" placeholder="在此处输入栏目关键字" autocomplete="off">
          <span class="prompt-text">关键字会出现在网页的keywords属性中。</span> 
        </div> --}}
       {{--  <div class="form-group">
          <label for="category-describe">描述</label>
          <textarea class="form-control" id="category-describe" name="describe" rows="4" autocomplete="off">这是栏目的描述这是栏目的描述这是栏目的描述这是栏目的描述</textarea>
          <span class="prompt-text">描述会出现在网页的description属性中。</span> 
        </div> --}}
        {{ csrf_field() }}
        <button class="btn btn-primary" type="submit" name="submit">更新</button>
      </form>
    </div>
@stop