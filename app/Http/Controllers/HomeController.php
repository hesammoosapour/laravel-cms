<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        $user = Auth::user();

        return view('home',compact('user'));

//        $request->session()->put(['hesam'=>'Admin']);
//        return $request->session()->get('Hesam');

//        session(['Hesam' => 'Aministrator']);
//        return session('hesam');
//        $request->session()->forget('hesam');
//        $request->session()->flush();

//        $request->session()->flash('message','post has been created');
//        return $request->session()->get('message');

//        $request->session()->reflash();
//        $request->session()->keep();
//        return $request->session()->all();
    }
}
