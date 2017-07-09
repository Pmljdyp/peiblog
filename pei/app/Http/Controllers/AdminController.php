<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class AdminController extends Controller
{
	/**
	 * 显示登录
	 */
    public function getIndex()
    {
    	return view('admin.index');
    }
   	/**
   	 * 执行登录
   	 */
   	public function postLogin(Request $request)
   	{	
      $res = DB::table('pei_admin') -> get();
      var_dump($res);die;
   		//传过来的值
   		$user = $request -> except('_token');
      var_dump($user);die;
   		//数据库查询的值
   		$pei_admin = DB::table('pei_admin') -> get();
   		if($user['userName'] == $pei_admin['userName'] && $user['password'] == $pei_admin['password']) {
          return redirect('/admin/adminindex');
      } else {
        return back()->with('info','登录失败,请检查用户名或者密码');
      }
   	}
    /**
     * 显示后台首页
     */
    public function getAdminindex()
    {
      echo 222;
    }
}
