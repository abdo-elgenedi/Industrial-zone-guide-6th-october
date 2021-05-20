@extends('layouts.admin')
@section('title') categories @endsection
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

    <h3 class="card text-center p-1 bg-success">إدارة التصنيفات</h3>

    <section id="configuration">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <a href="{{route('admin.categories.create')}}" class="pull-left mt-5 mr-5 btn btn-primary">أضف تصنيف جديد +</a>
                        <div class="card-body card-dashboard">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                <tr>
                                    <th>الأسم</th>
                                    <th>اللون</th>
                                    <th>التحكم</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($categories)&&$categories->count()>0)
                                    @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td><p class="btn" style="background-color: {{$category->color}}"></p></td>
                                    <td>
                                        <a class="btn btn-warning" href="{{route('admin.categories.edit',$category->id)}}">
                                            <i class="la la-edit"></i> تعديل </a>
                                        <a class="btn btn-danger ml-2" href="{{route('admin.categories.delete',$category->id)}}"
                                        onclick="if(!confirm('سيتم حذف التصنيف نهائيا وقد يترتب عليه حذف المصانع المسجله عليه او اخفائها نهائيا هل تريد حذف التصنيف ؟')) return false">
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