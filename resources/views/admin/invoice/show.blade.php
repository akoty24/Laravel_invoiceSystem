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
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <a  href="{{route('index')}}" style="width: 100px; border-radius: 10px" class="modal-effect btn btn-danger btn-block btn-sm" data-effect="effect-scale" >الرجوع</a>
                                    </div> <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                </div>

                                @include('alerts.alert')
                                @include('alerts.success')
                                @include('alerts.sweet_alert')
                                @include('alerts.error')
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table display nowrap table-striped table-bordered">
                                            <thead class="">
                                            <tr style="color: white; text-align: center;">
                                                <th colspan="4" > <span class="btn-primary btn-min-width box-shadow-3 btn-sm"  style=" border-radius: 20px;font-size: 22px;font-weight:bold; padding: 10px 120px">التفاصيل </span></th>
                                            </tr>
                                            </thead>
                                          <tbody>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">رقم الفاتورة </span></td>
                                                <td>{{$invoice->id}}</td>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">ناشئ الفاتورة</span></td>
                                                <td>{{$invoice->user->fname." ". $invoice->user->lname}}</td>
                                            </tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">تاريخ الفاتورة</span></td>
                                                <td>{{$invoice->invoice_date}}</td>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">تاريخ الاستحقاق </span></td>
                                                <td>{{$invoice->due_date}}</td>
                                            </tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">البنك</span></td>
                                                <td>{{$invoice->section->name}}</td>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">المنتج</span></td>
                                                <td>{{$invoice->product->name}}</td>
                                            </tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">مبلغ التحصيل</span></td>
                                                <td >{{$invoice->amount_collection}}</td>

                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">مبلغ العمولة</span></td>
                                                <td>{{$invoice->amount_commission}}</td>
                                            </tr>
                                            <tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">الخصم</span></td>
                                                <td >{{$invoice->discount}}</td>

                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">نسبة ضريبة القيمة المضافة</span></td>
                                                <td>{{$invoice->rate_vat}}</td>
                                                    </tr>
                                            <tr>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">قيمة ضريبة القيمة المضافة</span></td>
                                               <td>{{$invoice->value_vat}}</td>
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">الاجمالي شامل الضريبة</span></td>
                                               <td>{{$invoice->total}}</td>
                                            </tr>
                                            <tr>
                                                @can('تغير حالة الدفع')
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">الحالة</span></td>
                                                @if($invoice->status == "مدفوعة")
                                                    <td><a style=" border-radius: 20px;padding: 5px 10px; " href="#exampleModal2" data-toggle="modal" class="btn btn-success  box-shadow-3 btn-sm" title="تغيير حالة الدفع " >{{$invoice->status}}</a></td>
                                                @elseif($invoice->status == "مدفوعةجزئيا")
                                                    <td><a style=" border-radius: 20px;padding: 5px 10px; " href="#exampleModal2"  data-toggle="modal" class="btn btn-blue box-shadow-3 btn-sm" title="تغيير حالة الدفع ">{{$invoice->status}}</a></td>
                                                @else
                                                    <td><a style=" border-radius: 20px;padding: 5px 10px; " href="#exampleModal2" data-toggle="modal" class="btn btn-red  box-shadow-3 btn-sm" title="تغيير حالة الدفع  ">{{$invoice->status}}</a></td>
                                                @endif
                                                @endcan
                                                <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-1 btn-sm"  style=" border-radius: 20px;  font-size: 17px; font-weight: bold; color: black">تاريخ الدفع</span></td>
                                                <td>{{$invoice->payment_date}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">
                                        </div>

                                        <table class="table">
                                            <thead class="">
                                            <tr style="color: white; text-align: center; ">
                                                <th colspan="3" > <span class="btn-primary btn-min-width box-shadow-3 btn-sm"  style=" border-radius: 20px;font-size: 22px;font-weight:bold; padding: 10px 120px">المرفقات </span></th>
                                            </tr>
                                            <tr style="text-align: center;">
                                                <th>اسم المرفق </th>
                                                <th>ملاحظات</th>
                                                <th>اجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                    <tr style="text-align: center;">
                                                        @if($invoice->file_name || $invoice->note)
                                                        <td>{{$invoice->file_name}}</td>
                                                        <td>{{$invoice->note}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                @if($invoice->file_name)
                                                                <a href="{{route('open.file_name',$invoice->file_name)}}"  class="btn btn-outline-amber btn-sm mr-1 mb-1" style="border-radius: 20px">عرض</a>
                                                                <a href="{{route('download.file_name',$invoice->file_name)}}"  class=" btn btn-outline-primary btn-sm mr-1 mb-1"style="border-radius: 20px" >تحميل</a>
                                                                @else

                                                                @endif
                                                            </div>
                                                        </td>
                                                        @else
                                                            <td style="color: red">لا يوجد</td>
                                                            <td style="color: red">لا يوجد</td>
                                                        @endif
                                                    </tr>
                                            </tbody>
                                        </table>
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
                                                                <input type="hidden" name="id" id="id" class="form-control">
                                                            </div>
                                                            <div style="float: right">  <label style="color:white;" class="my-1 mr-2" for="inlineFormCustomSelectPref">الحالة</label>
                                                                <input type="button"  name="status"  id="status" class="btn-primary btn-min-width box-shadow-3 btn-sm" style=" border-radius: 20px;padding: 5px 0; "><br>
                                                            </div>
                                                            <label style="color:white;" class="my-1 mr-2" for="inlineFormCustomSelectPref">انقر لتغيير الحالة الحالة</label>
                                                            <select name="status" id="status" class="custom-select my-1 mr-sm-2" required>
                                                                <option  style="color: green" value="مدفوعة">مدفوعة</option>
                                                                <option  style="color: blue" value="مدفوعةجزئيا" > مدفوعةجزئيا</option>
                                                                <option  style="color: red" value="غيرمدفوعة" > غيرمدفوعة</option>
                                                            </select>
                                                            <label style="color:white;" for="exampleInputEmail1">تاريخ الدفع </label>
                                                            <input type="date" class="form-control"  id="payment_date"  name="payment_date" required>

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
                </section>
            </div>
        </div>
    </div>
@endsection
