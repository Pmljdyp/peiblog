@extends('admin.index')
@section('content')
<form action="/admin/inguanggao" method="post" enctype="multipart/form-data">
	<div class="page" style="margin-left:650px;  margin-top:60px;">
		<!-- 上传广告页面样式 -->
			<div class="baTop" type="hidden">
				<span>上传广告</span>
			</div>
			<div class="baBody">
				<div class="bbD">
					链接名称：<input type="text" class="input1" name="urlname" />
				</div>
				<div class="bbD">
					链接地址：<input type="text" class="input1" name="url" />
				</div>
				<div class="bbD">
					上传图片：
					<div class="bbDd">
						<div class="bbDImg">+</div>
						<input type="file" class="file" name="img" />
					</div>
				</div>
				<div style="margin-left:75px;">
				<input type="radio" name="gid" value="1" checked="">主页右边广告位
				<br>
				<input type="radio" name="gid" value="2">主页下边广告位
				<br>
				</div>
				<div class="bbD">
					<p class="bbDP">
						{{csrf_field()}}
						<button class="btn_ok btn_yes">提交</button>
					</p>
				</div>
			</div>
		</div>
	</form>
@stop