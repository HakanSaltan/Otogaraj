<?php

namespace App\Http\Controllers;

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
        $profile = Uyeler::where('id','=',Auth::user()->id)->first();
        return $profile;
        return view('pages.uye.profile')->with('profil',$profile);
    }
}
