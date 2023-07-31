<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BoardMember as ModelsBoardMember;
use Illuminate\Http\Request;
use App\MsgApp;
use \Yajra\Datatables\Datatables;
class BoardMember extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ModelsBoardMember::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('description', function ($row) {
                    return htmlspecialchars_decode($row->description);

                })
                ->addColumn('member_image', function ($artist) {
                    $url= asset($artist->member_image);
                    return $url;
                })
                ->addColumn('action', function ($row) {
                    $btn = btnEdit(route('manage-board_member.edit', $row->id));
                    $btn .= btnDelete(route('manage-board_member.destroy', $row->id));
                    return $btn;
                })
                ->rawColumns(['action','description'])
                ->make(true);
        }
        return view('admin.board_member.index');
    }

    public static function idByName($id)
    {
        $data = ModelsBoardMember::find($id);
        return $data->name;
    }

    public function create()
    {
        return view('admin.board_member.create');
    }

    public function store(Request $request)
    {
        $member_image = (new \App\Http\Controllers\CommonController)->uploadFile($request, 'member_image', '/member_image');
        ModelsBoardMember::saveData($request,$member_image);
        return redirect()->route('manage-board_member.index')->with('success', MsgApp::SUCCESS_ADDED);
    }
    public function show($id)
    {
        ModelsBoardMember::getFaculty($id);
        return redirect()->back()->with('success', MsgApp::SUCCESS_DEL);
    }

    public function edit($id)
    {
        $data = ModelsBoardMember::find($id);
        return view('admin.board_member.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $faculty_image = (new \App\Http\Controllers\CommonController)->uploadFile($request, 'faculty_image', '/faculty_image');
        ModelsBoardMember::saveData($request, $faculty_image, $id);
        return redirect()->route('manage-board_member.index')->with('success', MsgApp::SUCCESS_UPD);
    }

    public function destroy($id)
    {
    return $id;
    }
}
