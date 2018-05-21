<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tweet;

class DiscoverController extends Controller
{
    public function show(User $user){
    	$tweets = Tweet::all()->sortByDesc('created_at');
    	$users = User::withCount('tweets')->orderByDesc('tweets_count')->get();
    	return view('discover.show', compact('tweets', 'users'));
    }
}
