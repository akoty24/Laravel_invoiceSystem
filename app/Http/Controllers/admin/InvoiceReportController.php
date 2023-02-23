<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceReportController extends Controller
{
    public function index(){

        return view('admin.reports.invoice_report');

    }

    public function search_invoices(Request $request){

        $rdio = $request->rdio;
        // في حالة البحث بنوع الفاتورة
        if ($rdio == 1) {
            // في حالة عدم تحديد تاريخ
            if ($request->type && $request->start_at =='' && $request->end_at =='') {
                $invoices = Invoice::where('status',$request->type)->get();
                $type = $request->type;
                return view('admin.reports.invoice_report',compact('type','invoices'));
            }
            // في حالة تحديد تاريخ استحقاق
            else {
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;
                $invoices = Invoice::whereBetween('invoice_Date',[$start_at,$end_at])->where('status',$request->type)->get();
                return view('admin.reports.invoice_report',compact('type','start_at','end_at','invoices'));
            }

        }
//====================================================================

// في البحث برقم الفاتورة
        else {
            $invoices = Invoice::where('id',$request->invoice_number)->get();
            return view('admin.reports.invoice_report',compact('invoices'));
        }
    }
}
