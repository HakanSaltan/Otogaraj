<?php

namespace App\Http\Controllers;

use App\Support\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Araclar;

class UyeReloadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:uye']);
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
    public function araclar(Request $request)
    {
        $aranacakKelime = $request->aranacakKelime;
        $aranacakSutun =  $request->aranacakSutun;
        $orderbycolumn =  $request->orderbycolumn;
        $orderbytype = $request->orderbytype;

        $veri = Araclar::select(
            'araclar.*',
            'arac_marka.name as markaAdi',
            'arac_model.name as modelAdi',
            )
        ->join('arac_uye','arac_uye.arac_id','araclar.id')
        ->join('arac_marka','arac_marka.id','araclar.marka_id')
        ->join('arac_model',function($join){
			$join->on('arac_marka.id','=','arac_model.marka_id')
			->on('arac_model.id','=','araclar.model_id');
        });
        if(!empty($aranacakKelime)){
            $veri = $veri->where($aranacakSutun,'like','%'.$aranacakKelime.'%');
        }
        $veri = $veri->orderBy($orderbycolumn,$orderbytype)
        ->where('arac_uye.uye_id',$this->uyeID(Auth::user()->id))
        ->paginate(10);
        return $veri;
    }
}
