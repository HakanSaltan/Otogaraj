<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminPostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:super-admin']);
    }


    /*
        @author: Hakan SALTAN
        @since: 03.07.2020
        @desc: Eğer veri tipi YENİ ise EKLEME, SİL ise SİLME, KULLANİCİ ID ise GÜNCELLEME işlemi uygulanmaktadır.
        @param $request[0]["adi"]: adı
        @param $request[0]["email"]: email
    */
    public function kullanicilar(Request $request)
    {
        try{
            DB::beginTransaction();
                if($request[0]["tip"]=='yeni'){
                    User::insert(["name"=>$request[0]["adi"],"email"=>$request[0]["email"] ]);
                }elseif($request[0]["tip"]=='sil'){
                    User::where('id',$request[0]["id"])->delete();
                }else{
                    User::where('id',$request[0]["id"])->update(["name"=>$request[0]["adi"],"email"=>$request[0]["email"]]);
                }
            DB::commit();
            return response(["error"=>false]);
        }catch(Exception $e){
            return response(["error"=>true]);
        }
    }

    /*
        @author: Batuhan HAYMANA
        @since: 06.07.2020
        @desc:
        @param $request->kullaniciAdi: adı
        @param $request->kullaniciMail: mail
    */
    public function kullaniciUp(Request $request)
    {
        try{
            DB::beginTransaction();
                $g = User::where('id','=',Auth::user()->id)->first();
                $g->name=$request->kullaniciAdi;
                $g->email=$request->kullaniciMail;
                $g->update();
            DB::commit();
            return response(["error"=>false]);
        }catch(Exception $err){
            return response(["error"=>true]);
        }




    }
}
