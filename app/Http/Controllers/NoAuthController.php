<?php

namespace App\Http\Controllers;
use App\Araclar;
use App\AracModel;
use App\AracMarka;
use Illuminate\Http\Request;

class NoAuthController extends Controller
{
    public function qrCode($sase='1547SDGF1515SDS15')
    {
        $aracDetay = Araclar::select(
            'araclar.*',
            'arac_marka.name as markaAdi',
            'arac_model.name as modelAdi'
            )
        ->join('arac_marka','arac_marka.id','araclar.marka_id')
        ->join('arac_model',function($join){
			$join->on('arac_marka.id','=','arac_model.marka_id')
			->on('arac_model.id','=','araclar.model_id');
        })
        ->where('araclar.sase',$sase)
        ->first();
        return view('pages.qr-code')->with('aracDetay',$aracDetay);
    }
}
