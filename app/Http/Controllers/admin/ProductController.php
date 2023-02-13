<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $sections=Section::all();
        $products=Product::all();
        return view('admin.product.index',compact('products','sections'));
    }

    public function create()
    {
        //
    }

    public function store(ProductRequest $request)
    {
        Product::create([
            'name'=>$request->name,
            'section_id'=>$request->section_id,
            'description'=>$request->description,
        ]);

        return redirect()->back()->with(['success' =>'Product added successfully']);
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
//        مهمة //
        $id = Section::where('name', $request->section_name)->first()->id;
        $products = Product::find($request->id);
        $products->update([
            'name' => $request->name,
            'description' => $request->description,
            'section_id' => $id,
        ]);
        return redirect()->back()->with(['success' =>'Product updated successfully']);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        Product::find($id)->delete();
        return redirect()->back()->with(['success' =>'Product deleted successfully']);
    }
}
