@extends('admin.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">  صلاحيات المستخدمين </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">

                                <li class="breadcrumb-item"><span href="{{route('dashboard')}}">الرئيسية</span>
                                </li>

                                <li class="breadcrumb-item active"> صلاحيات المستخدمين
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
                                        @can('اضافة صلاحية')
                                        <div class="row">
                                            <a  href="{{ route('roles.create') }}" style="width: 100px; border-radius: 10px; font-size: 14px" class="modal-effect btn btn-outline-success mr-1 mb-1 btn-sm " data-effect="effect-scale" >اضافة  صلاحية</a>
                                        </div>
                                            @endcan
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
                                                <th><span  class="btn-primary btn-min-width box-shadow-3 btn-sm" title=" البريد الالكتروني" style=" border-radius: 20px;  font-size: 18px">  id</span>  </th>
                                                <th><span  class="btn-primary btn-min-width box-shadow-3 btn-sm" title="اسم المستخدم" style=" border-radius: 20px; font-size: 18px">اسم الصلاحية</span> </th>
                                                <th><span  class="btn-primary btn-min-width box-shadow-3 btn-sm" title="العمليات " style=" border-radius: 20px; padding: 5px 20px; font-size: 18px">  العمليات</span>  </th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @isset($roles)
                                                @foreach($roles as $role)
                                                    <tr>
                                                        <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-2 btn-sm"  style=" border-radius: 20px;  font-size: 14px">{{$role->id}}</span></td>

                                                        <td>{{$role->name}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                @can('عرض صلاحية')
                                                                <a style=" border-radius: 20px;font-size: 14px"  href="{{route('roles.show',$role->id)}}" title=" عرض الصلاحية " class="btn btn-outline-amber btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" >عرض الصلاحية</a>
                                                                @endcan
                                                                @can('تعديل صلاحية')
                                                                <a style=" border-radius: 20px;font-size: 14px"  href="{{route('roles.edit',$role->id)}}" title=" تعديل الصلاحية " class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" >تعديل الصلاحية</a>
                                                                    @endcan
                                                                    @can('حذف صلاحية')
                                                                        @if ($role->name !== 'owner')
                                                                <a style=" border-radius: 20px;font-size: 14px" href="#modaldemo9" data-toggle="modal" data-id="{{$role->id}}" data-name="{{$role->name}}"    class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm " >حذف الصلاحية</a>
                                                                       @endif
                                                                    @endcan
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                            <!--delete-->
                                            <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">حذف صلاحية</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('roles.destroy','test')}}" method="post">
                                                            {{ method_field('delete') }}
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" id="id" value="">
                                                                <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                                                <input type="text" disabled name="name" id="name" value="">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button style=" border-radius: 20px;font-size: 14px" type="button" class="btn btn-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" data-dismiss="modal">الغاء</button>
                                                                <button style=" border-radius: 20px;font-size: 14px" type="submit" class="btn btn-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm">تاكيد</button>
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