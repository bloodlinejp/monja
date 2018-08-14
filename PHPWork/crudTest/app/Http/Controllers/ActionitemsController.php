<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
      $this->middleware('auth');
  }
  /**
   * 項目一覧の表示
   *
   * @return Illuminate\Http\Response
   */
  public function index()
  {
    $actionitems = Actionitem::all();
    return view('action-items.index', ['actionitems' => $actionitems]);
  }
}
