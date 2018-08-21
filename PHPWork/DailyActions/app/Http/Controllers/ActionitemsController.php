<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Actionitem;

class ActionitemsController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //認証済か確認
    $this->middleware('auth');
  }

  /**
   * 項目一覧の表示
   *
   * @return Illuminate\Http\Response
   */
  public function index()
  {
    $user_id = Auth::id();
    $actionitems = Actionitem::where('user_id', $user_id)->get();
    return view('action-items.index', ['actionitems' => $actionitems]);
  }

  /**
   * 項目新規登録画面の表示
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
  return view('action-items.create');
  }

  /**
   * 新規項目の保存
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $user_id = Auth::id();

    $actionitem = new Actionitem;
    $actionitem->user_id = $user_id;
    $actionitem->index1text = $request->input('index1text');
    $actionitem->index2text = $request->input('index2text');
    $actionitem->index2use = $request->input('index2use', 0);
    $actionitem->index3text = $request->input('index3text');
    $actionitem->index3use = $request->input('index3use', 0);
    $actionitem->from = $request->input('from', 0);
    $actionitem->to = $request->input('to', 0);
    $actionitem->text = $request->input('text', 0);
    $actionitem->lines = $request->input('lines');
    $actionitem->value = $request->input('value', 0);
    $actionitem->checkbox = $request->input('checkbox', 0);
    $actionitem->save();
    //return redirect('action-items/'.$actionitem->id);
    return redirect('action-items');
  }

  /**
   * 選択項目画面の表示
   *
   * @param  \App\Models\Actionitem  $actionitem
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $user_id = Auth::id();
		$actionitem = Actionitem::where('user_id', $user_id)->findOrFail($id);

    return view('action-items.show', ['actionitem' => $actionitem]);
  }

  /**
   * 選択項目編集画面の表示
   *
   * @param  App\Models\Actionitem  $actionitem
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $user_id = Auth::id();
		$actionitem = Actionitem::where('user_id', $user_id)->findOrFail($id);

    return view('action-items.edit', ['actionitem' => $actionitem]);
  }

  /**
   * 選択項目更新
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  App\Models\Actionitem  $actionitem
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $user_id = Auth::id();
    $actionitem = Actionitem::where('user_id', $user_id)->findOrFail($id);

    $actionitem->index1text = $request->input('index1text');
    $actionitem->index2text = $request->input('index2text');
    $actionitem->index2use = $request->input('index2use', 0);
    $actionitem->index3text = $request->input('index3text');
    $actionitem->index3use = $request->input('index3use', 0);
    $actionitem->from = $request->input('from', 0);
    $actionitem->to = $request->input('to', 0);
    $actionitem->text = $request->input('text', 0);
    $actionitem->lines = $request->input('lines');
    $actionitem->value = $request->input('value', 0);
    $actionitem->checkbox = $request->input('checkbox', 0);
    $actionitem->save();

    return redirect('action-items/'.$actionitem->id);
  }

  /**
   * 選択項目削除
   *
   * @param  App\Models\Actionitem  $actionitem
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $user_id = Auth::id();

    $actionitem = Actionitem::where('user_id', $user_id)->findOrFail($id);
    $actionitem->delete();

    $actionitems = Actionitem::where('user_id', $user_id)->get();
    return view('action-items.index', ['actionitems' => $actionitems]);
  }

}
