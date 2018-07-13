@section('content')
    <!--section slider-->
    <div class="section mt-0">
        <div id="mainSliderWrapper">
            <div class="loading-content">
                <div class="inner-circles-loader"></div>
            </div>
            <div class="main-slider arrows-white arrows-bottom" id="mainSlider" data-slick='{"arrows": false, "dots": false}'>
                @foreach ($sliders as $slider)
                    <?php $imageUrl = Media::find($slider->media_id); ?>
                    <div class="slide">
                        <div class="img--holder" data-animation="kenburns" data-bg="{{ $imageUrl->path.$imageUrl->original }}"></div>
                        <div class="slide-content center">
                            <div class="vert-wrap container">
                                <div class="vert">
                                    <div class="container">
                                        <div class="slide-txt1" data-animation="fadeInDown" data-animation-delay="1s">{{ $slider->title }}</div>
                                        <div class="slide-txt2" data-animation="fadeInUp" data-animation-delay="1.5s">{{ $slider->summary }}</div>
                                        <div class="slide-btn"><a href="services.html" class="btn btn-white" data-animation="fadeInUp" data-animation-delay="2s"><i class="icon-right-arrow"></i><span>Tìm hiểu thêm</span><i class="icon-right-arrow"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
                        <h2 class="h2">{{ $intro->title }}</h2>
                        <div class="h-decor"></div>
                    </div>
                    <p class="p-lg">{{ $intro->summary }}</p>
                    <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>Tìm hiểu thêm</span><i class="icon-right-arrow"></i></a></div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-1">
                    <div class="video-wrap embed-responsive embed-responsive-16by9">
                        <iframe src="https://www.youtube.com/embed/VQEtGhC8i6w?autoplay=0&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;start=70" allowfullscreen></iframe>
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
        <div class="container-fluid">
            <div class="title-wrap text-center">
                <div class="h-sub">Thấy sự khác biệt</div>
                <h2 class="h2">Tại sao chọn chúng tôi?</h2>
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
                            <p>Đội ngũ nha khoa xuất sắc của chúng tôi rất thân thiện, chu đáo và có nhiều năm kinh nghiệm làm các nhà lâm sàng được thành lập. Đội ngũ nha khoa xuất sắc của chúng tôi rất thân thiện, chu đáo và có nhiều năm kinh nghiệm làm các nhà lâm sàng được thành lập</p>
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
                            <h2 class="h2">Nhận xét của khách hàng</h2>
                            <div class="h-decor"></div>
                        </div>
                        <div class="js-reviews-carousel reviews-carousel text-center text-md-right">
                            <div class="review">
                                <p class="review-text">Đội ngũ kỹ thuật Jensen Dental không những có tay nghề cao, được đào tạo kiến thức chuyên môn sâu về răng – hàm – mặt, mà còn luôn rất có tâm trong nghề, luôn tư vấn cho bệnh nhân rất tận tình, chia sẻ đầy đủ thông tin và phương án điều trị tối ưu nhất cho bệnh nhân !!!</p>
                                <p><span class="review-author">Phạm Hương,</span> <span class="review-author-position">Giám đốc công ty tư nhân</span></p>
                            </div>
                            <div class="review">
                                <p class="review-text">Đội ngũ kỹ thuật Jensen Dental không những có tay nghề cao, được đào tạo kiến thức chuyên môn sâu về răng – hàm – mặt, mà còn luôn rất có tâm trong nghề, luôn tư vấn cho bệnh nhân rất tận tình, chia sẻ đầy đủ thông tin và phương án điều trị tối ưu nhất cho bệnh nhân !!!</p>
                                <p><span class="review-author">Thanh Nga,</span> <span class="review-author-position">Quản lý sản phẩm</span></p>
                            </div>
                            <div class="review">
                                <p class="review-text">Đội ngũ kỹ thuật Jensen Dental không những có tay nghề cao, được đào tạo kiến thức chuyên môn sâu về răng – hàm – mặt, mà còn luôn rất có tâm trong nghề, luôn tư vấn cho bệnh nhân rất tận tình, chia sẻ đầy đủ thông tin và phương án điều trị tối ưu nhất cho bệnh nhân !!!</p>
                                <p><span class="review-author">Phạm Vũ,</span> <span class="review-author-position">Quản lý sản phẩm</span></p>
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
                    <div class="banner-center-caption">
                        <div class="banner-center-text1" style="text-align: center; font-size: 38px;">Giải đáp thắc mắc khách hàng</div><br>
                        <div class="banner-center-text1" style="text-align: center; font-size: 20px;">Gửi câu hỏi của bạn về hòm thư điện tử <span style="color: #2184d3; text-decoration: underline;">info@ids-vietnam.com</span> của chúng tôi để được giải đáp</div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="faq-wrap">
                        <div class="d-flex flex-column flex-md-row position-relative px-15 px-lg-0 text-center text-md-left">
                            <div class="title-wrap">
                                <h2 class="h2">Câu hỏi thường gặp</h2>
                                <div class="h-decor"></div>
                            </div>
                            <div class="nav nav-pills mt-2 mt-md-0" role="tablist">
                                <a class="nav-link active" data-toggle="pill" href="#tab-A" role="tab">Chung</a>
                                <a class="nav-link" data-toggle="pill" href="#tab-B" role="tab">Khẩn cấp</a>
                            </div>
                        </div>
                        <div id="tab-content" class="tab-content mt-2 mt-lg-4">
                            <div id="tab-A" class="tab-pane fade show active" role="tabpanel">
                                <div id="faqAccordion1" class="faq-accordion" data-children=".faq-item">
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem1" aria-expanded="true"><span>1.</span><span>Tôi nên đi khám nha sĩ bao lâu một lần?</span></a>
                                        <div id="faqItem1" class="collapse show faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Mọi nhu cầu của mọi người đều khác nhau, vì vậy hãy trò chuyện với nha sĩ của bạn về việc bạn cần kiểm tra răng thường xuyên như thế nào dựa trên tình trạng miệng, răng và nướu răng của bạn. Chúng tôi khuyên trẻ em nên đi nha sĩ ít nhất mỗi năm một lần.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem2" aria-expanded="false" class="collapsed"><span>2.</span><span>Đánh giá nha khoa thường xuyên?</span></a>
                                        <div id="faqItem2" class="collapse faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem3" aria-expanded="false" class="collapsed"><span>3.</span><span>Răng của tôi có khỏe mạnh không?</span></a>
                                        <div id="faqItem3" class="collapse faq-item-content" role="tabpanel">
                                            <div>
                                                <p>
                                                    Everyone’s needs are different, so have a chat to your dentist about how often you need to have your teeth checked by them based on the condition of your mouth, teeth and gums. It’s recommended that children see their dentist at least once a year.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem4" aria-expanded="false" class="collapsed"><span>4.</span><span>Cải thiện vệ sinh răng miệng của mình?</span></a>
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
    <div class="section" style="margin-bottom: 50px;">
        <div class="container p-0">
            <div class="title-wrap text-center">
                <div class="h-sub">Câu chuyện của khách hàng</div>
                <h2 class="h2">Thư viện ảnh</h2>
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
        </div>
    </div>
    <!--//section clients gallery-->

    <!--section-->
    <div class="section">
        <div class="container">
            <div class="title-wrap text-center">
                <div class="h-sub">Cập nhật thông tin mỗi ngày</div>
                <h2 class="h2">Tin tức mới</h2>
                <div class="h-decor"></div>
            </div>
            <div class="row col-equalH">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-card-photo">
                            <a href="service-page.html"><img src="{{Asset('assets/frontend/images/services-01.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="service-page.html">Cosmetic Dentistry</a></h5>
                        <p>Cosmetic dentistry is concerned with the appearance of teeth and the enhancement of a person's smile</p>
                        <ul class="circle-list">
                            <li><em>Orthodontics</em></li>
                            <li><em>White Fillings</em></li>
                            <li><em>Porcelain Veneers</em></li>
                            <li><em>Teeth Whitening</em></li>
                            <li><em>Inlays &amp; Onlays</em></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-card-photo">
                            <a href="service-page.html"><img src="{{Asset('assets/frontend/images/services-02.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="service-page.html">General Dentistry</a></h5>
                        <p>General dentists provide services related to the general maintenance of oral hygiene and tooth health</p>
                        <ul class="circle-list">
                            <li><em>Root Canal Therapy</em></li>
                            <li><em>Nervous Patients</em></li>
                            <li><em>Extractions</em></li>
                            <li><em>Jaw Joint Problems</em></li>
                            <li><em>Pregnant Woman</em></li>
                            <li><em>Snoring & Sleep Apnoea Solutions</em></li>
                            <li><em>NHS Dentistry</em></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="service-card">
                        <div class="service-card-photo">
                            <a href="service-page.html"><img src="{{Asset('assets/frontend/images/services-03.jpg')}}" class="img-fluid" alt=""></a>
                        </div>
                        <h5 class="service-card-name"><a href="service-page.html">Children`s Dentistry</a></h5>
                        <p>Your child will receive state-of-the-art oral care from our team. </p>
                        <ul class="circle-list">
                            <li><em>Dental Emergencies</em></li>
                            <li><em>Exams & Dental Cleanings</em></li>
                            <li><em>Dental Sedation</em></li>
                            <li><em>Digital X-Rays</em></li>
                            <li><em>Fluoride Treatments</em></li>
                            <li><em>Dental Restorations</em></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->
@stop

