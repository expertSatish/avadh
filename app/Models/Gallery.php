<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Gallery extends Model
{
    use HasFactory;

    public static function getData($id)
    {
        $galery = Gallery::find($id);
        if (!$galery) {
            return response()->json(['message' => 'Gallery not found.'], 404);
        }
        // Delete images from the folder
        $images = explode('|', $galery->image);
        foreach ($images as $image) {
            $imagePath = public_path(str_replace("/gallery_image/", "gallery_image/", $image));
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $galery->delete();     
    }

    public static function galleryData()
    {
        return Gallery::get();
    }
}
