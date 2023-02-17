@extends('admin.layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> البنوك </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Main</a>
                                </li>
                                <li class="breadcrumb-item active">البنوك
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
                                            @can('اضافة قسم')
                                        <a  style="width: 100px; border-radius: 10px" class="modal-effect btn btn-outline-success btn-block btn-sm" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة بنك</a>
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
                                            <tr  style="color: white; font-size: 16px; text-align: center;  ">

                                                <th><span  class="badge badge-light box-shadow-3" title="رقم " style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">  رقم</span>  </th>
                                                <th><span  class="badge badge-light box-shadow-3" title="اسم البنك " style=" border-radius: 20px; padding: 5px 20px;background: #666EE8; font-size: 18px">  اسم البنك</span>  </th>
                                                <th><span  class="badge badge-light box-shadow-3" title="الوصف " style=" border-radius: 20px; padding: 5px 20px; background: #666EE8;font-size: 18px">  الوصف</span>  </th>
                                                <th><span  class="badge badge-light box-shadow-3" title="العمليات " style=" border-radius: 20px; padding: 5px 20px; background: #666EE8;font-size: 18px ">  العمليات</span>  </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @isset($sections)
                                            @foreach($sections as $section)
                                                <tr>
                                                    <td><span  class="btn-outline-accent-1 btn-min-width box-shadow-2 btn-sm"  style=" border-radius: 20px;  font-size: 14px">{{$section->id}}</span></td>
                                                    <td>{{$section->name}}</td>
                                                    <td>{{$section->description}}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        @can('تعديل قسم')
                                                            <a style="border-radius: 20px" href="#exampleModal2" title="تعديل بيانات البنك" data-toggle="modal" class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" data-id="{{$section->id}}" data-name="{{$section->name}}" data-description="{{$section->description}}">تعديل </a>
                                                        @endcan
                                                        @can('حذف قسم')
                                                            <a style=" border-radius: 20px;" href="#modaldemo9"  data-toggle="modal" data-id="{{$section->id}}" data-name="{{$section->name}}" class="btn btn-outline-danger btn-min-width box-shadow-3 mr-1 mb-1 btn-sm" >حذف البنك</a>
                                                        @endcan
                                                    </div>
                                                </td>
                                                </tr>
                                            @endforeach
                                            @endisset
                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">
                                            <div class="modal" id="modaldemo8">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header">
                                                            <h6 style="color: wheat" class="modal-title" >اضافة قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('section.store')}}" method="post">
                                                                {{csrf_field()}}
                                                                <div class="form-group">
                                                                    <label style="color:white;" for="exampleInputEmail1">اسم البنك</label>
                                                                    <input type="text" placeholder="enter name" class="form-control" id="name" name="name" required>

                                                                </div>
                                                                <div class="form-group">
                                                                    <label style="color:white;" for="exampleFormControlTextarea1">ملاحظات</label>
                                                                    <textarea class="form-control" id="description"  placeholder="enter description" name="description" rows="3"></textarea>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button style="border-radius: 20px" type="submit" class="btn btn-primary">تاكيد</button>
                                                                    <button style="border-radius: 20px" type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                                                                </div>
                                                                <br>
                                                                <br>
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                                <!--edit-->
                                            <div  class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5  class="modal-title" id="exampleModalLabel">تعديل البنك</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="section/update" method="post" autocomplete="off">
                                                              {{method_field('PATCH')}}
                                                                {{csrf_field()}}
                                                                <div class="form-group">
                                                                    <input type="hidden" name="id" id="id" value="">
                                                                    <label for="recipient-name" class="col-form-label">اسم البنك:</label>
                                                                    <input class="form-control" name="name" id="name"  placeholder="enter name" type="text" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="message-text" class="col-form-label">ملاحظات:</label>
                                                                    <textarea class="form-control" id="description"  placeholder="enter description" name="description"></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button style="border-radius: 20px" type="submit" class="btn btn-primary">نحديث</button>
                                                                    <button style="border-radius: 20px" type="button" class="btn btn-danger" data-dismiss="modal">اغلاق</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                    </div>
                                            </div>
                                             <!--delete-->
                                            <div class="modal" id="modaldemo9">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content modal-content-demo">
                                                        <div class="modal-header"  >
                                                            <h6  class="modal-title">حذف البنك</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <form action="section/destroy" method="post">
                                                            {{ method_field('delete') }}
                                                            {{ csrf_field() }}
                                                            <div class="modal-body">
                                                                <p style="font-size: 25px;text-align: center; color: red">are sure of the deleting section</p><br>
                                                                <input type="hidden" name="id" id="id" >
                                                                <input class="form-control" name="name" id="name" type="text" disabled>
                                                           <br>
                                                            <div class="modal-footer">
                                                                <button style="border-radius: 20px" type="button" class="btn btn-primary" data-dismiss="modal">الغاء</button>
                                                                <button style="border-radius: 20px" type="submit" class="btn btn-danger">تاكيد</button>
                                                            </div>
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
        var id = button.data('id')
        var name = button.data('name')
        var description = button.data('description')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #description').val(description);
    })
</script>
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

