<?php

namespace App\Http\Controllers;

use App\User;
use App\Araclar;
use App\AracModel;
use App\AracMarka;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Uyeler;

class UyeGetController extends Controller
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

    public function index()
    {
        $arac_markalar = AracMarka::all();
        $arac_modeller = AracModel::all();
        return view('pages.uye.home')->with('arac_markalar',$arac_markalar)->with('arac_modeller',$arac_modeller);
    }
    public function profil()
    {
        // $profile = User::where('id','=',Auth::user()->id)->with('uye')->first(); //User modelindeki uye fonksiyonundan gelir
        $profile = User::select('*')
        ->join('user_uye','user_uye.user_id','users.id')
        ->join('uyeler','uyeler.id','user_uye.uye_id')
        ->leftjoin('uye_ayar','uye_ayar.uye_id','uyeler.id')
        ->where('users.id',Auth::user()->id)
        ->first();
        return view('pages.uye.profile')->with('profil',$profile);
    }
    public function muhasebe()
    {
        $profile = User::select('*')
            ->join('user_uye','user_uye.user_id','users.id')
            ->join('uyeler','uyeler.id','user_uye.uye_id')
            ->leftjoin('uye_ayar','uye_ayar.uye_id','uyeler.id')
            ->where('users.id',Auth::user()->id)
            ->first();
        return view('pages.uye.muhasebe')->with('profil',$profile);
    }
    public function araclar()
    {
        $arac_markalar = AracMarka::all();
        $arac_modeller = AracModel::all();
        return view('pages.uye.araclar')->with('arac_markalar',$arac_markalar)->with('arac_modeller',$arac_modeller);
    }
    public function aracDetay($sase=0)
    {
        $aracDetay = Araclar::select(
            'araclar.*',
            'arac_marka.name as markaAdi',
            'arac_model.name as modelAdi',
            'arac_uye.sahip_ad_soyad as sahipAdi',
            'arac_uye.sahip_tel as sahipTel',
            )
        ->join('arac_uye','arac_uye.arac_id','araclar.id')
        ->join('arac_marka','arac_marka.id','araclar.marka_id')
        ->join('arac_model',function($join){
			$join->on('arac_marka.id','=','arac_model.marka_id')
			->on('arac_model.id','=','araclar.model_id');
        })
        ->where('araclar.sase',$sase)
        ->where('arac_uye.uye_id',$this->uyeID(Auth::user()->id))
        ->first();
        return view('pages.uye.arac-detay')->with('aracDetay',$aracDetay);
    }
}
