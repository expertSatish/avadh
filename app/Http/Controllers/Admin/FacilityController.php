<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\MsgApp;
use \Yajra\Datatables\Datatables;
class FacilityController extends Controller
{
    public function index(Request $request)
    {
        $availData = Facility::first();
        if ($request->ajax()) {
            $data = Facility::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('facility_image', function ($artist) {
                    $url= asset($artist->facility_image);
                    return $url;
                })
                ->editColumn('description', function ($row) {
                    return htmlspecialchars_decode($row->description);

                })
                ->addColumn('action', function ($row) {
                    $btn = btnEdit(route('manage-facilities.edit', $row->id));
                    $btn .= btnDelete(route('manage-facilities.destroy', $row->id));
                    return $btn;
                })
                ->rawColumns(['action','description'])
                ->make(true);
        }
        return view('admin.facility.index',compact('availData'));
    }

    public function create()
    {
        return view('admin.facility.create');
    }

    public function store(Request $request)
    {
        $facility_image = (new \App\Http\Controllers\CommonController)->uploadFile($request, 'facility_image', '/facility');
        Facility::saveData($request, $facility_image);
        return redirect()->route('manage-facilities.index')->with('success', MsgApp::SUCCESS_ADDED);
    }

    public function show($id)
    {
        Facility::getData($id);
        return redirect()->back()->with('success', MsgApp::SUCCESS_DEL);
    }

    public function edit($id)
    {
        $data = Facility::find($id);
        return view('admin.facility.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $facility_image = (new \App\Http\Controllers\CommonController)->uploadFile($request, 'facility_image', '/facility');
        Facility::saveData($request, $facility_image,$id);
        return redirect()->route('manage-facilities.index')->with('success', MsgApp::SUCCESS_ADDED);
    }

    public function destroy($id)
    {
       return $id;
    }
}
