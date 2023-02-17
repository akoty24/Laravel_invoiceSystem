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
                                <li class="breadcrumb-item active"> عرض الصلاحيات
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
                                    <h4 style="font-weight: bold ;font-size: 25px "  class="card-title" id="basic-layout-form"> عرض الصلاحيات  </h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body" style="background-color:#444;">
                                        <div class="row">
                                            <!-- col -->
                                            <div class="col-lg-4">
                                                <ul id="treeview1">
                                                    <li><a href="#" style="font-size: 20px">{{ $role->name }}</a>
                                                        <ul>
                                                            @if(!empty($rolePermissions))
                                                                @foreach($rolePermissions as $v)
                                                                    <li style="color: red">{{ $v->name }}</li>
                                                                @endforeach
                                                            @endif
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- /col -->
                                        </div>
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
