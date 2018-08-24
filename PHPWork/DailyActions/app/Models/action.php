<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
  // 活動記録モデル
  protected $table = 'actions';

  // ユーザ追加不可カラム
  // ユーザID
  protected $guarded = ['user_id'];

  function actionitem()
  {
    return $this->belongsTo('App\Models\Actionitem');
  }

  function user()
  {
    return $this->belongsTo('App\User');
  }

}
