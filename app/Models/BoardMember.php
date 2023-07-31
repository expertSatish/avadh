<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    use HasFactory;


    public static function saveData($dataVal, $member_image, $id = null)
    {
      $saveData = ($id)? BoardMember::find($id): new BoardMember;
      $saveData->designation = $dataVal->designation;
      $saveData->description = $dataVal->description;
      $saveData->name = $dataVal->name;
      if ($member_image) : $saveData->member_image = $member_image;
    endif;
      $saveData->save();
    }

    public static function getFaculty($id)
    {
      return BoardMember::where('id', $id)->delete();
    }
}
