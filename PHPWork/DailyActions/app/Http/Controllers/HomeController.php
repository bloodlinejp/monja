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
     * アカウント設定画面
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $user = Auth::getUser();

      $rules = ['password' => 'required|CompareMyPassword'];

      // 名前がnullの場合は検証しない
      if (!(is_null($request->input('name')))) {
        $rules['name'] = 'required|string|max:255';
      }
      // メールアドレス及びメールアドレスの確認入力がnullの場合は検証しない
      if (!(is_null($request->input('email')) && is_null($request->input('email_confirmation')))) {
        $rules['email'] = [
          'required', 'string', 'email', 'max:255', 'confirmed',
          Rule::unique('users')->ignore($user->id),
        ];
      }
      // 新パスワード及び新パスワードの確認入力がnullの場合は検証しない
      if (!(is_null($request->input('newpassword')) && is_null($request->input('newpassword_confirmation')))) {
        $rules['newpassword'] = 'string|min:8|confirmed';
      }

      $validatedata = $request->validate($rules);

      // 名前がnullの場合はDB更新しない
      if (!(is_null($request->input('name'))) && $request->input('name') !== $user->name) {
        $user->name = $request->input('name');
      }
      // メールアドレス及びメールアドレスの確認入力がnullの場合はDB更新しない
      if (!(is_null($request->input('email'))) && $request->input('email') !== $user->email) {
        $user->email = $request->input('email');
      }
      // 新パスワードがnullの場合はDB更新しない
      if (!(is_null($request->input('newpassword')))) {
        $user->password = Hash::make($request->input('newpassword'));
      }
      $user->save();

      $user = Auth::user();
      return view('home', compact('user'));
    }




}
