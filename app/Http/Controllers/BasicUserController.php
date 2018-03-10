<?php

namespace App\Http\Controllers;

use App\User;
use App\BasicUser;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class BasicUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $first_name = BasicUser::where('id_user',$user->id)->pluck('first_name')->first();
        return view('index', compact('user', 'first_name'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("basicuser.regisuser");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed|min:6',
            'g-recaptcha-response'=>'required|recaptcha'
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->previlege = 0;
        $user->save();
        $basicUser = new BasicUser();
        $basicUser->first_name = $request->first_name;
        $basicUser->last_name = $request->last_name;
        $basicUser->id_user = $user->id;
        $basicUser->save();
        Auth::loginUsingId($user->id);
        if($user->previlege == 0) return redirect('/basicUser');
        else if($user->previlege == 1) return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
