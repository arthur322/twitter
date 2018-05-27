<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        if($user = User::where('username', $username)->first()){    
            $tweets = $user->tweets->sortByDesc('created_at');
            return view('users.show', compact('user', 'tweets'));
        }else{
            echo 'oi';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function follow($followed_user_id)
    {
        $followed_user = User::find($followed_user_id);
        $user = Auth::user();
        // dd($followed_user->followeds);
        if(!$user->followeds->contains('id', $followed_user->id)){
            $user->followeds()->save($followed_user);
        }
        // return $this->show($followed_user->username);
        return back();

    }


    public function unfollow($unfollowed_user_id)
    {
        $unfollowed_user = User::find($unfollowed_user_id);
        $user = Auth::user();
        // dd($unfollowed_user_id->followers);
        if($user->followeds->contains('id', $unfollowed_user->id)){
            $user->followeds()->detach($unfollowed_user);
        }
        // return $this->show($unfollowed_user_id->username);
        return back();

    }


    public function followers($username){
        $user = User::where('username', $username)->first();
        $followers = $user->followers;
        return view('users.followers', compact('user', 'followers'));
    }

    public function followeds($username){
        $user = User::where('username', $username)->first();
        $followeds = $user->followeds;
        return view('users.followeds', compact('user', 'followeds'));
    }

}
