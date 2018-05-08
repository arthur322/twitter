<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
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
        $user = Auth::user();
        $tweets = $user->tweets;
        foreach($user->followeds as $followed)
        {
            $tweets = $tweets->merge($followed->tweets);
        }
        $tweets = $tweets->sortByDesc('created_at');
        return view('home', compact('tweets'));
    }
}
