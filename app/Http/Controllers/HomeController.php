<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\AceSetting;
use View;

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
         $ace_settings = AceSetting::all();

         // dd($ace_settings);
         View::share('ace_settings', $ace_settings);
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        // var_dump($user->level);exit;
        if($user->level== 1) return redirect()->route('home.admin');
        elseif($user->level == 2 ) return redirect()->route('home.member');
        else return redirect('/login');
    }

}
