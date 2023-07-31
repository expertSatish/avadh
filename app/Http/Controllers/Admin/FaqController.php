<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\MsgApp;
use \Yajra\Datatables\Datatables;
class FaqController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Faq::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = btnEdit(route('faq.edit', $row->id));
                    $btn .= btnDelete(route('faq.destroy', $row->id));
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
       return view('admin.faq.index');
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        faq::saveData($request);
        return redirect()->route('faq.index')->with('success', MsgApp::SUCCESS_ADDED);
    }

    public function show($id)
    {
        faq::getfaq($id);
        return redirect()->back()->with('success', MsgApp::SUCCESS_DEL);
    }

    public function edit($id)
    {
        $data = faq::find($id);
        return view('admin.faq.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        faq::saveData($request,  $id);
        return redirect()->route('faq.index')->with('success', MsgApp::SUCCESS_UPD);
    }

    public function destroy($id)
    {
        return $id;
    }
}
