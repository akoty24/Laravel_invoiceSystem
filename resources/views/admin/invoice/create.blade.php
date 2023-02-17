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
                                <li class="breadcrumb-item active">اضافة فاتورة
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
                                <div class="card-header" style="background-color:#444">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <h4 style="font-weight: bold ;font-size: 25px "  class="card-title" id="basic-layout-form"> اضافة فاتورة </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body" style="background-color:#444;">
                                        <form class="form" action="{{route('store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body" >
                                                <div class="row">
                                                    <div class="col" >
                                                        <label class="control-label">تاريخ الفاتورة</label>
                                                        <input style="width: 70%;" class="form-control " name="invoice_date" placeholder="YYYY-MM-DD"
                                                               type="date" value="{{ date('Y-m-d') }}" >
                                                    </div>
                                                    <div class="col">
                                                        <label class="control-label">تاريخ الاستحقاق</label>
                                                        <input style="width: 70%;" class="form-control fc-datepicker" name="due_date" placeholder="YYYY-MM-DD" type="date"  >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">القسم</label>
                                                        <select style="width: 70%;" id="section" name="section"  class="form-control SlectBox" onclick="console.log($(this).val())"
                                                                onchange="console.log('change is firing')" >
                                                            <!--placeholder-->
                                                            <option selected disabled>حدد القسم</option>
                                                            @foreach ($sections as $section)
                                                                <option  style="color: black" value="{{ $section->id }}"> {{ $section->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">المنتج</label>
                                                        <select style="width: 70%;" id="product" name="product" class="form-control" >

                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">مبلغ التحصيل</label>
                                                        <input  style="width: 70%;" type="text" class="form-control" id="inputName" name="amount_collection"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">مبلغ العمولة</label>
                                                        <input  style="width: 70%;"  type="text" class="form-control form-control-lg" id="amount_commission"
                                                               name="amount_commission" title="يرجي ادخال مبلغ العمولة "
                                                                   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                    </div>
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">الخصم</label>
                                                        <input  style="width: 70%;"  type="text" class="form-control form-control-lg" id="discount" name="discount"
                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" title="يرجي ادخال مبلغ الخصم " value=0 >
                                                    </div>
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">نسبة ضريبة القيمة المضافة</label>
                                                        <select style="width: 70%;"  name="rate_vat" id="rate_vat" class="form-control" onchange="myFunction()" >
                                                            <!--placeholder-->
                                                            <option value="" selected disabled>حدد نسبة الضريبة</option>
                                                            <option style="color: black" value=" 5%">5%</option>
                                                            <option style="color: black" value="10%">10%</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col" style="margin-right: 70px">
                                                            <label  for="inputName" class="control-label">قيمة ضريبة القيمة المضافة</label>
                                                            <input  style="width: 70%;" type="text" class="form-control" id="value_vat" name="value_vat" readonly>
                                                        </div>
                                                        <div class="col">
                                                            <label for="inputName" class="control-label">الاجمالي شامل الضريبة</label>
                                                            <input  style="width: 70%;" type="text" class="form-control" id="total" name="total" readonly>
                                                        </div>
                                                    </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="exampleTextarea">ملاحظات</label>
                                                        <textarea placeholder="ملاحظات" style="width: 90%;"  class="form-control" id="exampleTextarea" name="note" rows="3"></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <p class="text-danger">* صيغة المرفق pdf, jpeg ,.jpg , png </p>
                                                <label>المرفقات</label>
                                                <div class="col-sm-12 col-md-12">
                                                    <input type="file" name="file_name" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png" data-height="70" />
                                                </div><br>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">تاكيد</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
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


            function myFunction() {
                var Amount_Commission = parseFloat(document.getElementById("amount_commission").value);
                var Discount = parseFloat(document.getElementById("discount").value);
                var Rate_VAT = parseFloat(document.getElementById("rate_vat").value);
                var Value_VAT = parseFloat(document.getElementById("value_vat").value);
                var Amount_Commission2 = Amount_Commission - Discount;
                if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {
                    alert('يرجي ادخال مبلغ العمولة ');
                } else {
                    var intResults = Amount_Commission2 * Rate_VAT / 100;
                    var intResults2 = parseFloat(intResults + Amount_Commission2);
                    sumq = parseFloat(intResults).toFixed(2);
                    sumt = parseFloat(intResults2).toFixed(2);
                    document.getElementById("value_vat").value = sumq;
                    document.getElementById("total").value = sumt;
                }
            }

    </script>

@endsection
