<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
// use Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // use AuthenticatesUsers;

    public function index()
    {
        //
        return view('index');
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function checkCred(Request $req){
        // $req->validate([
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);s
        $input['email'] = $req->email;
        $input['password'] = $req->password;
        // dd($input);
        $validationRules = [
            'email' => 'required',
            'password' => 'required',
         ];
        $validator = Validator::make($input, $validationRules);
        // dd($validator);
        if ($validator->fails()) {
            // dd($validator->errors()->first());
            return redirect()->back()->withErrors($validator);
            // redirect()->back()
            //     ->with('error', $validator->errors()->first())
            //     ->withInput();
        }
        $user = \App\Models\User::where('email',$input['email'])->where('password',$input['password'])->first();
        //  if (Auth::attempt(['email' => $input['email'], 'password' => $input['password']])) {
        // dd($user);
        if($user){
            // dd('gjhg');
            return redirect()->route('profile.index');
        }else{
            Session::flash('error', 'Wrong Credentials!!!');
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
        // if($user){
        //     //dd($user);
            
        // }
    }

    public function logout(Request $request) {
        auth()->logout();
        return redirect()->route('login-page');
    }
}
