<?php

namespace App\Http\Controllers;

use App\User;
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
        return view('pages.uye.home');
    }
    public function profil()
    {
        // $profile = User::where('id','=',Auth::user()->id)->with('uye')->first(); //User modelindeki uye fonksiyonundan gelir
        $profile = User::select('*')
        ->join('user_uye','user_uye.user_id','users.id')
        ->join('uyeler','uyeler.id','user_uye.uye_id')
        ->first();
        return view('pages.uye.profile')->with('profil',$profile);
    }
    public function muhasebe()
    {
        $profile = User::select('*')
            ->join('user_uye','user_uye.user_id','users.id')
            ->join('uyeler','uyeler.id','user_uye.uye_id')
            ->first();
        return view('pages.uye.muhasebe')->with('profil',$profile);
    }
    public function araclar()
    {
        return view('pages.uye.araclar');
    }
    public function aracDetay()
    {
        return view('pages.uye.arac-detay');
    }
}
