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
                                <li class="breadcrumb-item"><span href="{{route('dashboard')}}">الرئيسية</span>
                                </li>
                                <li class="breadcrumb-item active"> الفواتير المؤرشفة
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
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div> <span class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></span>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('alerts.alert')
                                @include('alerts.success')
                                @include('alerts.sweet_alert')
                                @include('alerts.error')
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead class="">
                                            <tr  style="color: white; font-size: 16px; text-align: center;  ">
                                                <th><span  class="btn-primary btn-min-width box-shadow-3 btn-sm" title="رقم الفاتورة" style=" border-radius: 20px; font-size: 18px">  رقم الفاتورة</span> </th>
                                                <th><span  class="btn-primary btn-min-width box-shadow-3 btn-sm" title="تاريخ الفاتورة" style=" border-radius: 20px;  font-size: 18px"> تاريخ الفاتورة</span>  </th>
                                                <th><span  class="btn-primary btn-min-width box-shadow-3 btn-sm" title="القسم " style=" border-radius: 20px; padding: 5px 20px; font-size: 18px">  القسم</span> </th>
                                                <th><span  class="btn-primary btn-min-width box-shadow-3 btn-sm" title="القسم " style=" border-radius: 20px; padding: 5px 20px; font-size: 18px">  المنتج</span> </th>
                                                <th><span  class="btn-primary btn-min-width box-shadow-3 btn-sm" title="الحالة" style=" border-radius: 20px; padding: 5px 20px; font-size: 18px">   الحالة</span>  </th>
                                                <th><span  class="btn-primary btn-min-width box-shadow-3 btn-sm" title="الاجراءات " style=" border-radius: 20px; padding: 5px 20px; font-size: 18px">  الاجراءات</span>  </th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @isset($invoices)
                                                @foreach($invoices as $invoice)
                                                    <tr>
                                                        <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-2 btn-sm" title="رقم الفاتورة" style=" border-radius: 20px;  font-size: 14px">{{$invoice->id}}</span></td>
                                                        <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-2 btn-sm" title="تاريخ الفاتورة " style="  border-radius: 20px;font-size: 14px">{{$invoice->invoice_date}}</span></td>
                                                        <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-2 btn-sm" title="اسم البنك" style="border-radius: 20px; font-size: 14px">{{$invoice->section->name}}</span></td>
                                                        <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-2 btn-sm" title="اسم المنتج " style="border-radius: 20px;  font-size: 14px">{{$invoice->product->name}}</span></td>
                                                        @if($invoice->status == "مدفوعة")
                                                            <td><a href="#exampleModal2" data-toggle="modal" data-status="{{$invoice->status}}" data-id="{{$invoice->id}}" data-payment_date="{{$invoice->payment_date}}" class="btn btn-outline-success btn-min-width box-shadow-3 btn-sm" title="تغيير حالة الدفع " style=" border-radius: 20px;padding: 5px 0; ">{{$invoice->status}}</a></td>
                                                        @elseif($invoice->status == "مدفوعةجزئيا")
                                                            <td><a href="#exampleModal2"  data-toggle="modal" data-status="{{$invoice->status}}" data-id="{{$invoice->id}}" data-payment_date="{{$invoice->payment_date}}" class="btn btn-outline-blue btn-min-width box-shadow-3 btn-sm" title="تغيير حالة الدفع " style=" border-radius: 20px;padding: 5px 0; ">{{$invoice->status}}</a></td>
                                                        @else
                                                            <td><a href="#exampleModal2"  data-toggle="modal" data-status="{{$invoice->status}}" data-id="{{$invoice->id}}" data-payment_date="{{$invoice->payment_date}}" class="btn btn-outline-red btn-min-width box-shadow-3 btn-sm" title="تغيير حالة الدفع " style=" border-radius: 20px;padding: 5px 0; ">{{$invoice->status}}</a></td>

                                                        @endif

                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a style=" border-radius: 20px; font-size: 14px"  href="{{route('show',$invoice->id)}}"  title=" عرض تفاصيل الفاتورة "  class="btn btn-outline-amber btn-min-width box-shadow-3  mr-1 mb-1 btn-sm " >details</a>
                                                                <a style=" border-radius: 20px;font-size: 14px"  href="{{route('edit',$invoice->id)}}" title=" تعديل الفاتورة" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" >edit</a>
                                                                <a style=" border-radius: 20px;font-size: 14px" href="#modaldemo9" data-toggle="modal" title=" حذف الفاتورة" data-id="{{$invoice->id}}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm " >delete</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">
                                            <!-- status-->
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

                                            <!--delete-->
                                            <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">حذف المنتج</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('delete')}}" method="post">
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                                <input type="" name="id" id="id" value="">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn-success" data-dismiss="modal">الغاء</button>
                                                                <button type="submit" class="btn-danger">تاكيد</button>
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
                </section>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>

        $('#exampleModal2').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var status = button.data('status')
            var payment_date = button.data('payment_date')
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #status').val(status);
            modal.find('.modal-body #payment_date').val(payment_date);
            modal.find('.modal-body #id').val(id);
        })

        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection