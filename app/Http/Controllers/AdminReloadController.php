<?php

namespace App\Http\Controllers;

use App\User;
use App\Roles;
use App\Permissions;
use App\UserPermission;
use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $orderbytype = $request->orderbytype;
        $veri = User::select('*');
        if(!empty($aranacakKelime)){
            $veri = $veri->where($aranacakSutun,'like','%'.$aranacakKelime.'%');
        }
        $veri = $veri->orderBy($orderbycolumn,$orderbytype)
        ->get();

        $collect = collect($veri)->toArray();
        $sonuc = array();

        foreach ($collect as $ver){

            $kontrol = UserPermission::where('model_id',$ver["id"])->get();
            array_push(
                $sonuc, array_merge($ver,array("permission"=>collect($kontrol)->toArray()))
            );
        }
        $newcollect = (new Collection($sonuc))->paginate(10);
        return $newcollect;
    }

}
