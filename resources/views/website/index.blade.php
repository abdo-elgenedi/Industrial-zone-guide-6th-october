@extends('layouts.website')
@section('header')
    @include('website.includes.header')
    @endsection
@section('content')
    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>معلومات عنا</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            موقع المنطقة الصناعية بمدينة السادس من اكتوبر الحي السادس يتواجد بها العديد من المصانع في الاماكن المختلفه من المنطقة والتي تقدم العديد من الخدمات والمنتجات
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> نقدم تسيهلات البحث عن المصانع والمكان الخاص بها </li>
                            <li><i class="ri-check-double-line"></i> نضع لك المنتجات والخدمات وطرق التواصل الخاصة بكل مصنع</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            سعداء بتعاملك معنا بالفعل , نحن من جهة المنطقة التي توفر لك تصفح وعرض اسرع ومن اي مكان للمصانع ومنتجاتها والخدمات التي تقدمها بكل تفاصيلها والاسعر التي تقدمها تلك المصانع.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>خدماتنا</h2>
                    <p>نقدم لك العديد من الخدمات في الموقع , يمكنك التطلع اليها بالفعل للتمتع بمميزات الموقع والخدمات التي نقدمها لخدمتك والحرص علي وقت في معرفة المنطقة الصناعيه في مكانك وفي اي وقت وبشكل سريع جدا.</p>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bxl-dribbble"></i></div>
                            <h4><a href="">الخريطة</a></h4>
                            <p>يمكنك استخدام الخريطة في معرفة مكان ورقم قطعة المصنع الذي تحث عنه كما يمكنك التسجيل كمصنع ووضع مصنعك</p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-file"></i></div>
                            <h4><a href="">المصانع</a></h4>
                            <p>يمكنك البحث عن المصنع الي تريد ومعرفه كل ما يقدمة من منتجات وخدمات ونوفر لك طرق التواصل مع المصنع , كما يمكنك المشاركه بوضع مصنعك معنا </p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-tachometer"></i></div>
                            <h4><a href="">المنتجات</a></h4>
                            <p>يمكنك البحث عن المنتج الذي تريدة وسنوفر لك جميع المنتجات التي تبحث عنها ومعرفه المصانع الذين يقدمونها بالفعل , ومعرفه اسعارها ونزودك بصور ووصف عنها </p>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
                        <div class="icon-box">
                            <div class="icon"><i class="bx bx-layer"></i></div>
                            <h4><a href="">الخدمات</a></h4>
                            <p>يمكنك البحث عن الخدمة الذي تريدة وسنوفر لك جميع الخدمات التي تبحث عنها ومعرفه المصانع الذين يقدمونها بالفعل , ومعرفه اسعارها ونزودك بصور ووصف عنها </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>التواصل معنا</h2>
                    <p>ان كنت عميلا او مصنعا وواجهتك اي مشكلة , او اذا كان لديك اي اقتراحات لزيادة كفاءة الموقع لا تتردد بالتواصل معنا في اي وقت تي لحل مشكلتك والتواصل معك , نسعي لنكون عند حسن ظنكم</p>
                </div>

                <div class="row">

                   <!-- <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="icofont-google-map"></i>
                                <h4>Location:</h4>
                                <p>A108 Adam Street, New York, NY 535022</p>
                            </div>

                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@example.com</p>
                            </div>

                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h4>Call:</h4>
                                <p>+1 5589 55488 55s</p>
                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div> -->
                    <div class="col-md-2"></div>

                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form action="{{route('website.contact')}}" method="post" role="form" class="php-email-form">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">الاسم</label>
                                    <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="ادخل علي الاقل 4 حروف" @if(Auth::guard('web')->check())value="{{Auth::user()->name}}"@endif>
                                    <div class="validate"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">البريد الالكتروني</label>
                                    <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="البريد الالكتروني غير صحيح" @if(Auth::guard('web')->check())value="{{Auth::user()->email}}"@endif/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="subject">عنوان الرسالة</label>
                                <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="ادخل 8 حروف علي الاقل" />
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <label for="name">الرساله</label>
                                <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="لاتجعل محتوي الرسالة فارغا"></textarea>
                                <div class="validate"></div>
                            </div>
                            <div class="mb-3">
                                <div class="loading">جاري الارسال</div>
                                <div class="error-message"></div>
                                <div class="sent-message">تم ارسال رسالتك وسيتم فحصها والرد عليك , شكرا لك!</div>
                            </div>
                            <div class="text-center"><button type="submit">ارسال الرسالة</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
    @endsection