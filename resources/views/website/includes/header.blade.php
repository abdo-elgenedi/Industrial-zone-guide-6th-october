<section id="hero" class="d-flex align-items-center">

    <div class="container p-5" style="background: rgba(40, 58, 90, 0.8);">
        <div class="row">
            <div class="col-lg-12 d-flex flex-column justify-content-center pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1 class="text-center p-2">دليل المنطقه الصناعيه بمدينه السادس من اكتوبر</h1>
                <div class="text-center">
                    <a href="{{route('website.map')}}" class="btn btn-outline-light btn-lg col-lg-2 text-center">استخدم الخريطة</a>
                </div>
                <form action="{{route('website.allsearch')}}" class="text-center">
                    <div class="row mt-3">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <input type="text" id="search" name="search" class="form-control" placeholder="ابحث عن مصنع , منتج او خدمه">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-outline-primary">
                                <i style="color: #fff;" class="bx bx-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section><!-- End Hero -->