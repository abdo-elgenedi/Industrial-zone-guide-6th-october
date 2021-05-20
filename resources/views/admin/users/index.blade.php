@extends('layouts.admin')
@section('title') Users @endsection
@section('content')
    <!-- Redirection Modal -->
    @if(Session::has('message'))
    <div class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">رسالة</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  bg-{{Session::get('color')}} text-bold-700" style="height:70px;">
                    {{Session::get('message')}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- /Redirection Modal -->

    <div id="modalShow"></div>
    <h3 class="card text-center p-1 bg-success">إدارة المستخدمين</h3>

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>الأسم</th>
                                    <th>البريد الالكتروني</th>
                                    <th>رقم الهاتف</th>
                                    <th>اسم المستخدم</th>
                                    <th>الحاله</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($users)&&$users->count()>0)
                                    @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobile}}</td>
                                    <td>{{$user->username}}</td>
                                    <td><input type="checkbox" status-id="{{$user->id}}" {{$user->status==1?'checked':''}} class="switchery status" data-size="sm"></td>
                                    <td style="width: 27%;">
                                        <a class="btn btn-danger ml-2" href="{{route('admin.users.delete',$user->id)}}"
                                        onclick="if(!confirm('سيتم حذف المستخدم نهائيا هل تريد حذف المستخدم بالفعل ؟')) return false">
                                            <i class="la la-trash"></i> حذف </a>
                                    </td>
                                </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        window.onload=function () {
            if('{{Session::has('message')?'true':'false'}}'=='true'){
                $('#alertModal').modal('show');
            }


            $('.status').change(function () {
                $.ajax({
                    type:'post',
                    url:'{{route('admin.users.status')}}',
                    data:{
                        id:$(this).attr('status-id'),
                        '_token':'{{csrf_token()}}'
                    },
                    success:function (data) {


                    },
                    reject:function (reject) {

                    }
                });
            });
        }
    </script>
    @endsection