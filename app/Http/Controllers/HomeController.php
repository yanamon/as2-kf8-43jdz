<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\EO;
use Auth;

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
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $previlege =  Auth::user()->previlege;
        if($previlege == 0) return redirect('/basicUser');
        else if($previlege == 1) return redirect('/');
    }
}
