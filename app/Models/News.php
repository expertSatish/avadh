<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class News extends Model
{
    use HasFactory;

    protected $fillable = [
      'news_images',
      'title',
      'description',
      'pdf',
      'link',
      'start_date',
      'expiry_date',
      'slug',
  ];

  
    public static function getData($id)
    {
      return News::where('id', $id)->delete();
    }
}
