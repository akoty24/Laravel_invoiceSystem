@extends('admin.layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الفواتير </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('index')}}">الفواتير</a>
                                </li>
                                <li class="breadcrumb-item active">فاتورة رقم {{$invoice->id}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section  id="print">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="col-sm-6 col-md-4 col-xl-3">
                                    <button style="border-radius: 10px;" class="btn btn-danger box-shadow-3  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> طباعة</button>
                                </div>
                                <div class="card-header">

                              <div style="text-align: center;color: #444; font-size: 50px;font-weight: bold;">
                                  <span>تحصيل فاتورة </span>
                              </div>
                                </div>

                                @include('alerts.alert')
                                @include('alerts.success')
                                @include('alerts.sweet_alert')
                                @include('alerts.error')
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <div class="row row-sm">
                                            <div class="col-md-12 col-xl-12">
                                                <div class=" main-content-body-invoice">
                                                    <div class="card card-invoice">
                                                        <div class="card-body">
                                                            <div class="row mg-t-20" >
                                                                    <div class="col-md">
                                                                        <label class="tx-gray-600">Billed To</label>
                                                                        <div class="billed-to">
                                                                            <h6>Juan Dela Cruz</h6>
                                                                            <p>4033 Patterson Road, Staten Island, NY 10301<br>
                                                                                Tel No: 324 445-4544<br>
                                                                                Email: youremail@companyname.com</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                        <table class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr >
                                                <th colspan="4" style="color: #444; text-align: center; font-size: 20px"> معلومات الفاتورة</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">رقم الفاتورة </span></td>
                                                <td>{{$invoice->id}}</td>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">ناشئ الفاتورة</span></td>
                                                <td>{{$invoice->user->fname." ". $invoice->user->lname}}</td>
                                            </tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">تاريخ الفاتورة</span></td>
                                                <td>{{$invoice->invoice_date}}</td>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">تاريخ الاستحقاق </span></td>
                                                <td>{{$invoice->due_date}}</td>
                                            </tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">البنك</span></td>
                                                <td>{{$invoice->section->name}}</td>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">المنتج</span></td>
                                                <td>{{$invoice->product->name}}</td>
                                            </tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">مبلغ التحصيل</span></td>
                                                <td >{{number_format($invoice->amount_collection,2)}}</td>

                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">مبلغ العمولة</span></td>
                                                <td>{{number_format($invoice->amount_commission,2)}}</td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">الخصم</span></td>
                                                <td >{{number_format($invoice->discount,2)}}</td>

                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">نسبة ضريبة القيمة المضافة</span></td>
                                                <td>{{$invoice->rate_vat}}</td>
                                            </tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">قيمة ضريبة القيمة المضافة</span></td>
                                                <td>{{number_format($invoice->value_vat,2)}}</td>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: #686060">الاجمالي شامل الضريبة</span></td>
                                                <td style="font-weight: bold;font-size:19px;color: red">{{number_format($invoice->total,2)}}</td>
                                            </tr>

                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">
                                        </div>

                                        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">تعديل حالة</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action='{{route('change.invoice.status')}}' method="post">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="hidden" class="form-control" name="id" id="id" value="{{$invoice->id}}">
                                                            </div>
                                                            <label style="color:white;" class="my-1 mr-2" for="inlineFormCustomSelectPref">الحالة</label>
                                                            <input  value="{{$invoice->status}}" class="custom-select my-1 mr-sm-2" required>

                                                            <select name="status" class="custom-select my-1 mr-sm-2" required>
                                                                <option  style="color: #686060" selected>اختار الحالة</option>
                                                                <option  style="color: #686060" value="مدفوعة">مدفوعة</option>
                                                                <option  style="color: #686060" value="غيرمدفوعة" > غيرمدفوعة</option>
                                                            </select>
                                                            <label style="color:white;" for="exampleInputEmail1">تاريخ الدفع </label>
                                                            <input type="date" class="form-control"  value="{{$invoice->payment_date}}" id="payment_date"  name="payment_date" required>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">تعديل الحالة</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                                </div>
                                            </div>
                        </div>
                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>
@endsection
