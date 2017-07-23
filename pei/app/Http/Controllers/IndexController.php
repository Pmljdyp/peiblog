<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
class IndexController extends Controller
{
    /**
     * 首页
     */
    public function getIndex(Request $request)
    {
        $id = $request->id;//栏目id
        $key = $request -> keywords;
        $co = DB::table('column') -> get();//栏目
        $ar = DB::table('article')->where(function($query)use($id){
        if(!empty($id)){
            $query->where('cid',$id);
            }
        })
        -> orderBy('id','desc')//倒叙排列
        ->orwhere(function($query)use($key){
        if(!empty($key)){
            $query->where('title','like','%'.$key.'%');
            }
        })
        -> paginate($request->input('num',5));//内容+分页
        $conf = DB::table('conf') -> first();//网站配置
        $desc = DB::table('article') -> orderBy('id','desc') -> limit(5)-> get();//倒叙取5条内容
        return view('index.index',['co'=>$co,'ar'=>$ar,'conf'=>$conf,'data'=>$request->all(),'desc'=>$desc]);//data待值
    }
    /**
     * 详情
     */
    public function getXq(Request $request,$id)
    {
        $aid = $id;//内容id
        $key = $request -> keywords;//搜素关键字
        $co = DB::table('column') -> get();//栏目
        $ar = DB::table('article')->where(function($query)use($aid){
        if(!empty($aid)){
            $query->where('id',$aid);
            }
        })
        ->orwhere(function($query)use($key){
        if(!empty($key)){
            $query->where('title','like','%'.$key.'%');
            }
        })
        ->first();//内容
        $conf = DB::table('conf') -> first();//网站配置
        $lm = DB::table('column') -> where('id',$ar['cid']) -> first();//栏目
        $desc = DB::table('article') -> orderBy('id','desc') -> limit(5)-> get();//倒叙取5条内容
        $syp = DB::table('article') -> where('id','<',$aid) -> orderBy('id','desc') -> limit(1) -> first();//上一篇文章
        $xyp = DB::table('article') -> where('id','>',$aid) -> orderBy('id','asc')  -> limit(1) -> first();
        return view('index.xq',['co'=>$co,'ar'=>$ar,'conf'=>$conf,'data'=>$request->all(),'lm'=>$lm,'desc'=>$desc,'syp'=>$syp,'xyp'=>$xyp]);
    }
    /**
     * 阅读数
     */
    public function getRead(Request $request,$id)
    {
        $read = DB::table('article') -> where('id',$id) -> first();
        
        $reads = DB::table('article') -> where('id',$id) -> update([
            'read' => $read['read']+=6,//阅读量自增
            ]);
    }
}
