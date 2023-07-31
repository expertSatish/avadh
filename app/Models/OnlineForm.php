<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineForm extends Model
{
    use HasFactory;
     public static function OnlineFormData()
    {
        return OnlineForm::get();
    }
}
