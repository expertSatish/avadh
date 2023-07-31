<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
     public static function idByName($id)
    {
        $data = City::find($id);
        return ($data)?$data->name:'';
    }
}
