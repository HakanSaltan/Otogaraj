<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    }


     /*
	@author: Hakan SALTAN
    @since: 03.07.2020
    @desc: Eğer veri tipi yeni ise ekleme, sil ise silme, bunların dışında ise güncelleme işlemi uygulanmaktadır.
	@param $request[0]["adi"]: adı

   */
    public function kullanicilar(Request $request)
    {
        try{
            if($request[0]["tip"]=='yeni'){
                User::insert(["name"=>$request[0]["adi"]]);
            }elseif($request[0]["tip"]=='sil'){
                User::where('id',$request[0]["id"])->delete();
            }else{
                User::where('id',$request[0]["id"])->update(["name"=>$request[0]["adi"]]);
            }
            return response(["error"=>false]);
        }catch(Exception $e){
            return response(["error"=>true]);
        }
    }
}
