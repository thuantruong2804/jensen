@section('content')
    <!--section-->
    <div class="section" style="margin-top: 20px; margin-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-wrap text-center text-lg-left">
                        <h2 class="h2"> Liên hệ</h2>
                        <div class="h-decor"></div>
                    </div>
                </div>
                <div class="col-md col-lg-6 mt-4 mt-md-0">
                    <form class="contact-form" id="contactForm" method="post" novalidate="novalidate">
                        <div class="successform">
                            <p>Your message was sent successfully!</p>
                        </div>
                        <div class="errorform">
                            <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div>
                        <div class="mt-15">
                            <div>
                                <label>Họ và tên*</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="mt-15">
                                <label>Số điện thoại*</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="mt-15">
                                <label>Email*</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="mt-15">
                                <label>Tiêu đề</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="mt-15">
                            <label>Nội dung</label>
                            <textarea class="form-control" name="content"></textarea>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-hover-fill">Gửi email</button>
                        </div>
                    </form>
                </div>
                <div class="col-md col-lg-6">
                    <div class="mt-15">
                        <div style="border: 1px #E3E3E3 solid;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3795681551182!2d106.6455073146047!3d10.782213262035624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752eb7467acaf5%3A0x11d5be43b7a8d20e!2zMTc1LCAxMDcvNTAgTmkgU8awIEh14buzbmggTGnDqm4sIHBoxrDhu51uZyAxMCwgVMOibiBCw6xuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1529985785662" width="100% !important" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class=""><i class="icon-placeholder2"></i> 175/50/16 Ni Sư Huỳnh Liên – TP HCM</div>
                        <div class=""><i class="icon-black-envelope"></i> info@ids-vietnam.com</div>
                        <div class=""><i class="icon-telephone"></i> +84 8 2264 6868</div>

                        <div style="border: 1px #E3E3E3 solid; margin-top: 30px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.324745540274!2d105.79805921470904!3d21.019688293464267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab5c72522db3%3A0xfda8a351dbb50f14!2zNDEgVsWpIFBo4bqhbSBIw6BtLCBZw6puIEhvw6AsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1529986278226" width="100% !important" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class=""><i class="icon-placeholder2"></i> 41 Vũ Phạm Hàm - Yên Hoà - Cầu Giấy - Hà Nội</div>
                        <div class=""><i class="icon-black-envelope"></i> sales@ids-vietnam.com</div>
                        <div class=""><i class="icon-telephone"></i> +84 24 2268 8080</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--//section-->

@stop

