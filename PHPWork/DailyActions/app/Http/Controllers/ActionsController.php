<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Action;
use App\Models\Actionitem;

class ActionsController extends Controller
{
  public function __construct()
  {
    //認証済か確認
    $this->middleware('auth');

  }

  public function index()
  {
    $today = date('Y-m-d');
    $user_id = Auth::id();

    $actions = Action::where('user_id', $user_id)
      ->orderBy('order', 'ASC')
      ->where('date', $today)
      ->get();

    if ($actions->isEmpty()) {
      // 本日に登録がない場合、項目マスタの有無をチェック
      // 存在しないl場合、項目マスタ新規作成画面を表示

      $actionitems = Actionitem::where('user_id', $user_id)->get();

      if ($actionitems->isEmpty()) {
        return view('action-items.create');
      }
      else {
        return view('actions.create', compact('actionitems', 'today'));
      }
    }
    else
    {
      // 本日に登録がある場合、編集画面を出力
      return view('actions.edit', compact('actions', 'today'));
    }
  }

  /**
   * 新規日次活動内容保存
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
//    dd($request);
    $postdata = $request->all();

    $user_id = Auth::id();

    $insertdata = array();

    $base = [
      'user_id'       => $user_id,
      'date'          => '',
      'order'         => '',
      'actionitem_id' => '',
      'from'          => '',
      'to'            => '',
      'text'          => '',
      'value'         => '0',
      'checkbox'      => '0',
    ];

    $i = 0;

    foreach ($postdata['actions'] as $action) {
      //dd($action);
      $insertdata[$i] = $action + $base;
      $i = $i +1;
    }
//    dd($insertdata);
    Action::insert($insertdata);
    return redirect('actions');
  }


  /**
   * 日次活動内容更新
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request)
  {

    $postdata = $request->all();
    // dd($postdata['actions']);
    foreach ($postdata['actions'] as $id => $values) {

      Action::find($id)->update($values);

    }
    return redirect('/');
  }

}
