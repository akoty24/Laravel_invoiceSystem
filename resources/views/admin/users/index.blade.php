@extends('admin.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المستخدمين </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><span href="{{route('dashboard')}}">الرئيسية</span>
                                </li>
                                <li class="breadcrumb-item active">المستخدمين
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
                                            @can('اضافة مستخدم')
                                        <div class="row">
                                            <a  href="{{route('users.create')}}" style="width: 100px; border-radius: 10px; font-size: 14px" class="modal-effect btn btn-outline-success mr-1 mb-1 btn-sm " data-effect="effect-scale" >اضافة مستخدم</a>
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
                                                <th><span  class="badge badge-light box-shadow-3" title="اسم المستخدم"  style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">اسم المستخدم</span> </th>
                                                <th><span  class="badge badge-light box-shadow-3" title=" البريد الالكتروني" style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px"> البريد الالكتروني</span>  </th>
                                                <th><span  class="badge badge-light box-shadow-3" title=" حالة المستخدم " style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">  حالة المستخدم</span> </th>
                                                <th><span  class="badge badge-light box-shadow-3" title=" نوع المستخدم" style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">   نوع المستخدم</span>  </th>
                                                <th><span  class="badge badge-light box-shadow-3" title="العمليات " style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">  العمليات</span>  </th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            @isset($users)
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->fname . $user->lname}}</span></td>
                                                        <td>{{$user->email}}</td>
                                                        @if ($user->status == 'active')
                                                            <td><span  style=" border-radius: 20px;  color: #0FB365; font-size: 14px">{{$user->status}}</span></td>
                                                        @else
                                                            <td><span  style=" border-radius: 20px; color: red; font-size: 14px">{{$user->status}}</span></td>
                                                        @endif
                                                        <td>
                                                        @if (!empty($user->getRoleNames()))
                                                            @foreach ($user->getRoleNames() as $v)
                                                                @if ($v == 'owner')
                                                                  <span  class="badge badge-success"  style=" border-radius: 20px;  font-size: 14px">{{ $v }}</span>
                                                                @else
                                                                    <span  class="badge badge-danger"  style=" border-radius: 20px;  font-size: 14px">{{ $v }}</span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                       </td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a style=" border-radius: 20px;font-size: 14px"  href="{{route('users.show',$user->id)}}" title=" عرض المستخدم" class="btn btn-outline-amber btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" >عرض المستخدم</a>
                                                                @can('تعديل مستخدم')
                                                                <a style=" border-radius: 20px;font-size: 14px"  href="{{route('users.edit',$user->id)}}" title=" تعديل المستخدم" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" >تعديل المستخدم</a>
                                                                @endcan
                                                                @can('حذف مستخدم')
                                                                @if ($user->roles_name !== ["owner"])
                                                                <a style=" border-radius: 20px;font-size: 14px" href="#modaldemo9" data-toggle="modal" data-id="{{$user->id}}" data-name="{{$user->fname.$user->lname}}"  class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm " >حذف المستخدم</a>
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
                                                            <h5 class="modal-title">حذف مستخدم</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('users.destroy','test') }}" method="post">
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