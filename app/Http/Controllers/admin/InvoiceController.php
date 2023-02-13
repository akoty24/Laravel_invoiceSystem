<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class InvoiceController extends Controller
{
    public function index(){
        $invoices = Invoice::all();
        return view('admin.invoice.index', compact('invoices'));

    }
    public function paid(){
        $invoices = Invoice::where('status','مدفوعة')->get();

        return view('admin.invoice.paid', compact('invoices'));
    }
    public function unpaid(){
        $invoices = Invoice::where('status','غيرمدفوعة')->get();

        return view('admin.invoice.unpaid', compact('invoices'));
    }
    public function paid_partial(){
        $invoices = Invoice::where('status','مدفوعةجزئيا')->get();

        return view('admin.invoice.paid_partial', compact('invoices'));
    }
    public function create(){

        $sections = section::all();
        return view('admin.invoice.create', compact('sections'));
    }
    public function store(InvoiceRequest $request){

        $invoices= new Invoice();
        if($request->file('file_name')) {
            $file = $request->file('file_name');
            $image =$file->getClientOriginalName();
            $file->move(public_path('attachments'), $image);
            $invoices['file_name'] = $image;
        }
        $invoices->invoice_date=$request->invoice_date;
        $invoices->due_date=$request->due_date;
        $invoices->value_vat=$request->value_vat;
        $invoices->rate_vat=$request->rate_vat;
        $invoices->amount_collection=$request->amount_collection;
        $invoices->amount_commission=$request->amount_commission;
        $invoices->discount=$request->discount;
        $invoices->total=$request->total;
        $invoices->note=$request->note;
        $invoices->section_id=$request->section;
        $invoices->product_id=$request->product;
        $invoices->user_id=Auth::user()->id;
        $invoices->save();
        return redirect()->route('index')->with(['success' =>'تم اضافة الفاتورة بنجاح']);
    }
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('admin.invoice.show', compact('invoice'));
    }

    public function edit($id){
        $invoice = Invoice::findOrFail($id);
        $sections = section::all();
        return view('admin.invoice.edit', compact('sections', 'invoice'));

    }
    public function update($id ,Request $request){
        $invoice=Invoice::findOrFail($id);
        if ($request->hasFile('file_name')) {
            $path = 'attachments/' . $invoice->file_name;
            if (file_exists($path)) {
                unlink($path);
            }
            $file = $request->file('file_name');
            $ext = $file->extension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('attachments/'), $filename);
            $invoice->file_name = $filename;
        }
        $invoice->invoice_date=$request->invoice_date;
        $invoice->due_date=$request->due_date;
        $invoice->value_vat=$request->value_vat;
        $invoice->rate_vat=$request->rate_vat;
        $invoice->amount_collection=$request->amount_collection;
        $invoice->amount_commission=$request->amount_commission;
        $invoice->discount=$request->discount;
        $invoice->total=$request->total;
        $invoice->note=$request->note;
        $invoice->section_id=$request->section;
        $invoice->product_id=$request->product;
        $invoice->update();
        return redirect()->route('index')->with(['success' =>'تم تعديل الفاتورة بنجاح']);


    }
    public function delete(Request $request){
        $id=$request->id;
        $invoice = Invoice::find($id);
        Storage::delete($invoice->file_name);
        $invoice->delete();
        return redirect()->back()->with(['success' =>'تم حذف الفاتورة بنجاح']);


    }

    public function change_status(Request $request){
        $id=$request->id;

        $invoices=Invoice::find($id);
        if ($request->status!='غيرمدفوعة') {
            $invoices->update([
                'status' => $request->status,
                'payment_date' => $request->payment_date,
                'user_id'=>Auth::user()->id,


            ]);
            return redirect()->route('index')->with(['success' =>'تم تحديث حالة الدفع بنجاح']);
        }
        else{
            return redirect()->route('index')->with(['error' =>'الفاتورة مدفوعة بالفعل لا يمكن تغييرها ']);
        }



    }


    public function getproducts(Request $request)
    {
        $id=$request->section_id;
        $products = DB::table("products")->where("section_id", $id)->select("name","id")->get();
        return response()->json($products);
    }

public function open_file ($file_name){
    //$files = Storage::disk('public')->path('attachments'.'/'.$file_name);
    //$files= storage_path('public/attachments'.'/'.$file_name);
    $files= public_path('attachments'.'/'.$file_name);
    // $files = Storage::disk('public')->getDriver()->getAdapter()->applyPathPrefix('attachments'.'/'.$file_name);
    return response()->file($files);
    }
    public function download_file($file_name){
        $files= public_path('attachments'.'/'.$file_name);
        return response()->download($files);


    }



}
