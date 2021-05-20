@extends('layouts.factory')
@section('title') Services @endsection
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
    <h3 class="card text-center p-1 bg-success">إدارة الخدمات</h3>

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <a href="{{route('factory.services.create')}}" class="pull-left mt-5 mr-5 btn btn-primary">أضف خدمة جديد +</a>
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>الأسم</th>
                                    <th>التصنيف</th>
                                    <th>السعر</th>
                                    <th>الحاله</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($services)&&$services->count()>0)
                                    @foreach($services as $service)
                                <tr>
                                    <td>{{$service->name}}</td>
                                    <td>{{$service->category->name}}</td>
                                    <td>{{$service->price}}</td>
                                    <td><input type="checkbox" status-id="{{$service->id}}" {{$service->status==1?'checked':''}} class="switchery status" data-size="sm"></td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('factory.services.edit',$service->id)}}">
                                            <i class="la la-edit"></i> تعديل </a>
                                        <a class="btn btn-danger ml-2" href="{{route('factory.services.delete',$service->id)}}"
                                        onclick="if(!confirm('سيتم حذف الخدمة نهائيا هل تريد حذف المنتج ؟')) return false">
                                            <i class="la la-trash"></i> حذف </a>
                                        <button class="btn btn-primary ml-2 showmodal" showid="{{$service->id}}">
                                            <i class="la la-eye"></i> تفاصيل </button>
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
            $('.showmodal').click(function () {
                    $.ajax({
                        type:'post',
                        url:'{{route('factory.services.show')}}',
                        data:{
                            id:$(this).attr('showid'),
                            '_token':'{{csrf_token()}}'
                        },
                        success:function (data) {
                            $('#modalShow').html(data.modal);
                            $('#showModal').modal('show');

                        },
                        reject:function (reject) {

                        }
                    });
            });


            $('.status').change(function () {
                $.ajax({
                    type:'post',
                    url:'{{route('factory.services.status')}}',
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