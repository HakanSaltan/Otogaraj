<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Uyeler;
use App\Roles;
use App\Permissions;
use App\User;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->hasRole('super-admin')){
            return redirect()->route('adminHome');
        }else if(Auth::user()->hasRole('uye')){
            $u = User::where('id','=',Auth::user()->id)->with('uye')->first();
            if($u->uye[0]->durum =='0'){
                return view('home');
            }else if($u->uye[0]->durum =='1'){
                return redirect()->route('uyeHome');
            }else{
                return 'Sen Reddedilmişsin Yiğenim';
            }
        }else if(Auth::user()->hasRole('tedarikci')){
            return redirect()->route('tedarikciHome');
        }else{
            return view('home');
        }
    }

    public function muhasebe()
    {

        if(Auth::user()->hasRole('super-admin')){
            return redirect()->route('adminMuhasebe');
        }else if(Auth::user()->hasRole('uye')){
            $u = User::where('id','=',Auth::user()->id)->with('uye')->first();
            if($u->uye[0]->durum =='0'){
                return view('home');
            }else if($u->uye[0]->durum =='1'){
                return redirect()->route('uyeMuhasebe');
            }else{
                return 'Sen Reddedilmişsin Yiğenim';
            }
        }else if(Auth::user()->hasRole('tedarikci')){
            return redirect()->route('tedarikciMuhasebe');
        }else{
            return view('home');
        }
    }

    public function araclar()
    {

        if(Auth::user()->hasRole('super-admin')){
            return redirect()->route('adminAraclar');
        }else if(Auth::user()->hasRole('uye')){
            $u = User::where('id','=',Auth::user()->id)->with('uye')->first();
            if($u->uye[0]->durum =='0'){
                return view('home');
            }else if($u->uye[0]->durum =='1'){
                return redirect()->route('uyeAraclar');
            }else{
                return 'Sen Reddedilmişsin Yiğenim';
            }
        }else if(Auth::user()->hasRole('tedarikci')){
            return redirect()->route('tedarikciAraclar');
        }else{
            return view('home');
        }
    }


}
