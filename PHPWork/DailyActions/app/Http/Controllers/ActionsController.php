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

  /**
   * 活動内容表示
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $date = date('Y-m-d', time());
    $user_id = Auth::id();

    $actions = Action::where('user_id', $user_id)
      ->where('date', $date)
      ->orderBy('order', 'ASC')
      ->get();

    if ($actions->isEmpty()) {
      // 本日に登録がない場合、項目マスタの有無をチェック
      // 存在しないl場合、項目マスタ新規作成画面を表示

      $actionitems = Actionitem::where('user_id', $user_id)
        ->orderBy('order', 'ASC')
        ->get();

      if ($actionitems->isEmpty()) {
        return view('action-items.create');
      }
      else {
        return view('actions.create', compact('actionitems', 'date'));
      }
    }
    else
    {
      // 本日に登録がある場合、編集画面を出力
      return view('actions.edit', compact('actions', 'date'));
    }
  }

  /**
   *活動内容表示
   *
   * @param  \Illuminate\Http\Request  $date
   * @return \Illuminate\Http\Response
   */
  public function edit($date)
  {
    $user_id = Auth::id();

    $actions = Action::where('user_id', $user_id)
      ->orderBy('order', 'ASC')
      ->where('date', $date)
      ->get();

    if ($actions->isEmpty()) {
      // 本日に登録がない場合、項目マスタの有無をチェック
      // 存在しないl場合、項目マスタ新規作成画面を表示

      $actionitems = Actionitem::where('user_id', $user_id)
        ->orderBy('order', 'ASC')
        ->get();

      if ($actionitems->isEmpty()) {
        return view('action-items.create');
      }
      else {
        return view('actions.create', compact('actionitems', 'date'));
      }
    }
    else
    {
      // 本日に登録がある場合、編集画面を出力
      return view('actions.edit', compact('actions', 'date'));
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
      if (isset($action['from-hour']) and isset($action['from-minute'])) {
        $action['from'] = $action['from-hour'] . ':' . $action['from-minute'];
      }
      unset($action['from-hour']);
      unset($action['from-minute']);

      if (isset($action['to-hour']) and isset($action['to-minute'])) {
        $action['to'] = $action['to-hour'] . ':' . $action['to-minute'];
      }
      unset($action['to-hour']);
      unset($action['to-minute']);

      $insertdata[$i] = $action + $base;

      $i = $i + 1;
    }
    Action::insert($insertdata);
    return redirect('actions/' . $action['date'] . '/edit');
  }


  /**
   * 日次活動内容更新
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $date)
  {
    $postdata = $request->all();
    foreach ($postdata['actions'] as $id => $values) {
    //dd($values);
      if (isset($values['from-hour']) and isset($values['from-minute'])) {
        $values['from'] = $values['from-hour'] . ':' . $values['from-minute'];
      }
      unset($values['from-hour']);
      unset($values['from-minute']);

      if (isset($values['to-hour']) and isset($values['to-minute'])) {
        $values['to'] = $values['to-hour'] . ':' . $values['to-minute'];
      }
      unset($values['to-hour']);
      unset($values['to-minute']);

      Action::find($id)->update($values);

    }
    return redirect('actions/' . $date . '/edit');
  }

}
