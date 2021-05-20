@extends('layouts.factory')
@section('title') Mobiles @endsection
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

    <h3 class="card text-center p-1 bg-success">إدارة ارقام الهاتف</h3>

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <a href="{{route('factory.mobiles.create')}}" class="pull-left mt-5 mr-5 btn btn-primary">أضف رقم هاتف جديد +</a>
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($mobiles)&&$mobiles->count()>0)
                                    @foreach($mobiles as $mobile)
                                <tr>
                                    <td>{{$mobile->mobile}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('factory.mobiles.edit',$mobile->id)}}">
                                            <i class="la la-edit"></i> تعديل </a>
                                        <a class="btn btn-danger ml-2" href="{{route('factory.mobiles.delete',$mobile->id)}}"
                                        onclick="if(!confirm('سيتم حذف رقم الهاتف نهائيا هل تريد حذف رقم الهاتف ؟')) return false">
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
        }
    </script>
    @endsection