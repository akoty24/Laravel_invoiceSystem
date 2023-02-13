<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'invoice_date' => 'required',
            'due_date' => 'required',
            'amount_collection' => 'required',
            'discount' => 'required',
            'value_vat'=>'required',
            'rate_vat'=>'required',
            'total' => 'required',
            'amount_commission' => 'required',
            //'status' => 'required',
           // 'payment_date' => 'required',
          //  'note' => 'required',
           // 'file_name' => 'required',
           // 'section' => 'required',
            //'product' => 'required',
            ];
    }
}
