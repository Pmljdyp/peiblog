<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\WzRequest;
use DB;
class AdminController extends Controller
{
    /**
     * 后台登录首页
     */
    public function login()
    {
        return view('admin.login');
    }
    /**
     * 执行登录
     */
    public function dologin(Request $request)
    {
        $username = $request -> username;
        $password = $request -> password;
        $db = DB::table('pei_admin') -> first();
        if(empty($db)) {
            return back()->with('info','用户名无效或者密码无效');
        }
        if($password == $db['password'] && $username == $db['username']) {
           \Cookie::queue('name','PMLJDYP',100000);//10 时间单位为分钟
           return redirect('/admin/index');
        } else {
            return back()->with('info','表演失败,还有3次机会');
        }
    }
    /**
     * 退出登录
     */
    public function getTui()
    {
         //删除 cookie
        \Cookie::queue('name','PMLJDYP',-1);
        return redirect('/admin/login');
    }
    /**
     * 后台首页
     */
    public function getIndex(Request $request)
    {  
        $ser = $_SERVER;
        $ip = $request->ip();
    	return view('admin.jicheng.jcshouye',compact('ser'),compact('ip'));
    }
    /**
     * 继承文章列表
     */
    public function getJcwenzhang(Request $request)
    {
        $list = DB::table('Article')
        ->leftJoin('Column','Article.cid','=','Column.id')
        ->select('Article.*','Column.id as cid','Column.column','Column.alias')//别名
        ->paginate($request->input('num',10));
        $count = count($list);
    	return view('admin.jicheng.jcwenzhang',compact('list'),compact('count'));
    }
    /**
     * 继承添加文章
     */
    public function getJcaddwenzhang()
    {   
        
        $col = DB::table('Column') -> get();
        return view('admin.jicheng.jcaddwenzhang',compact('col'));
    }
    /**
     * 添加文章
     */
    public function postAddarticle(Request $request)
    {
        $Article['title']  = $request -> title;     //标题
        $Article['keywords'] = $request -> keywords;//关键字
        $Article['cid'] = $request -> name;         //对应栏目的cid
        $Article['label'] = $request -> label;      //标签
        $Article['content'] = $request -> editorValue;  //内容
        $Article['uptime'] = $request -> uptime;    //添加时间
        $Article['read'] = $request -> read;        //阅读量
            //图片插入
            $request -> hasFile('img');
            //创建文件的名字
            $filename = 'Pmljdyp-'.time().rand(10000,99999);
            //获取文件的后缀
            $suffix = $request ->file('img') -> getClientOriginalExtension(); 
            //文件夹
            $dirname = './home/blog/uploads/';
            //文件吗
            $file = $filename.'.'.$suffix;
            //移动
            $request -> file('img') -> move($dirname,$file);
            //修改图片属性
            $Article['img'] = trim($dirname.$file,'.');
            $add = DB::table('Article') -> insert($Article);
        if(empty($add)){
            return back()->with('info','任何一项都不能为空,请重新添加');
        } else {
           return redirect('/admin/jcwenzhang');
        }
    }
    /**
     * 修改文章
     */
    public function getJcupwenzhang($id)
    {
        $col = DB::table('Column') -> get();//查栏目
        $Ar = DB::table('Article') -> where('id',$id)->first();
        return view('admin.jicheng.jcupwenzhang',compact('col'),compact('Ar'));
    }
    /**
     * 执行修改
     */
    public function postUpwenzhang(Request $request,$id)
    {
        $id     = $id;
        $Ar['title'] = $request -> title;
        $Ar['content'] = $request -> content;
        $Ar['keywords'] = $request -> keywords;
        $Ar['cid'] = $request -> name;
        $Ar['label'] = $request -> label;
        $Ar['uptime'] = $request -> uptime;
        $In = DB::table('Article') -> where('id',$id) -> update($Ar);
        if($In) {
            return redirect('/admin/jcwenzhang');
        } else {
            return back();
        }

    }
    /**
     * 删除文章
     */
    public function getDewenzhang(Request $request,$id)
    {
         $ids = explode(',',$id);
         foreach ($ids as $key => $value) {
             $deco = DB::table('Article') -> where('id',$value) -> delete();
             if($deco) {
                echo 1;
             } else {
                echo 2;
             }
         }
    }
    /**
     * 继承公告
     */
    public function getJcgonggao()
    {
        $list = DB::table('notice') -> get();
        $count = count($list);
    	return view('admin.jicheng.jcgonggao',compact('list'),compact('count'));
    }
    /**
     * 继承添加公告
     */
    public function getJcaddgg()
    {
        return view('admin.jicheng.jcaddgg');
    }
    /**
     * 添加公告
     */
    public function postJcaddgg(Request $request)
    {
        $Notice['title'] = $request -> title;
        $Notice['content'] = $request -> content;
        $Notice['uptime'] = $request -> uptime;
        $No = DB::table('notice') -> insert($Notice);
        if(!empty($No)) {
           return redirect('/admin/jcgonggao');
        } else {
           return back();
        }
    }
    /**
     * 删除公告
     */
    public function getDegg(Request $request,$id)
    {
        $ids = explode(',',$id);
        foreach ($ids as $k => $v) {
             $de = DB::table('notice') -> where('id',$v) -> delete();
                if($de) {
                    echo 1;
                } else {
                    echo 2;
                }
        }
    }
    /**
     * 修改公告
     */
    public function getUpgg(Request $request,$id)
    {
        $gg = DB::table('notice') -> where('id',$id) -> first();
        return view('admin.jicheng.jcupgg',compact('gg'));
    }
    /**
     * 执行修改
     */
    public function postUpgg(Request $request,$id)
    {
        $in = DB::table('notice') -> where('id',$id) -> update([
            'title' => $request ->title,
            'content' => $request -> content,
            'uptime' => $request -> uptime
            ]);
        if($in){
            return redirect('/admin/jcgonggao');
        } else {
            return back();
        }
    }
    /**
     * 继承评论
     */
    public function getJcpinglun()
    {
    	return view('admin.jicheng.jcpinglun');
    }
    /**
     * 继承栏目
     */
    public function getJclanmu()
    {
        $ins = DB::table('Column') -> get();
        $count = count($ins);
    	return view('admin.jicheng.jclanmu',compact('ins'),compact('count'));
    }
    /**
     * 添加栏目
     */
    public function postAddcolumn(Request $request)
    {
        $alias = $request -> except('_token');
        $insert = DB::table('Column') -> insert($alias);
        if(empty($insert)) {
            return back()->with('info','任何一项都不能为空,请重新添加');
        } else {
            return redirect('/admin/jclanmu');
        }
    }
    /**
     * 修改栏目
     */
    public function getJcuplanmu($id)
    {
        
        $up = DB::table('Column') -> where('id',$id) -> first();
        $ups = DB::table('Column') -> where('id',$id) -> first();
        return view('admin.jicheng.jcuplanmu',compact('ups'));
    }
    /**
     * 执行修改栏目
     */
    public function postUplanmu(Request $request,$id)
    {

        $column['column'] = $request -> column;
        $column['alias'] = $request -> alias;
        $update = DB::table('Column') -> where('id',$id) -> update($column);
        if(!empty($update)) {
           return redirect('/admin/jclanmu');
        } else {
            return back();
        }
    }
    /**
     * 删除栏目
     */
    public function getDecolumn(Request $request,$id)
    {
        //删除栏目
        $deco = DB::table('Column') -> where('id',$id) -> delete();
        if($deco) {
            echo '1';
        } else {
            echo '2';
        }
    }
    /**
     * 继承友联
     */
    public function getJcyouqinglianjie()
    {
    	return view('admin.jicheng.jcyouqinglianjie');
    }
     /**
     * 继承网站配置
     */
    public function getJcwangzhanpeizhi()
    {
    	return view('admin.jicheng.jcwangzhanpeizhi');
    }
    /**
     * 执行修改网站配置
     */
    public function postUpwangzhan(WzRequest $request)
    {
        $xx = DB::table('conf') -> first();
        if(!empty($xx['id'])) {
            $wz['title'] = $request -> title;
            $wz['subtitle'] = $request -> subtitle;
            $wz['url'] = $request -> url;
            $wz['keywords'] = $request -> keywords;
            $wz['description'] = $request -> description;
            $wz['email'] = $request -> email;
            $wz['ICP'] = $request -> ICP;
            $conf = DB::table('conf') -> where('id',$xx['id']) -> update($wz);
            if($conf) {
                return redirect('/admin');
            } else {
                return back();
            }
        } else {
            $wz['title'] = $request -> title;
            $wz['subtitle'] = $request -> subtitle;
            $wz['url'] = $request -> url;
            $wz['keywords'] = $request -> keywords;
            $wz['description'] = $request -> description;
            $wz['email'] = $request -> email;
            $wz['ICP'] = $request -> ICP;
            $conf = DB::table('conf') -> insert($wz);
            if($conf) {
                return redirect('/admin');
            } else {
                return back();
            }
        }
    }
}
