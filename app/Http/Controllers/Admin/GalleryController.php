<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\MsgApp;
use \Yajra\Datatables\Datatables;

class GalleryController extends Controller
{

    public function index(Request $request)
    {
        $availData = Gallery::get();
        return view('admin.gallery.index',compact('availData'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $image = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'gallery_image/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        Gallery::insert([
            'image' => implode('|', $image),
        ]);
        return redirect()->route('gallery.index')->with('success', MsgApp::SUCCESS_ADDED);
    }

    public function show($id)
    {
        Gallery::getData($id);
        return redirect()->back()->with('success', MsgApp::SUCCESS_DEL);
    }


    public function edit($id)
    {
        $data = Gallery::find($id);
        return view('admin.gallery.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found.'], 404);
        }

        $image = array();
        if ($files = $request->file('images')) {
            foreach ($files as $file) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'gallery_image/';
                $image_url = $upload_path . $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }
        }
        if (!empty($image)) {
            $oldImages = explode('|', $gallery->image);
            foreach ($oldImages as $oldImage) {
                if (file_exists(public_path($oldImage))) {
                    unlink(public_path($oldImage));
                }
            }
            $gallery->image = implode('|', $image);
        }
        $gallery->save();

        return redirect()->route('gallery.index')->with('success', MsgApp::SUCCESS_ADDED);
    }

    public function destroy($id)
    {

        return $id;
    }
}
