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

      $rules = ['name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => [
          'required', 'string', 'email', 'max:255', 'confirmed',
          Rule::unique('users')->ignore($user->id),
        ],
        'password' => 'CompareMyPassword',
      ];

      if ($request->input('email') == $user->email) {
        $rules['email'] = ['required', 'string', 'email', 'max:255',
          Rule::unique('users')->ignore($user->id),
        ];
      }

      if (!(is_null($request->input('newpassword')) && is_null($request->input('newpassword_confirmation')))) {
        $rules['newpassword'] = 'string|min:8|confirmed';
      }

      $validatedata = $request->validate($rules);

      $user->name = $request->input('name');
      if ($request->input('email') !== $user->email) {
        $user->email = $request->input('email');
      }
      if (!(is_null($request->input('newpassword')) && is_null($request->input('newpassword_confirmation')))) {
        $user->password = Hash::make($request->input('newpassword'));
      }
      $user->save();

      $user = Auth::user();
      return view('home', compact('user'));
    }




}
