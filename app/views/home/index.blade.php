@section('content')
    <!--section slider-->
    <div class="section mt-0">
        <div id="mainSliderWrapper">
            <div class="loading-content">
                <div class="inner-circles-loader"></div>
            </div>
            <div class="main-slider arrows-white arrows-bottom" id="mainSlider" data-slick='{"arrows": false, "dots": false}'>
                <div class="slide">
                    <div class="img--holder" data-animation="kenburns" data-bg="{{Asset('assets/frontend/images/slider/slide-02.jpg')}}"></div>
                    <div class="slide-content center">
                        <div class="vert-wrap container">
                            <div class="vert">
                                <div class="container">
                                    <div class="slide-txt1" data-animation="fadeInDown" data-animation-delay="1s">Creating
                                        <br>Beautiful Smiles</div>
                                    <div class="slide-txt2" data-animation="fadeInUp" data-animation-delay="1.5s">Helping Thousands of People to Get Perfect Smile</div>
                                    <div class="slide-btn"><a href="services.html" class="btn btn-white" data-animation="fadeInUp" data-animation-delay="2s"><i class="icon-right-arrow"></i><span>KNOW MORE</span><i class="icon-right-arrow"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="img--holder" data-animation="kenburns" data-bg="{{Asset('assets/frontend/images/slider/slide-01.jpg')}}"></div>
                    <div class="slide-content center">
                        <div class="vert-wrap container">
                            <div class="vert">
                                <div class="container">
                                    <div class="slide-txt1" data-animation="fadeInDown" data-animation-delay="1s">We Provide
                                        <br>Full Dental Care!</div>
                                    <div class="slide-txt2" data-animation="fadeInUp" data-animation-delay="1.5s">Your pathway to a bright new smile</div>
                                    <div class="slide-btn"><a href="services.html" class="btn btn-white" data-animation="fadeInUp" data-animation-delay="2s"><i class="icon-right-arrow"></i><span>KNOW MORE</span><i class="icon-right-arrow"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section slider-->
    <!--section welcome-->
    <div class="section">
        <div class="container">
            <div class="row text-center text-lg-left">
                <div class="col-12">
                    <div class="h-sub">Jensen Dental</div>
                </div>
                <div class="col-lg-6">
                    <div class="title-wrap text-center text-lg-left">
                        <h2 class="h2"> Kỷ niệm 40 năm nha khoa</h2>
                        <div class="h-decor"></div>
                    </div>
                    <p class="p-lg">Jensen Dental tự hào thông báo 40 năm của mình là nhà cung cấp hàng đầu các sản phẩm, dịch vụ, hỗ trợ kỹ thuật và giáo dục chất lượng cho ngành công nghiệp nha khoa.</p>
                    <p class="p-lg d-none d-lg-block">Là một thường hiệu hàng đầu trong nha khoa Nước Mỹ, Jensen Dental đã đưa ra các sản phẩm về nha khoa đã được nhiều phòng thí nghiệm nha khoa ưa thích và sử dụng. Trong đó Phôi Zirconia Jensen là một trong các sản phẩm được sử dụng nhiều nhất.</p>
                    <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>Tìm hiểu thêm</span><i class="icon-right-arrow"></i></a></div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-1">
                    <div class="video-wrap embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/h1dU4SM2hE8?autoplay=0&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;start=70" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--section card jensen-->
    <div class="section">
        <div class="container">
            <div class="title-wrap text-center">
                <div class="h-sub">Quyền lợi</div>
                <h2 class="h2">Chính sách bảo hành</h2>
                <div class="h-decor"></div>
            </div>
            <div class="row text-center text-lg-left" style="border: 1px #e0e4ee solid; border-radius: 4px; padding-top: 5px; padding-bottom: 5px;">
                <div class="col-lg-6" style="border-right: 1px #e0e4ee solid; text-align: center;">
                    <img src="{{Asset('assets/frontend/images/thebaohanh.png')}}" style="width: 499px; margin-top: 50px;">
                </div>
                <div class="col-lg-6 mt-4 mt-lg-1">
                    <p class="p-lg">1. Mỗi một bệnh nhân làm vật liệu Jensen sẽ được cấp phát 1 thẻ bảo hành riêng.</p>
                    <p class="p-lg">2. Thẻ bảo hành chính hãng 15 năm bao gồm logo Jensen.</p>
                    <p class="p-lg">3. Trên thẻ chỉ có mã code để khách hàng tra cứu.</p>
                    <p class="p-lg">4. Mã QR đằng sau thẻ phải quét được.</p>
                    <p class="p-lg">5. Thẻ được cung cấp bởi đơn vị duy nhất tại Việt Nam là Vật Liệu Lab – IDS</p>
                    <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>Tìm hiểu thêm</span><i class="icon-right-arrow"></i></a></div>
                </div>
            </div>
        </div>
    </div>

    <!--section why choose us-->
    <div class="section">
        <div class="container">
            <div class="title-wrap text-center">
                <div class="h-sub">Thấy sự khác biệt</div>
                <h2 class="h1">Tại sao chọn chúng tôi?</h2>
                <div class="h-decor"></div>
            </div>
            <div class="row js-icn-carousel icn-carousel flex-column flex-sm-row text-center text-sm-left" data-slick='{"slidesToShow": 4, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}]}'>
                <div class="col-md">
                    <div class="icn-text">
                        <div class="icn-text-circle"><i class="icon-tooth2"></i></div>
                        <div>
                            <h5 class="icn-text-title">Tiêu chuẩn Nha khoa cao</h5>
                            <p>Chúng tôi cung cấp đầy đủ các dịch vụ chăm sóc răng miệng chất lượng cao, từ phòng ngừa đến nha khoa phục hồi chung, điều trị thẩm mỹ, chăm sóc đặc biệt và cấy ghép nha khoa tất cả với giá cả phải chăng.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="icn-text">
                        <div class="icn-text-circle"><i class="icon-team"></i></div>
                        <div>
                            <h5 class="icn-text-title">Nhóm nha khoa cam kết</h5>
                            <p>Đội ngũ nha khoa xuất sắc của chúng tôi rất thân thiện, chu đáo và có nhiều năm kinh nghiệm làm các nhà lâm sàng được thành lập.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="icn-text">
                        <div class="icn-text-circle"><i class="icon-dental-chair"></i></div>
                        <div>
                            <h5 class="icn-text-title">Thiết bị hiện đại</h5>
                            <p>Thực hành của chúng tôi được trang bị công nghệ mới nhất cho phép chúng tôi thực hiện các phương pháp điều trị hiện đại nhất. Chúng tôi chỉ sử dụng các sản phẩm thương hiệu cao cấp từ các nhà sản xuất hàng đầu.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="icn-text">
                        <div class="icn-text-circle"><i class="icon-tooth2"></i></div>
                        <div>
                            <h5 class="icn-text-title">Tiêu chuẩn Nha khoa cao</h5>
                            <p>Chúng tôi cung cấp đầy đủ các dịch vụ chăm sóc răng miệng chất lượng cao, từ phòng ngừa đến nha khoa phục hồi chung, điều trị thẩm mỹ, chăm sóc đặc biệt và cấy ghép nha khoa tất cả với giá cả phải chăng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section why choose us-->
    <!--section testimonials-->
    <div class="section bg-grey py-0">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-sm-7 col-lg-6 mt-2 mt-lg-0 order-1 order-sm-0">
                    <div class="reviews-wrap ml-auto d-flex flex-column justify-content-center">
                        <div class="title-wrap text-center text-md-right px-2 px-md-0">
                            <h2 class="h1">Patient Testimonials</h2>
                            <div class="h-decor"></div>
                        </div>
                        <div class="js-reviews-carousel reviews-carousel text-center text-md-right">
                            <div class="review">
                                <p class="review-text">I Am very impressed with you all as well as being highly proficient is absolutely adorable. I feel so relaxed in her capable hands and hope to be her patient for a very long time! You are a fantastic team and I feel very privileged to come to you all!!!</p>
                                <p><span class="review-author">Wilmer Stevenson,</span> <span class="review-author-position">Creative manager</span></p>
                            </div>
                            <div class="review">
                                <p class="review-text">I Am very impressed with you all as well as being highly proficient is absolutely adorable. I feel so relaxed in her capable hands and hope to be her patient for a very long time! You are a fantastic team and I feel very privileged to come to you all!!!</p>
                                <p><span class="review-author">Wilmer Stevenson,</span> <span class="review-author-position">Creative manager</span></p>
                            </div>
                            <div class="review">
                                <p class="review-text">I Am very impressed with you all as well as being highly proficient is absolutely adorable. I feel so relaxed in her capable hands and hope to be her patient for a very long time! You are a fantastic team and I feel very privileged to come to you all!!!</p>
                                <p><span class="review-author">Wilmer Stevenson,</span> <span class="review-author-position">Creative manager</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5 col-lg-6 d-flex align-items-center order-0 order-sm-1 reviews-photo">
                    <img src="{{Asset('assets/frontend/images/testimonials-right.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!--//section testimonials-->
    <!--section faq-->
    <div class="section bg-grey py-0">
        <div class="container-fluid px-0">
            <div class="row no-gutters">
                <div class="col-xl-6 banner-left bg-full" style="background-image: url(assets/frontend/images/banner-left.jpg)">
                    <div class="banner-left-caption">
                        <div class="banner-left-text1">Get Expert Dental Care</div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="faq-wrap">
                        <div class="d-flex flex-column flex-md-row position-relative px-15 px-lg-0 text-center text-md-left">
                            <div class="title-wrap">
                                <h2 class="h1">Patient Information</h2>
                                <div class="h-decor"></div>
                            </div>
                            <div class="nav nav-pills mt-2 mt-md-0" role="tablist">
                                <a class="nav-link active" data-toggle="pill" href="#tab-A" role="tab">General</a>
                                <a class="nav-link" data-toggle="pill" href="#tab-B" role="tab">Urgent</a>
                            </div>
                        </div>
                        <div id="tab-content" class="tab-content mt-2 mt-lg-4">
                            <div id="tab-A" class="tab-pane fade show active" role="tabpanel">
                                <div id="faqAccordion1" class="faq-accordion" data-children=".faq-item">
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem1" aria-expanded="true"><span>1.</span><span>How often 1 should I visit my dentist?</span></a>
                                        <div id="faqItem1" class="collapse show faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem2" aria-expanded="false" class="collapsed"><span>2.</span><span>Why are regular dental assessments so important?</span></a>
                                        <div id="faqItem2" class="collapse faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem3" aria-expanded="false" class="collapsed"><span>3.</span><span>How do I know if my teeth are healthy?</span></a>
                                        <div id="faqItem3" class="collapse faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem4" aria-expanded="false" class="collapsed"><span>4.</span><span>How can I improve my oral hygiene?</span></a>
                                        <div id="faqItem4" class="collapse faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-B" class="tab-pane fade" role="tabpanel">
                                <div id="faqAccordion2" class="faq-accordion" data-children=".faq-item">
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion2" href="#faqItem21" aria-expanded="true"><span>1.</span><span>How can I improve my oral hygiene?</span></a>
                                        <div id="faqItem21" class="collapse show faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion2" href="#faqItem22" aria-expanded="false" class="collapsed"><span>2.</span><span>How do I know if my teeth are healthy?</span></a>
                                        <div id="faqItem22" class="collapse faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion2" href="#faqItem23" aria-expanded="false" class="collapsed"><span>3.</span>Why are regular dental assessments so important?</a>
                                        <div id="faqItem23" class="collapse faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion2" href="#faqItem24" aria-expanded="false" class="collapsed"><span>4.</span><span>How often 1 should I visit my dentist?</span></a>
                                        <div id="faqItem24" class="collapse faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section faq-->

    <!--section clients gallery-->
    <div class="section">
        <div class="container p-0">
            <div class="title-wrap text-center">
                <div class="h-sub">Our clients stories</div>
                <h2 class="h1">Smile Gallery</h2>
                <div class="h-decor"></div>
            </div>
            <div class="row no-gutters mx-lg-15">
                <div class="col"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-01.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-01.jpg')}}" alt="" class="img-fluid"></span></div>
                <div class="col"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-02.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-02.jpg')}}" alt="" class="img-fluid"></span></div>
                <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-03.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-03.jpg')}}" alt="" class="img-fluid"></span></div>
                <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-04.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-04.jpg')}}" alt="" class="img-fluid"></span></div>
                <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-05.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-05.jpg')}}" alt="" class="img-fluid"></span></div>
            </div>
            <div class="row no-gutters mx-lg-15">
                <div class="col"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-06.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-06.jpg')}}" alt="" class="img-fluid"></span></div>
                <div class="col"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-07.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-07.jpg')}}" alt="" class="img-fluid"></span></div>
                <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-08.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-08.jpg')}}" alt="" class="img-fluid"></span></div>
                <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-09.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-09.jpg')}}" alt="" class="img-fluid"></span></div>
                <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-10.jpg"><img src="{{Asset('assets/frontend/images/gallery/smile-gallery-10.jpg')}}" alt="" class="img-fluid"></span></div>
            </div>
            <div class="text-center mt-5">
                <a href="gallery.html" class="btn btn-sm btn-hover-fill">View more smiles</a>
            </div>
        </div>
    </div>
    <!--//section clients gallery-->
    <!--section call us-->
    <div class="section mt-5">
        <div class="container-fluid px-0">
            <div class="banner-call">
                <div class="row no-gutters">
                    <div class="col-sm-6 col-lg-4 order-2 order-sm-1 mt-3 mt-md-0 text-center text-md-right">
                        <!--<img src="{{Asset('assets/frontend/images/banner-callus.jpg')}}" alt="" class="shift-left" >-->
                    </div>
                    <div class="col-sm-6 col-lg-8 d-flex align-items-center order-1 order-sm-2">
                        <div class="text-center">
                            <h2>Looking for a Certified Dentist?</h2>
                            <h6>We're always accepting new patients!</h6>
                            <div class="mt-2 mt-lg-4">
                                <a href="#" class="btn btn-lg icn-left"><i class="icon-telephone"></i>1-800-267-0000<i class="icon-telephone"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .banner-call {
            background-attachment: fixed !important;
            background: url({{Asset('assets/frontend/images/banner-callus.jpg')}}) no-repeat center top;
            background-attachment: scroll;
            background-size: auto auto;
            height: 260px;
            padding-top: 50px;
        }
    </style>
    <!--section call us-->
@stop

