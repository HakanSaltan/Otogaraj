<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminGetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:super-admin']);
    }

    public function kullanicilar()
    {
        // dd('?');
        return view('pages.admin.kullanicilar');
    }
    public function profile()
    {
        $profile = User::where('id','=',Auth::user()->id)->first();
        return view('pages.admin.profile')->with('profil',$profile);
    }
}
