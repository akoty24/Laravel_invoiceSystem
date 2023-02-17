@extends('admin.layouts.admin')
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">تعديل مستخدم
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
                                    <h4 style="font-weight: bold ;font-size: 25px "  class="card-title" id="basic-layout-form"> تعديل مستخدم رقم {{$user->id}} </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body" style="background-color:#444;">

                                        {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                                        <form class="">
                                            @csrf
                                            <div class="form-body" >
                                                <div class="row">
                                                    <div class="col" >
                                                        <label class="control-label"> الاسم الاول*</label>
                                                        <input style="width: 70%;" value="{{$user->fname}}" class="form-control " name="fname" type="text"  >
                                                    </div>
                                                    <div class="col">
                                                        <label class="control-label"> الاسم الثاني*</label>
                                                        <input style="width: 70%;" value="{{$user->lname}}" class="form-control fc-datepicker" name="lname"  type="text"  >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">البريد الالكتروني* </label>
                                                        <input style="width: 70%;" value="{{$user->email}}" class="form-control " type="email" name="email" >
                                                    </div>
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">كلمة المرور الجديدة*</label>
                                                        <input style="width: 70%;"  class="form-control " type="password" name="password" >
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="inputName" class="control-label"> تاكيد كلمة المرور*</label>
                                                        <input style="width: 70%;"  class="form-control " type="password" name="confirm-password" >
                                                    </div>
                                                    <div class="col">
                                                        <label for="inputName" class="control-label">حالة المستخدم*</label>
                                                        <select style="width: 70%;" name="status" id="select-beast" class="form-control ">
                                                            <option value="{{ $user->status}}">
                                                                @if($user->status == "active")
                                                                    مفعل
                                                                @else
                                                                    غير مفعل
                                                                @endif
                                                            </option>
                                                            <option value="active" style="color: black">مفعل</option>
                                                            <option value="InActive" style="color: black">غير مفعل</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label class="form-label"> صلاحية المستخدم* </label><span style="color: gray;font-size: 13px">(يمكن اختيار اكثر من صلاحية )</span>
                                                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                                                        </div>
                                                    </div>
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
