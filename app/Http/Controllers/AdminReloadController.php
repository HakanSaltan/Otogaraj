<?php

namespace App\Http\Controllers;

use App\User;
use App\Roles;
use App\Permissions;
use Illuminate\Http\Request;

class AdminReloadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:super-admin']);
    }


    /*
	@author: Hakan SALTAN
    @since: 03.07.2020
    @desc: Gelen veriler ile analiz yapılarak tabloya yazdırılır.
	@param $request->page: current page
	@param $request->aranacakKelime: aranacak içerik
	@param $request->aranacakSutun: aranacak sütun
	@param $request->orderbycolumn: sıralanacak kolon
	@param $request->orderbytype: desc | asc
    */
   public function kullanicilar(Request $request){
        $aranacakKelime = $request->aranacakKelime;
        $aranacakSutun =  $request->aranacakSutun;
        $orderbycolumn =  $request->orderbycolumn;
        $orderbytype =    $request->orderbytype;
        $veri = User::select('*');
        if(!empty($aranacakKelime)){
            $veri = $veri->where($aranacakSutun,'like','%'.$aranacakKelime.'%');
        }
        $veri = $veri->orderBy($orderbycolumn,$orderbytype)
        ->paginate(10);
        return response($veri);
    }
     /*
	@author: Batuhan Haymana
    @since: 12.07.2020
    @desc: rol ve izinler tablosu çekilerek kullanıcılar sayfasasına yönlendirilir..
    */
    public function roller(){
        $roller = Roles::all();
        return $roller;
    }
    public function izinler(){
        $izinler = Permissions::all();
        return $izinler;
    }
}
