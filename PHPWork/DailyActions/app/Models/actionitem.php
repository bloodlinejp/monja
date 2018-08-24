<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actionitem extends Model
{
  //項目マスタモデル
  protected $table = 'action_items';

  //ユーザ追加不可カラム
  protected $guarded = ['user_id'];
}
