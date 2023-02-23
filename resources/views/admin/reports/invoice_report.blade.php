@extends('admin.layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> تقارير الفواتير
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content-body">
                <!-- Basic form la
                yout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 style="font-weight: bold ;font-size: 25px " class="card-title"
                                        id="basic-layout-form"> تقارير الفواتير </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <form action="{{route('search.invoices')}}" method="POST" role="search"
                                              autocomplete="off">
                                            {{ csrf_field() }}
                                            <div class="col-lg-3">
                                                <label class="rdiobox">
                                                    <input checked name="rdio" type="radio" value="1" id="type_div">
                                                    <span style="color: black">بحث بنوع الفاتورة</span></label>
                                            </div>


                                            <div class="col-lg-3 mg-t-20 mg-lg-t-0">
                                                <label class="rdiobox"><input name="rdio" value="2" type="radio"><span
                                                            style="color: black">بحث برقم الفاتورة</span></label>
                                            </div>

                                            <br><br>

                                            <div class="row">

                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="type">
                                                    <p class="mg-b-10" style="color: black">تحديد نوع الفواتير</p>
                                                    <select style="width: 70%;" class="form-control select2" name="type"
                                                            required>
                                                        <option value="{{ $type ?? 'حدد نوع الفواتير' }}"
                                                                selected>{{ $type ?? 'حدد نوع الفواتير' }}</option>
                                                        <option value="مدفوعة">الفواتير المدفوعة</option>
                                                        <option value="غيرمدفوعة">الفواتير الغير مدفوعة</option>
                                                        <option value="مدفوعةجزئيا">الفواتير المدفوعة جزئيا</option>

                                                    </select>
                                                </div><!-- col-4 -->

                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="invoice_number">
                                                    <p class="mg-b-10">البحث برقم الفاتورة</p>
                                                    <div class="col">
                                                        <input style="width: 70%; background: white"
                                                               placeholder="ادخل رقم الفاتورة" type="number"
                                                               class="form-controll" id="invoice_number"
                                                               name="invoice_number">
                                                    </div>
                                                </div><!-- col-4 -->

                                                <div class="col-lg-3" id="start_at">
                                                    <label style="color: black" for="exampleFormControlSelect1">من
                                                        تاريخ</label>

                                                    <div class="col">
                                                        <input style="width: 70%;" class="form-controll "
                                                               name="start_at" placeholder="YYYY-MM-DD"
                                                               type="date" value="{{ $start_at ?? '' }}">
                                                    </div>
                                                    <!-- input-group -->
                                                </div>

                                                <div class="col-lg-3" id="end_at">
                                                    <label style="color: black" for="exampleFormControlSelect1">الي
                                                        تاريخ</label>

                                                    <div class="col">
                                                        <input style="width: 70%;" class="form-controll " name="end_at"
                                                               placeholder="YYYY-MM-DD"
                                                               type="date" value="{{ $end_at ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-sm-1 col-md-1">
                                                    <button class="btn btn-primary btn-block">بحث</button>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @if (isset($invoices))
                                                    <table id="example" class="table key-buttons text-md-nowrap"
                                                           style=" text-align: center">
                                                        <thead>
                                                        <tr>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px"> #</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">رقم الفاتورة</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">تاريخ القاتورة</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">تاريخ الاستحقاق</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">المنتج</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">القسم</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">الخصم</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">نسبة الضريبة</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">قيمة الضريبة</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">الاجمالي</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">الحالة</span>
                                                            </th>
                                                            <th><span class="badge badge-light box-shadow-3"
                                                                      style=" border-radius: 20px;background: #666EE8; font-size: 18px">ملاحظات</span>
                                                            </th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                        @foreach ($invoices as $invoice)
                                                                <?php $i++; ?>
                                                            <tr>
                                                                <td>{{ $i }}</td>
                                                                <td>{{ $invoice->id }} </td>
                                                                <td>{{ $invoice->invoice_date }}</td>
                                                                <td>{{ $invoice->due_date }}</td>
                                                                <td>{{ $invoice->product->name }}</td>
                                                                <td>{{ $invoice->section->name }}</td>
                                                                <td>{{ $invoice->discount }}</td>
                                                                <td>{{ $invoice->rate_vat }}</td>
                                                                <td>{{ $invoice->value_vat }}</td>
                                                                <td>{{ $invoice->total }}</td>
                                                                @if($invoice->status == "مدفوعة")
                                                                    <td><span style=" border-radius: 20px; "
                                                                              class="badge badge-success">{{$invoice->status}}</span>
                                                                    </td>
                                                                @elseif($invoice->status == "مدفوعةجزئيا")
                                                                    <td><span style=" border-radius: 20px;"
                                                                              class="badge badge-info">{{$invoice->status}}</span>
                                                                    </td>
                                                                @else
                                                                    <td><span style=" border-radius: 20px;"
                                                                              class="badge badge-danger">{{$invoice->status}}</span>
                                                                    </td>
                                                                @endif

                                                                <td>{{ $invoice->note }}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                @endif
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

    <script>
        $(document).ready(function () {
            $('#invoice_number').hide();
            $('input[type="radio"]').click(function () {
                if ($(this).attr('id') == 'type_div') {
                    $('#invoice_number').hide();
                    $('#type').show();
                    $('#start_at').show();
                    $('#end_at').show();
                } else {
                    $('#invoice_number').show();
                    $('#type').hide();
                    $('#start_at').hide();
                    $('#end_at').hide();
                }
            });
        });
    </script>

@endsection
