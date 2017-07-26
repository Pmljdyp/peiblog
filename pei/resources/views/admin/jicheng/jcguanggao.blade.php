@extends('admin.index')
@section('content')>
			<!-- banner页面样式 -->
			<div class="banner" >
				<div class="add" style="margin-left:610px;">
					<a class="addA" href="/admin/addguanggao">上传广告&nbsp;&nbsp;+</a>
				</div>
				<!-- banner 表格 显示 -->
				<div class="banShow" style="margin-left:650px;">
					<table border="1" cellspacing="0" cellpadding="0">
						<tr>
							<td width="50px" class="tdColor tdC">序号</td>
							<td width="50px" class="tdColor tdC">位置id</td>
							<td width="50px" class="tdColor">图片</td>
							<td width="130px" class="tdColor">名称</td>
							<td width="130px" class="tdColor">链接</td>
							<td width="100px" class="tdColor">操作</td>
						</tr>
						@foreach($gg as $k => $v)
						<tr>
							<td>{{$v['id']}}</td>
							<td>{{$v['gid']}}</td>
							<td>
								<div class="bsImg">
									<img src="{{$v['img']}}" style="width:200px;height:150px;">
								</div>
							</td>
							<td>{{$v['urlname']}}</td>
							<td><a class="bsA"  target="_blank"  href="{{$v['url']}}">{{$v['url']}}</a></td>
							<td>
								<a href="/admin/jcupguanggao/{{$v['id']}}">
								<img style="margin-left:20px;" class="operation" src="/home/img/update.png"></a>
								<img class="operation dele" value="{{$v['id']}}" src="/home/img/delete.png">
							</td>
						</tr>
						@endforeach
					</table>
				</div>
				<!-- banner 表格 显示 end-->
			</div>
			<!-- banner页面样式end -->

		 <script>
              // ajax无刷新删除
              //是否确认删除
              $(function(){   
                $(".dele").click(function(){
                  var id = $(this).attr("value"); //对应id 
                  var de = $(this);
                    if(window.confirm("此操作不可逆，是否确认？"))
                    {
                      $.ajax({
                        type: "get",
                        url: "/admin/deleguanggao/"+id,
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