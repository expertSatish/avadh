<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Facility extends Model
{
    use HasFactory;
    public static function saveData($dataVal, $image, $id = null)
    {
      $saveData = ($id) ? Facility::find($id) : new Facility;
      if ($image) : $saveData->facility_image = $image;
      endif;
      $saveData->description = $dataVal->description;
      $saveData->title = $dataVal->title;
      $saveData->slug = Str::slug($dataVal->title);
      $saveData->description = $dataVal->description;
      $saveData->save();
    }
  
    public static function getData($id)
    {
        $categoriesList = Facility::find($id);
      unlink(str_replace("/facility/", "facility/",$categoriesList->facility_image));
      $categoriesList->delete();
     
    }
}
