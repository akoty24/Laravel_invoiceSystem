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
                                <li class="breadcrumb-item active">  تقارير العملاء
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
                                    <h4 style="font-weight: bold ;font-size: 25px "  class="card-title" id="basic-layout-form"> تقارير العملاء  </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <form action="{{route('search.customers')}}" method="POST" role="search" autocomplete="off">
                                            {{ csrf_field() }}
                                            <div class="row">

                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="type">
                                                    <p class="mg-b-10" style="color: black"> البنك </p>
                                                    <select style="width: 70%;" id="section" name="section" class="form-control select2" onclick="console.log($(this).val())" onchange="console.log('change is firing')" required>
                                                        <option value="" selected disabled>حدد البنك</option>
                                                        @foreach ($sections as $section)
                                                            <option  value="{{ $section->id }}"> {{ $section->name }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-lg-3 mg-t-20 mg-lg-t-0" id="type">
                                                    <p class="mg-b-10" style="color: black"> المنتج </p>
                                                    <select style="width: 70%;" id="product" name="product" class="form-control select2">
                                                    </select>
                                                </div>

                                                <div class="col-lg-3" id="start_at">
                                                    <p class="mg-b-10" style="color: black"> من تاريخ </p>

                                                    <div class="col" >
                                                        <input style="width: 70%;" class="form-controll " name="start_at" placeholder="YYYY-MM-DD"
                                                               type="date" value="{{ $start_at ?? '' }}" >
                                                    </div>
                                                    <!-- input-group -->
                                                </div>

                                                <div class="col-lg-3" id="end_at">
                                                    <p class="mg-b-10" style="color: black"> الي تاريخ </p>


                                                    <div class="col" >
                                                        <input style="width: 70%;" class="form-controll "  name="end_at" placeholder="YYYY-MM-DD"
                                                               type="date" value="{{ $end_at ?? '' }}" >
                                                    </div>
                                                </div>
                                            </div><br>

                                            <div class="row">
                                                <div class="col-sm-1 col-md-1">
                                                    <button class="btn btn-primary btn-block">بحث</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                @if (isset($invoices))
                                                    <table id="example" class="table key-buttons text-md-nowrap" style=" text-align: center">
                                                        <thead>
                                                        <tr>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px"> #</span> </th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">رقم الفاتورة</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">تاريخ القاتورة</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">تاريخ الاستحقاق</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">المنتج</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">القسم</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">الخصم</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">نسبة الضريبة</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">قيمة الضريبة</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">الاجمالي</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">الحالة</span></th>
                                                            <th ><span class="badge badge-light box-shadow-3" style=" border-radius: 20px;background: #666EE8; font-size: 18px">ملاحظات</span></th>

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
                                                                <td><span  style=" border-radius: 20px; " class="badge badge-success" >{{$invoice->status}}</span></td>
                                                            @elseif($invoice->status == "مدفوعةجزئيا")
                                                                <td><span  style=" border-radius: 20px;" class="badge badge-info"  >{{$invoice->status}}</span></td>
                                                            @else
                                                                <td><span  style=" border-radius: 20px;" class="badge badge-danger"   >{{$invoice->status}}</span></td>
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
                </section>
            </div>

        </div>
    </div>

@endsection
@section('script')

    <script>
        $(document).ready(function() {
            $('#section').on('change', function() {
                $('#product').empty();
                var section_id = this.value;
                if (section_id) {
                    $.ajax({
                        url: "{{route('getproducts')}}",
                        type: "GET",
                        dataType: "json",
                        data: {
                            section_id: section_id,
                            _token: '{{csrf_token()}}'
                        },
                        success: function(res) {
                            $('#product').html('<option selected disabled value="">اختار المنتج</option>');
                            $.each(res, function (key, value) {
                                $('#product').append('<option style="color: black" value="' + value.id + '">' + value.name + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

@endsection
