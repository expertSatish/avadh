<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    public static function saveData($dataVal, $id = null)
    {
      $saveData = ($id) ? faq::find($id) : new faq;
      $saveData->question = $dataVal->question;
      $saveData->answer = $dataVal->answer;
      $saveData->save();
    }
  
    public static function getBlogs($id)
    {
      return faq::where('id', $id)->delete();
    }
}
