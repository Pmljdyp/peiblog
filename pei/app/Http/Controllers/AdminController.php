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
           \Cookie::queue('name','PMLJDYP',100000);//写入cookie 10 时间单位为分钟
           // $inadmin = DB::table('pei_admin') -> insert([
           //      'time' => date("Y-m-d H:i:s"),
           //  ]);
           $admin = DB::table('pei_admin') -> first();
           if(!empty($admin)) {
            $cha = DB::table('pei_admin') -> where('id',$admin['id']) -> update([
                'time' => date("Y-m-d H:i:s"),//插入时间
                'ci' => $admin['ci'] +=1,//插入登陆次数
                ]);
           }
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
        //获取上次登录的时间
        $old = DB::table('pei_admin') -> first();
        $upshang = DB::table('pei_admin') -> where('id',$old['id']) -> update([
            'oldtime' => $old['time'],
            ]);
        return redirect('/admin/login');
    }
    /**
     * 后台首页
     */
    public function getIndex(Request $request)
    {  
        $ser = $_SERVER;
        $ip = $request->ip();
        $art = count($Article = DB::table('Article') -> get());//文章总数
        $col = count($column = DB::table('column') -> get());//栏目总数
        $not = count($notice = DB::table('notice') -> get());//公共总数
        $pei = DB::table('pei_admin') -> first();//获取管理员信息
        $PMLJDYP = count($pei['id']);
    	return view('admin.jicheng.jcshouye',['ser'=>$ser,'ip'=>$ip,'art'=>$art,'col'=>$col,'not'=>$not,'pei'=>$pei,'PMLJDYP'=>$PMLJDYP]);
    }
    /**
     * 继承文章列表
     */
    public function getJcwenzhang(Request $request)
    {
        
        // $list = DB::table('Article')
        // ->leftJoin('Column','Article.cid','=','Column.id')
        // ->select('Article.*','Column.id as cid','Column.column','Column.alias')//别名
        // ->get();
        $list = DB::table('Article')
        ->leftJoin('Column','Article.cid','=','Column.id')
        ->leftJoin('label','Article.lid','=','label.id')
        ->select('Article.*','Column.id as cid','Column.column','Column.alias','label.label')//别名
        ->paginate($request->input('num',10));
    	return view('admin.jicheng.jcwenzhang',['list'=>$list]);
    }
    /**
     * 继承添加文章
     */
    public function getJcaddwenzhang()
    {   
        $col = DB::table('Column') -> get();
        $lab = DB::table('label') -> get();
        return view('admin.jicheng.jcaddwenzhang',['col'=>$col,'lab'=>$lab]);
    }
    /**
     * 添加文章
     */
    public function postAddarticle(Request $request)
    {
        $Article['title']  = $request -> title;     //标题
        $Article['keywords'] = $request -> keywords;//关键字
        $Article['cid'] = $request -> name;         //对应栏目的cid
        $Article['content'] = $request -> editorValue;  //内容
        $Article['uptime'] = $request -> uptime;    //添加时间
        $Article['read'] = $request -> read;        //阅读量
        $Article['lid'] = $request -> label;        //标签
            //图片插入
            $request -> hasFile('img');
            //创建文件的名字
            $filename = 'Pmljdyp-'.time().rand(10000,99999);
            //获取文件的后缀
            $suffix = $request ->file('img') -> getClientOriginalExtension(); 
            //文件夹
            $dirname = './home/blog/uploads/';
            //文件吗
            $file = $filename.'.'.$suffix.'.png';
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
        
        $col = DB::table('Column') -> get();
        $lab = DB::table('label') -> get();
        $ll = DB::table('Article') -> where('id',$id) -> first();
        return view('admin.jicheng.jcupwenzhang',['col'=>$col,'lab'=>$lab,'ll'=>$ll]);
    }
    /**
     * 执行修改文章
     */
    public function postUpwenzhang(Request $request,$id)
    {
        $id = $id;
        $Ar['title'] = $request -> title;
        $Ar['content'] = $request -> content;
        $Ar['keywords'] = $request -> keywords;
        $Ar['cid'] = $request -> name;
        $Ar['lid'] = $request -> label;
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
            return back();
        }
    }
    /**
     * 继承标签
     */
    public function getJcbiaoqian()
    {
        return view('admin.jicheng.jcbiaoqian');
    }
    /**
     * 执行添加标签
     */
    public function postAddbiaoqian(Request $request)
    {
       $la['label'] = $request -> label;
       $lab = DB::table('label') -> insert($la);
       if($lab){
            return redirect('/admin/jcbiaoqian');
       } else {
            return back()->with('info','添加失败，请重试');
       }
    }
    /**
     * 修改标签
     */
    public function getUpbiaoqian(Request $request,$id)
    {
        $upla = DB::table('label') -> where('id',$id) -> first();
        return view('admin.jicheng.jcupbiaoqian',['upla'=>$upla]);
    }
    /**
     * 执行修改标签
     */
    public function postUpbiaoqian(Request $request,$id)
    {
       $upla = DB::table('label') -> where('id',$id) -> update([
            'label' => $request -> label,
        ]);
       if($upla){
            return redirect('/admin/jcbiaoqian');
       } else {
            return back()->with('info','添加失败，请重试');
       }
    }
    /**
     * 删除标签
     */
    public function getDebiaoqian(Request $request,$id)
    {
        $dela = DB::table('label') -> where('id',$id) -> delete();
        if($deco) {
            echo '1';
        } else {
            return back();
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
    /**
     * 广告列表
     */
    public function getJcguanggao()
    {
        $gg = DB::table('adver') -> get();
        return view('admin.jicheng.jcguanggao',['gg'=>$gg]);
    }
    /**
     * 添加广告
     */
    public function getAddguanggao()
    {
        return view('admin.jicheng.jcaddguanggao');
    }
    /**
     * 执行添加
     */
    public function postInguanggao(Request $request)
    {
        $ad['urlname'] = $request -> urlname;
        $ad['url'] = $request -> url;
        $ad['gid'] = $request -> gid;

            //图片上传
        $request -> hasFile('img');
            //创建文件 的名字
        $filename = rand(10000,99999);
            //获取文件的后缀
        $suffix = $request ->file('img') -> getClientOriginalExtension(); 
            //文件夹
        $dirname = './home/blog/guanggao/';
            //文件名
        $file =  $filename.'.'.$suffix.'.png';
        $request -> file('img') -> move($dirname,$file);
        $ad['img'] = trim($dirname.$file,'.');
        if(!empty($ad)) {
            $add = DB::table('adver') -> insert($ad);
                if($add) {
                    return redirect('/admin/jcguanggao');
                } else {
                    return back();
                }
        } else {
            return back();
        }
    }
    /**
     * 删除广告
     */
    public function getDeleguanggao($id)
    {
        $dele = DB::table('adver') -> where('id',$id) -> delete();
        if($dele){
            echo 1;
        } else {
            echo 2;
        }
    }
    /**
     * 修改广告
     */
    public function getJcupguanggao(Request $request,$id)
    {
        $cha = DB::table('adver') -> where('id',$id) -> first();
        return view('admin.jicheng.jcupguanggao',['cha'=>$cha]);
    }
    /**
     * 执行修改
     */
    public function postUpguanggao(Request $request,$id)
    {
        $adv['urlname'] = $request -> urlname;
        $adv['url'] = $request -> url;
        $adv['gid'] = $request -> gid;
             //图片上传
        $request -> hasFile('img');
            //创建文件 的名字
        $filename = rand(10000,99999);
            //获取文件的后缀
        $suffix = $request ->file('img') -> getClientOriginalExtension(); 
            //文件夹
        $dirname = './home/blog/guanggao/';
            //文件名
        $file =  $filename.'.'.$suffix.'.png';
        $request -> file('img') -> move($dirname,$file);
        $adv['img'] = trim($dirname.$file,'.');
        if(!empty($adv)) {
            $add = DB::table('adver') -> where('id',$id) -> update($adv);
                if($add) {
                    return redirect('/admin/jcguanggao');
                } else {
                    return back();
                }
        } else {
            return back();
        }

    }
    /**
     * 继承评论  ***暂时不写***
     */
    public function getJcpinglun()
    {
        return view('admin.jicheng.jcpinglun');
    }
}
