<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MsgApp;
use App\Models\News;
use Illuminate\Support\Str;
use SebastianBergmann\Type\NullType;
use Illuminate\Support\Facades\Log;
use \Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = News::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('description', function ($row) {
                    return htmlspecialchars_decode($row->description);
                })
                ->addColumn('action', function ($row) {
                    $btn = btnEdit(route('manage-news.edit', $row->id));
                    $btn .= btnDelete(route('manage-news.destroy', $row->id));
                    return $btn;
                })
                ->rawColumns(['action','description','long_desc'])
                ->make(true);
        }
        return view('admin.news.index');
    }
    
    public function create()
    {
        return view('admin.news.create');

    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date',
            'expiry_date' => 'required|date|after:start_date',
            // 'pdf' => 'required|file|mimes:pdf|max:10000',
            // 'news_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'link' => 'nullable|url',
            'description' => 'required|string',
        ]);

        $imageUrls = array();
        if ($request->hasFile('news_images')) {
            foreach ($request->file('news_images') as $imageFile) {
                if ($imageFile->isValid()) {
                    $image_name = md5(rand(1000, 10000));
                    $ext = strtolower($imageFile->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $upload_path = 'news_images/';
                    $image_url = $upload_path . $image_full_name;

                    // Move the image to the specified path
                    $imageFile->move($upload_path, $image_full_name);

                    $imageUrls[] = $image_url;
                }
            }
        }

        $pdfFilePath = null; // Initialize $pdfFilePath to null
        if ($request->hasFile('pdf')) {
            $pdfFileName = random_int(1000000, 9999999) . '-' . time() . '.' . $request->file('pdf')->getClientOriginalExtension();
            $pdfFilePath = 'pdf/' . $pdfFileName;
            $request->file('pdf')->move(public_path('pdf'), $pdfFileName);
        }

        // Create a new News model instance and save it to the database
        $news = new News([
            'news_images' => implode('|', $imageUrls),
            'pdf' => $pdfFilePath,
            'title' => $request->title,
            'start_date' => $request->start_date,
            'expiry_date' => $request->expiry_date,
            'link' => $request->link,
            'description' => $request->description,
            'slug' => Str::slug($request->title),
        ]);

        $news->save();

        return redirect()->route('manage-news.index')->with('success', 'News added successfully');
    }
    

   
    public function show($id)
    {
        News::getData($id);
        return redirect()->back()->with('success', MsgApp::SUCCESS_DEL);
    }

    
    public function edit($id)
    {
        $user = auth()->user();
        $data = News::find($id);
        return view('admin.news.edit', compact('data',));
    }

  
    public function update(Request $request, $id)
{
    // Retrieve the news item by ID
    $news = News::findOrFail($id);

    // Validation rules for updating the news item
    $request->validate([
        'title' => 'required|string|max:255|unique:news,title,' . $id,
        'start_date' => 'required|date',
        'expiry_date' => 'required|date|after:start_date',
        // You can add more validation rules as needed
    ]);

    // Update the news item fields
    $news->title = $request->title;
    $news->start_date = $request->start_date;
    $news->expiry_date = $request->expiry_date;
    $news->link = $request->link;
    $news->description = $request->description;
    $news->slug = Str::slug($request->title);

    // Handle PDF file update
    if ($request->hasFile('pdf')) {
        // Delete the old PDF file if it exists
        if ($news->pdf) {
            unlink(public_path($news->pdf));
        }

        $pdfFileName = random_int(1000000, 9999999) . '-' . time() . '.' . $request->file('pdf')->getClientOriginalExtension();
        $pdfFilePath = 'pdf/' . $pdfFileName;
        $request->file('pdf')->move(public_path('pdf'), $pdfFileName);
        $news->pdf = $pdfFilePath;
    }

    // Handle news images update
    if ($request->hasFile('news_images')) {
        $imageUrls = array();
        foreach ($request->file('news_images') as $imageFile) {
            if ($imageFile->isValid()) {
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($imageFile->getClientOriginalExtension());
                $image_full_name = $image_name . '.' . $ext;
                $upload_path = 'news_images/';
                $image_url = $upload_path . $image_full_name;

                // Move the image to the specified path
                $imageFile->move($upload_path, $image_full_name);

                $imageUrls[] = $image_url;
            }
        }
        // Delete the old news images if they exist
        $existingImages = explode('|', $news->news_images);
        foreach ($existingImages as $existingImage) {
            unlink(public_path($existingImage));
        }

        $news->news_images = implode('|', $imageUrls);
    }

    // Save the updated news item to the database
    $news->save();

    return redirect()->route('manage-news.index')->with('success', 'News updated successfully');
}

   
    public function destroy($id)
    {
        return $id;
    }
}
