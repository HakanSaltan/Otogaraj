<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Roles;
use App\Permissions;
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
        $roller = Roles::all();
        $izinler = Permissions::all();
        return view('pages.admin.kullanicilar')->with('rol',$roller)->with('izin',$izinler);
    }
    public function profile()
    {
        $profile = User::where('id','=',Auth::user()->id)->first();
        return view('pages.admin.profile')->with('profil',$profile);
    }
}
