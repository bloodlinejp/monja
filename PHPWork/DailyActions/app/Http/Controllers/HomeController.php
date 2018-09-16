<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

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
      $user = Auth::getUser();
      return view('home', compact('user'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $user = Auth::getUser();

      $validatedata = $request->validate([
        'name' => 'required|string|max:255',
        'email' => [
          'required', 'string', 'email', 'max:255', 'confirmed',
          Rule::unique('users')->ignore($user->id),
        ],
        'password' => 'CompareMyPassword',
        'newpassword' => 'required|string|min:8|confirmed',
      ]);

      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->password = Hash::make($request->input('newpassword'));
      $user->save();

    }




}
