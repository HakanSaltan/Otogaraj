<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    }

    public function kullanicilar()
    {
        // dd('?');
        return view('pages.admin.kullanicilar');
    }
}
