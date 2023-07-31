<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EventCategory extends Model
{
    use HasFactory;
    public static function saveData($dataVal,$awards,  $id = null)
    {
      $saveData = ($id) ? EventCategory::find($id) : new EventCategory;
      if ($awards) : $saveData->thumbnail_img = $awards;
      endif;
      $saveData->title = $dataVal->title;
      $saveData->	short_desc = $dataVal->	short_desc;
      $saveData->slug = Str::slug($dataVal->title);
      $saveData->save();
    }

    public static function getDepartment($id)
    {
      $categoriesList = EventCategory::find($id);
      unlink(str_replace("/thumbnail_img/", "thumbnail_img/",$categoriesList->thumbnail_img	));
      $categoriesList->delete();
    }
    
    public static function eventCategoryData()
    {
        return EventCategory::get();
    }
}
