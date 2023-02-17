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
                                <li class="breadcrumb-item active">تعديل صلاحية
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
                                    <h4 style="font-weight: bold ;font-size: 25px "  class="card-title" id="basic-layout-form"> تعديل صلاحية  </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body" style="background-color:#444;">
                                        <form class="form" action="{{route('roles.update',$role->id)}}" method="POST" >
                                            @method('PUT')
                                            @csrf
                                            <div class="form-body" >
                                                <div class="row">
                                                    <div class="col" >
                                                        <label class="control-label"> اسم الصلاحية </label>
                                                        <input type="text" name="name" class="form-control" value="{{$role->name}}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <ul id="treeview1">
                                                        <li><a href="#">الصلاحيات</a>
                                                            <ul>
                                                                <li>
                                                                    @foreach($permission as $value)
                                                                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                                            {{ $value->name }}</label>
                                                                        <br />
                                                                    @endforeach
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <br>

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
