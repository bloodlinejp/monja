<?php

namespace App\Http\Validators;

use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ExtendedValidator extends Validator
{

  /**
  * @param $attribute
  * @param $value
  * @param $parameters
  * @return int
  */
  public function validateCompareMyPassword($attribute, $value, $parameters)
  {
    $user = Auth::getUser();
    return Hash::check($value, $user->password);
  }


}
