<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'images',
        'title',
        'description',
        'event_name',
    ];

    public static function getData($id)
    {
        $event = Event::find($id);
        if (!$event) {
            return response()->json(['message' => 'Event not found.'], 404);
        }
        // Delete images from the folder
        $images = explode('|', $event->images);
        foreach ($images as $image) {
            $imagePath = public_path(str_replace("/event_image/", "event_image/", $image));
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }
        $event->delete();     
    }

    public static function eventData()
    {
        return Event::get();
    }
}
