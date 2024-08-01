<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Providers\Gl;
use Illuminate\Http\Request;
use App\Mail\VerifyMail;
use Mail;

Route::get(Gl::$routes['homeRoute'], function () {
  $recommendedList = DB::table('idea')
    ->select('idea_id', 'idea_name as name', 'desc as description', 'deadline', 'price_cents as price', 'img_name')
    ->get()
    ->map(function ($item) { return (array) $item; })
    ->toArray();
  return view('home', ['recommendedList' => $recommendedList]);
});

Route::get(Gl::$routes['loginRoute'], function (){
  return view('login');
});

Route::get(Gl::$routes['ideaRoute'], function (Request $request){
  $idea_id = $request->get("idea_id");
  $ideaDetails = DB::table('idea')->select('idea_name as name', 'desc', 'deadline', 'price_cents as price', 'img_name')->where("idea_id", $idea_id)->get();
  return view('idea', ['ideaDetails' => (array)$ideaDetails->toArray()[0]]);
});

Route::post(Gl::$routes['loginRoute'], function (Request $request){
  $request->validate([
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:6',
  ]);

  $credentials = $request->only('email', 'password');
  $remember = $request->has('remember');

  if (Auth::attempt($credentials, $remember)) {
    return redirect()->intended(Gl::$routes['homeRoute']);
  }
  return redirect(Gl::$routes['loginRoute'])->withErrors([
    'email' => 'The provided credentials do not match our records.',
  ]);
});

Route::get(Gl::$routes['signupRoute'], function (){
  return view('signup');
});

Route::post(Gl::$routes['signupRoute'], function (Request $request) {
  $validatedData = $request->validate([
    'email' => 'required|email|unique:users,email',
    'passw' => 'required|min:6',
    'uname' => 'required|string|max:255',
  ]);

  DB::table('users')->insert([
    'name'=>$validatedData['uname'],
    'email'=>$validatedData['email'],
    'password' => bcrypt($validatedData['passw']),
    'created_at' => now(),
    'updated_at' => now(),
  ]);

  Mail::to('anar.abdullazada@ufaz.az')->send(new VerifyMail());

  return redirect(Gl::$routes['homeRoute']);
});

