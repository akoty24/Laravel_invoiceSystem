<?php

namespace App\Exports;

use App\Models\Invoice;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Invoice::all();
       // return invoices::select('invoice_date', 'due_date','section_id', 'product_id', 'amount_collection','amount_commission', 'rate_vat', 'value_vat','total', 'status', 'payment_date','note')->get();

    }
}
