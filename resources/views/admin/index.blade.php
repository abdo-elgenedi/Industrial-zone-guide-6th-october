@extends('layouts.admin')
@section('title') Index @endsection
@section('content')
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4> المناطق المشغولة علي الخريطة</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Models\Block::where('fact_id','<>',NULL)->count()}} من المناطق</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد المصانع</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Models\Factory::count()}} من المصانع</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد المستخدمين</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\User::count()}} من المستخدمين</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد التصنيفات للموقع</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Models\Category::count()}} من التصنيفات</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد التصنيفات للمصانع</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Models\FactoryCategory::count()}} من التصنيفات</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>تاريخ تسجيلك علي الموقع</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            @php $days=['Saturday'=>'السبت',
                                            'Sunday'=>'الاحد',
                                            'Monday'=>'الاثنين',
                                            'Tuesday'=>'الثلاثاء',
                                            'Wednesday'=>'الاربعاء',
                                            'Thursday'=>'الخميس',
                                            'Friday'=>'الجمعة'] @endphp
                                            <h4>{{$days[Auth::user()->created_at->format('l')]}}</h4>
                                            <h4>{{Auth::user()->created_at->format('d-m-Y')}}</h4>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد المنتجات </h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Models\Product::count()}} من المنتجات</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h4>عدد  الخدمات</h4>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>{{\App\Models\Service::count()}} من الخدمات</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
    @endsection