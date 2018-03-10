<?php

namespace App\Http\Controllers;

use App\User;
use App\EO;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

use App\Mail\VerifyEmail;
use Crypt;
use Mail;

class EOController extends Controller
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
        return view("eo.regiseo");
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
            'email' => 'required|email|unique:users,email',
            'first_name' => 'required',
            'last_name' => 'required',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->previlege = 1;
        $user->verified = 0; 
        $user->save();
        $eo = new EO();
        $eo->first_name = $request->first_name;
        $eo->last_name = $request->last_name;
        $eo->phone = $request->phone;
        $eo->address = $request->address;       
        $eo->id_user = $user->id;
        $eo->save();
        Mail::to($user->email)->send(new VerifyEmail($user));
        Auth::loginUsingId($user->id);
        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EO  $eO
     * @return \Illuminate\Http\Response
     */
    public function show(EO $eO)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EO  $eO
     * @return \Illuminate\Http\Response
     */
    public function edit(EO $eO)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EO  $eO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EO $eO)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EO  $eO
     * @return \Illuminate\Http\Response
     */
    public function destroy(EO $eO)
    {
        //
    }

    public function verify()
    {
        if (empty(request('token'))) {
            // if token is not provided
            return redirect()->route('eo.create');
        }
        // decrypt token as email
        $decryptedEmail = Crypt::decrypt(request('token'));
        // find user by email
        $user = User::whereEmail($decryptedEmail)->first();
        if ($user->verified == 1) {
            // user is already active, do something
        }
        // otherwise change user status to "activated"
        $user->verified = '1';
        $user->save();
        // autologin
        Auth::loginUsingId($user->id);
        return redirect('/home');
    }
}
