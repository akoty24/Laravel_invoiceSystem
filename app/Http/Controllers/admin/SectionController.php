<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function index()
    {
        $sections=Section::get();
        return view('admin.section.index',compact('sections'));
    }
    public function create()
    {
        //
    }
    public function store(SectionRequest $request)
    {
        $sections =new Section();
        $sections->name=$request->name;
        $sections->description=$request->description;
        $sections->user_id = (Auth::user()->id);
        $sections->save();

        return redirect()->back()->with(['success' =>'Section added successfully']);

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request)
    {
         //        validation
        $id = $request->id;
        $this->validate($request, [
            'name' => 'required|unique:sections,name,'.$id,
        ]);
        //           update
            $sections = Section::find($id);
            $sections->update([
            'id'=>$id,
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        return redirect()->back()->with(['success' =>'Section updated successfully']);

    }
    public function destroy(Request $request)
    {
        $id = $request->id;
        Section::find($id)->delete();
        return redirect()->back()->with(['success' =>'Section deleted successfully']);

    }
}
