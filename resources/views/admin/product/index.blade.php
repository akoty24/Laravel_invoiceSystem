@extends('admin.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المنتجات </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Main</a>
                                </li>
                                <li class="breadcrumb-item active">المنتجات
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
                                        @can('اضافة منتج')
                                          <a  style="width: 100px; border-radius: 10px" class="modal-effect btn btn-outline-success btn-block btn-sm" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة منتج</a>
                                            @endcan
                                    </div>
                                    <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
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
                                            <tr style="color: white; background:linear-gradient(195deg, #66BB6A 0%, #43A047 100%); font-size: 16px; text-align: center;  ">
                                            <tr  style="color: white; font-size: 16px; text-align: center;  ">
                                                <th><span  class="badge badge-light box-shadow-3"  style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">  رقم</span>  </th>
                                                <th><span  class="badge badge-light box-shadow-3"  style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">  اسم المنتج</span>  </th>
                                                <th><span  class="badge badge-light box-shadow-3"  style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">  اسم البنك</span>  </th>
                                                <th><span  class="badge badge-light box-shadow-3" style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">  الوصف</span>  </th>
                                                <th><span  class="badge badge-light box-shadow-3" style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">  العمليات</span>  </th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($products)
                                            @foreach($products as $product)
                                                <tr>
                                                    <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-2 btn-sm"  style=" border-radius: 20px;  font-size: 14px">{{$product->id}}</span></td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->section->name}}</td>
                                                    <td>{{$product->description}}</td>
                                                    
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        @can('تعديل منتج')
                                                            <a style="border-radius: 20px" href="#exampleModal2" data-toggle="modal"data-id="{{$product->id}}" data-name="{{$product->name}}" data-section_name="{{$product->section->name}}" data-description="{{$product->description}}" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" >تعديل</a>
                                                        @endcan
                                                        @can('حذف منتج')
                                                            <a style="border-radius: 20px" href="#modaldemo9" data-toggle="modal" data-id="{{$product->id}}" data-name="{{$product->name}}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" >حذف</a>
                                                        @endcan
                                                    </div>
                                                </td>
                                                </tr>
                                            @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">
                                            <!--add-->
                                            <div class="modal" id="modaldemo8">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 style="color: wheat" class="modal-title" >اضافة منتج</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('product.store')}}" method="post">
                                                                {{ csrf_field() }}
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label style="color:white;" for="exampleInputEmail1">اسم المنتج</label>
                                                                        <input type="text" class="form-control" id="name" name="name" required>
                                                                    </div>

                                                                    <label style="color:white;" class="my-1 mr-2" for="inlineFormCustomSelectPref">البنك</label>
                                                                    <select name="section_id" id="section_id" class="form-control" required>
                                                                        <option value="" selected disabled> --حدد البنك--</option>
                                                                        @foreach ($sections as $section)
                                                                            <option  style="color: black" value="{{ $section->id }}">{{ $section->name }}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    <div class="form-group">
                                                                        <label style="color:white;" for="exampleFormControlTextarea1">ملاحظات</label>
                                                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                                    </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button style="border-radius: 20px" type="submit" class="btn btn-success">تاكيد</button>
                                                                    <button style="border-radius: 20px" type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                                <!--edit-->
                                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">تعديل منتج</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action='product/update' method="post">
                                                            {{ method_field('patch') }}
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">

                                                                <div class="form-group">
                                                                    <label style="color:white;" for="title">اسم المنتج :</label>
                                                                    <input type="hidden" class="form-control" name="id" id="id" value="">
                                                                    <label style="color:white;" for="exampleInputEmail1">اسم المنتج</label>
                                                                    <input type="text" class="form-control" id="name" name="name" required>
                                                                </div>

                                                                <label style="color:white;" class="my-1 mr-2" for="inlineFormCustomSelectPref">البنك</label>
                                                                <select name="section_name" id="section_name" class="custom-select my-1 mr-sm-2" required>
                                                                    @foreach ($sections as $section)
                                                                        <option  style="color: black" >{{ $section->name }}</option>
                                                                    @endforeach
                                                                </select>

                                                                <div class="form-group">
                                                                    <label style="color:white;" for="des">ملاحظات :</label>
                                                                    <textarea name="description" cols="20" rows="5" id='description' class="form-control"></textarea>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button style="border-radius: 20px" type="submit" class="btn btn-primary">تعديل البيانات</button>
                                                                <button style="border-radius: 20px" type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
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
                                                        <form action="product/destroy" method="post">
                                                            {{ method_field('delete') }}
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                                <input type="hidden" name="id" id="id" value="">
                                                                <input class="form-control" name="name" id="name" type="text" readonly>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button style="border-radius: 20px" type="button" class="btn btn-success" data-dismiss="modal">الغاء</button>
                                                                <button  style="border-radius: 20px" type="submit" class="btn btn-danger">تاكيد</button>
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
        var name = button.data('name')
        var section_name = button.data('section_name')
        var id = button.data('id')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #section_name').val(section_name);
        modal.find('.modal-body #description').val(description);
        modal.find('.modal-body #id').val(id);
    })

    $('#modaldemo9').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
    })
</script>
@endsection

