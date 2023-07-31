<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use \Yajra\Datatables\Datatables;
use App\MsgApp;

class EventCategoryController extends Controller
{
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = EventCategory::select('*');
            return Datatables::of($data)
                ->addColumn('action', function ($row) {
                    $btn = btnEdit(route('event-category.edit', $row->id));
                    $btn .= btnDelete(route('event-category.destroy', $row->id));
                    return $btn;
                })
                ->addColumn('thumbnail_img', function ($artist) {
                    $url= asset($artist->thumbnail_img	);
                    return $url;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.eventCategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventCategory.create');
    }

  
    public function store(Request $request)
    {
        
        $award = (new \App\Http\Controllers\CommonController)->uploadFile($request, 'thumbnail_img', '/thumbnail_img');
        EventCategory::saveData($request,  $award);
        return redirect()->route('event-category.index')->with('success', MsgApp::SUCCESS_ADDED);
    }

  
    public function show($id)
    {
        EventCategory::getDepartment($id);
        return redirect()->back()->with('success', MsgApp::SUCCESS_DEL);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = EventCategory::find($id);
        return view('admin.eventCategory.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $award = (new \App\Http\Controllers\CommonController)->uploadFile($request, 'thumbnail_img', '/thumbnail_img');
        EventCategory::saveData($request, $award,$id);
        return redirect()->route('event-category.index')->with('success', MsgApp::SUCCESS_UPD);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return $id;
    }
}
