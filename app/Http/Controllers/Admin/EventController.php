<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\MsgApp;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Str;
use App\Models\EventCategory;


class EventController extends Controller
{
    public function index(Request $request)
    {
        $availData = Event::get();
        return view('admin.events.index', compact('availData'));
    }

    public function create()
    {
        $data = EventCategory::eventCategoryData();
        return view('admin.events.create',compact('data'));
    }
    public function store(Request $request)
    {
        $image = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'event_image/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        Event::insert([
            'images' => implode('|', $image),
            'title' => $request->title,
            'event_name'=>$request->event_name,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
           
        ]);

        return redirect()->route('manage-event.index')->with('success', MsgApp::SUCCESS_ADDED);
    }

    public function show($id)
    {
        Event::getData($id);
        return redirect()->back()->with('success', MsgApp::SUCCESS_DEL);
    }

    public function edit($id)
    {
        $data = Event::find($id);
        $eventcategory = EventCategory::eventCategoryData();
        return view('admin.events.edit',compact('data','eventcategory'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found.'], 404);
        }

        $image = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'event_image/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        $event->title = $request->title;
        $event->description = $request->description;
        $event->event_name = $request->event_name;
        $event->slug = Str::slug($request->title);

        if (!empty($image)) {
            $oldImages = explode('|', $event->images);
            foreach ($oldImages as $oldImage) {
                if (file_exists(public_path($oldImage))) {
                    unlink(public_path($oldImage));
                }
            }
            $event->images = implode('|', $image);
        }
        $event->save();
        return redirect()->route('manage-event.index')->with('success', MsgApp::SUCCESS_UPD);
    }
    // ...


    // ...

    public function destroy($id)
    {
        return $id;
    }
}
