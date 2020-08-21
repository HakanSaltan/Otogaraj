<?php

namespace App\Http\Controllers;

use App\AracMarka;
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
    @since: 21.08.2020
    @desc: Gelen veriler ile analiz yapılarak tabloya yazdırılır.
	@param $request->page: current page
	@param $request->aranacakKelime: aranacak içerik
	@param $request->aranacakSutun: aranacak sütun
	@param $request->orderbycolumn: sıralanacak kolon
	@param $request->orderbytype: desc | asc
    */

    public function araclar(Request $request)
    {
        $aranacakKelime = $request->aranacakKelime;
        $aranacakSutun =  $request->aranacakSutun;
        $orderbycolumn =  $request->orderbycolumn;
        $orderbytype = $request->orderbytype;
        $veri = AracMarka::select(
            'arac_marka.id',
            'arac_model.id as ModelId',
            'arac_marka.name as MarkaAdi',
            'arac_model.name as ModelAdi'
        )
        ->Join('arac_model','arac_model.marka_id','arac_marka.id');
        if(!empty($aranacakKelime)){
            $veri = $veri->where($aranacakSutun,'like','%'.$aranacakKelime.'%');
        }
        $veri = $veri->orderBy($orderbycolumn,$orderbytype)
        ->paginate(10);
        return $veri;
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

    public function kullanicilar(Request $request)
    {
        $aranacakKelime = $request->aranacakKelime;
        $aranacakSutun =  $request->aranacakSutun;
        $orderbycolumn =  $request->orderbycolumn;
        $orderbytype = $request->orderbytype;
        $veri = User::select('*');
        if(!empty($aranacakKelime)){
            $veri = $veri->where($aranacakSutun,'like','%'.$aranacakKelime.'%');
        }
        $veri = $veri->orderBy($orderbycolumn,$orderbytype)
        ->with('permission') //User modelindeki permission fonksiyonundan gelir
        ->with('role')  //User modelindeki role fonksiyonundan gelir
        ->paginate(10);

        return $veri;
    }

    /*
	@author: Hakan SALTAN
    @since: 20.07.2020
    @desc: Gelen veriler ile analiz yapılarak tabloya yazdırılır.
	@param $request->page: current page
	@param $request->aranacakKelime: aranacak içerik
	@param $request->aranacakSutun: aranacak sütun
	@param $request->orderbycolumn: sıralanacak kolon
	@param $request->orderbytype: desc | asc
    */

    public function basvuruOnayla(Request $request)
    {
        $aranacakKelime = $request->aranacakKelime;
        $aranacakSutun =  $request->aranacakSutun;
        $orderbycolumn =  $request->orderbycolumn;
        $orderbytype = $request->orderbytype;

        $veri = User::select(
        'users.name as name',
        'users.created_at as created_at',
        'uyeler.isyeri_adi as isyeri_adi',
        'uyeler.durum as durum',
        'uyeler.id as id'
        )
        ->Join('user_uye','user_uye.user_id','users.id','id')
        ->leftJoin('uyeler','uyeler.id','user_uye.uye_id','id');
         if(!empty($aranacakKelime)){
             $veri = $veri->where($aranacakSutun,'like','%'.$aranacakKelime.'%');
         }
         $veri = $veri->orderBy($orderbycolumn,$orderbytype)
        ->where('uyeler.durum',0)
        ->paginate(10);
        return $veri;
    }

}
