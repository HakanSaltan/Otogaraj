<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Roles;
use App\Permissions;
use Spatie\Permission\Contracts\Permission;

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

    public function index()
    {
        $roles = Roles::all();
        $permissions = Permissions::all();
        return view('pages.admin.home')->with('roles',$roles)->with('permissions',$permissions);
    }

    public function kullanicilar()
    {
        $roles = Roles::all();
        $permissions = Permissions::all();
        return view('pages.admin.kullanicilar')->with('roles',$roles)->with('permissions',$permissions);
    }
    public function profile()
    {
        $profile = User::where('id','=',Auth::user()->id)->first();
        return view('pages.admin.profile')->with('profil',$profile);
    }

    public function muhasebe()
    {
        return view('pages.admin.muhasebe');
    }

    public function araclar()
    {
        return view('pages.admin.araclar');
    }
    public function show()
    {
        $veri = User::where('id',Auth::user()->id)
        ->with('permission') //User modelindeki permission fonksiyonundan gelir
        ->with('role') //User modelindeki role fonksiyonundan gelir
        ->first();
        return view('pages.roles.show')->with('veri',$veri);
    }
    public function test()
    {
        return view('pages.admin.test');
    }
}
