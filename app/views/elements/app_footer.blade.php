<!--footer-->
<div class="footer mt-0" style="margin-top: 30px !important;">
    <div class="container-fluid">
        <div class="row py-1 py-md-4 px-1 px-sm-2 px-lg-0" style="background-color: #96989A; color: #fff !important;">
            <div class="col-lg-3 footer-col1 text-center text-md-center">
                <a href="{{ URL::to('/') }}">
                    <img src="{{Asset('assets/frontend/images/cropped-jensen_logo_footer.png')}}" style="width: 80%; max-height: 200px; margin-top: 70px;">
                </a>
            </div>
            <div class="col-lg-4 footer-col1 text-center text-md-left">
                <h4 class="h4" style="margin-bottom: 0px !important; line-height: 0.2; text-transform: uppercase;">Thông tin liên hệ</h4>
                <div class="h-decor" style="margin-top: 0px !important; background: -webkit-linear-gradient(left, #fff, #fff); width: 100%"></div>
                <ul class="icn-list" style="margin-top: 20px;">
                    <li>
                        <img src="{{Asset('assets/frontend/images/Map-Icon-2232.png')}}" style="width: 32px; height: 32px; position: absolute; left: 0px; top: 11px;">
                        175/50/16 Ni Sư Huỳnh Liên – TP HCM
                        <br>  41 Vũ Phạm Hàm - Yên Hoà - Cầu Giấy - Hà Nội
                    </li>
                    <li>
                        <img src="{{Asset('assets/frontend/images/white-email-icon_90796.png')}}" style="width: 38px; height: 38px; position: absolute; left: 0px; top: 10px;">
                        <a href="mailto:info@ids-vietnam.com">info@ids-vietnam.com</a>
                        <br><a href="mailto:sales@ids-vietnam.com">sales@ids-vietnam.com</a>
                    </li>
                    <li>
                        <img src="{{Asset('assets/frontend/images/telephone.png')}}" style="width: 38px; height: 38px; position: absolute; left: 0px; top: 10px;">
                        <a href="callto:+84 8 2264 6868">+84 8 2264 6868</a>
                        <br><a href="callto:+84 24 2268 8080">+84 24 2268 8080</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 footer-col1 text-center text-md-left">
                <h4 class="h4" style="margin-bottom: 0px !important; line-height: 0.2; text-transform: uppercase;">Mạng xã hội Jensen</h4>
                <div class="h-decor" style="margin-top: 0px !important; background: -webkit-linear-gradient(left, #fff, #fff); width: 100%"></div>
                <div style="margin-top: 30px;">
                    <span class="header-social" style="margin-left: 0px;">
                        <a href="#" class="hovicon" style="margin-left: 0px;">
                            <img src="{{Asset('assets/frontend/images/white-facebook-512.png')}}" style="width: 44px; height: 44px;">
                        </a>
                        <a href="#" class="hovicon">
                            <img src="{{Asset('assets/frontend/images/Sam+Espensen+Twitter+icon.png')}}" style="width: 44px; height: 44px; margin-left: 10px;">
                        </a>
                        <a href="#" class="hovicon">
                            <img src="{{Asset('assets/frontend/images/some-icon-google.png')}}" style="width: 44px; height: 44px; margin-left: 10px;">
                        </a>
                        <a href="#" class="hovicon">
                            <img src="{{Asset('assets/frontend/images/youtube-256.png')}}" style="width: 44px; height: 44px; margin-left: 10px;">
                        </a>
                    </span>
                </div>
            </div>
            <div class="col-lg-2 footer-col1 text-center text-md-left">
                <a href="{{ URL::to('/') }}"><img src="{{Asset('assets/frontend/images/9.png')}}" style="max-height: 200px; margin-top: 25px;"></a>
            </div>
            <style>
                ul.footer-menu {
                    padding-left: 30px;
                }
                ul.icn-list li {
                    padding-left: 40px !important;
                }
                ul.icn-list li a {
                    color: #fff !important;
                }

            </style>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container-fluid">
            <div class="row text-center text-md-center">
                <div class="col-sm">Copyright © 2018 <a href="#">Jensen Dental</a><span class="d-none d-sm-inline">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
                    <br class="d-sm-none"><a href="#"> Đã đăng ký bản quyền</a></div>
            </div>
        </div>
    </div>
</div>
<!--//footer-->
<div class="backToTop js-backToTop">
    <i class="icon icon-up-arrow"></i>
</div>
<div class="modal modal-form modal-form-sm fade" id="modalQuestionForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <button aria-label='Close' class='close' data-dismiss='modal'>
                <i class="icon-error"></i>
            </button>
            <div class="modal-body">
                <div class="modal-form">
                    <h3>Ask a Question</h3>
                    <form class="mt-15" id="questionForm" method="post" novalidate>
                        <div class="successform">
                            <p>Your message was sent successfully!</p>
                        </div>
                        <div class="errorform">
                            <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div>
                        <div class="input-group">
                                    <span>
                                    <i class="icon-user"></i>
                                </span>
                            <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Your Name*" />
                        </div>
                        <div class="input-group">
                                    <span>
                                        <i class="icon-email2"></i>
                                    </span>
                            <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Your Email*" />
                        </div>
                        <div class="input-group">
                                    <span>
                                        <i class="icon-smartphone"></i>
                                    </span>
                            <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Your Phone" />
                        </div>
                        <textarea name="message" class="form-control" placeholder="Your comment*"></textarea>
                        <div class="text-right mt-2">
                            <button type="submit" class="btn btn-sm btn-hover-fill">ASK NOW</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-form fade" id="modalBookingForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <button aria-label='Close' class='close' data-dismiss='modal'>
                <i class="icon-error"></i>
            </button>
            <div class="modal-body">
                <div class="modal-form">
                    <h3>Book an Appointment</h3>
                    <form class="mt-15" id="bookingForm" method="post" novalidate>
                        <div class="successform">
                            <p>Your message was sent successfully!</p>
                        </div>
                        <div class="errorform">
                            <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div>
                        <div class="input-group">
                                    <span>
                                    <i class="icon-user"></i>
                                </span>
                            <input type="text" name="bookingname" class="form-control" autocomplete="off" placeholder="Your Name*" />
                        </div>
                        <div class="row row-xs-space mt-1">
                            <div class="col-sm-6">
                                <div class="input-group">
                                            <span>
                                                <i class="icon-email2"></i>
                                            </span>
                                    <input type="text" name="bookingemail" class="form-control" autocomplete="off" placeholder="Your Email*" />
                                </div>
                            </div>
                            <div class="col-sm-6 mt-1 mt-sm-0">
                                <div class="input-group">
                                            <span>
                                                <i class="icon-smartphone"></i>
                                            </span>
                                    <input type="text" name="bookingphone" class="form-control" autocomplete="off" placeholder="Your Phone" />
                                </div>
                            </div>
                        </div>
                        <div class="row row-xs-space mt-1">
                            <div class="col-sm-6">
                                <div class="input-group">
                                            <span>
                                                <i class="icon-birthday"></i>
                                            </span>
                                    <input type="text" name="bookingage" class="form-control" autocomplete="off" placeholder="Your age" />
                                </div>
                            </div>
                        </div>
                        <div class="selectWrapper input-group mt-1">
                                    <span>
                                        <i class="icon-tooth"></i>
                                    </span>
                            <select name="bookingservice" class="form-control">
                                <option disabled>Select Service</option>
                                <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                                <option value="General Dentistry">General Dentistry</option>
                                <option value="Orthodontics">Orthodontics</option>
                                <option value="Children`s Dentistry">Children`s Dentistry</option>
                                <option value="Dental Implants">Dental Implants</option>
                                <option value="Dental Emergency">Dental Emergency</option>
                            </select>
                        </div>
                        <div class="input-group flex-nowrap mt-1">
                                    <span>
                                        <i class="icon-calendar2"></i>
                                    </span>
                            <div class="datepicker-wrap">
                                <input name="bookingdate" type="text" class="form-control datetimepicker" placeholder="Date" readonly>
                            </div>
                        </div>
                        <div class="input-group flex-nowrap mt-1">
                                    <span>
                                        <i class="icon-clock"></i>
                                    </span>
                            <div class="datepicker-wrap">
                                <input name="bookingtime" type="text" class="form-control timepicker" placeholder="Time">
                            </div>
                        </div>
                        <textarea name="bookingmessage" class="form-control" placeholder="Your comment"></textarea>
                        <div class="text-right mt-2">
                            <button type="submit" class="btn btn-sm btn-hover-fill">BOOK NOW</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="backToTop js-backToTop">
        <i class="icon icon-up-arrow"></i>
    </div>
    <div class="modal modal-form modal-form-sm fade" id="modalQuestionForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <button aria-label='Close' class='close' data-dismiss='modal'>
                    <i class="icon-error"></i>
                </button>
                <div class="modal-body">
                    <div class="modal-form">
                        <h3>Ask a Question</h3>
                        <form class="mt-15" id="questionForm" method="post" novalidate>
                            <div class="successform">
                                <p>Your message was sent successfully!</p>
                            </div>
                            <div class="errorform">
                                <p>Something went wrong, try refreshing and submitting the form again.</p>
                            </div>
                            <div class="input-group">
                                    <span>
                                    <i class="icon-user"></i>
                                </span>
                                <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Your Name*" />
                            </div>
                            <div class="input-group">
                                    <span>
                                        <i class="icon-email2"></i>
                                    </span>
                                <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Your Email*" />
                            </div>
                            <div class="input-group">
                                    <span>
                                        <i class="icon-smartphone"></i>
                                    </span>
                                <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Your Phone" />
                            </div>
                            <textarea name="message" class="form-control" placeholder="Your comment*"></textarea>
                            <div class="text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-hover-fill">ASK NOW</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-form fade" id="modalBookingForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <button aria-label='Close' class='close' data-dismiss='modal'>
                    <i class="icon-error"></i>
                </button>
                <div class="modal-body">
                    <div class="modal-form">
                        <h3>Book an Appointment</h3>
                        <form class="mt-15" id="bookingForm" method="post" novalidate>
                            <div class="successform">
                                <p>Your message was sent successfully!</p>
                            </div>
                            <div class="errorform">
                                <p>Something went wrong, try refreshing and submitting the form again.</p>
                            </div>
                            <div class="input-group">
                                    <span>
                                    <i class="icon-user"></i>
                                </span>
                                <input type="text" name="bookingname" class="form-control" autocomplete="off" placeholder="Your Name*" />
                            </div>
                            <div class="row row-xs-space mt-1">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                            <span>
                                                <i class="icon-email2"></i>
                                            </span>
                                        <input type="text" name="bookingemail" class="form-control" autocomplete="off" placeholder="Your Email*" />
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-1 mt-sm-0">
                                    <div class="input-group">
                                            <span>
                                                <i class="icon-smartphone"></i>
                                            </span>
                                        <input type="text" name="bookingphone" class="form-control" autocomplete="off" placeholder="Your Phone" />
                                    </div>
                                </div>
                            </div>
                            <div class="row row-xs-space mt-1">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                            <span>
                                                <i class="icon-birthday"></i>
                                            </span>
                                        <input type="text" name="bookingage" class="form-control" autocomplete="off" placeholder="Your age" />
                                    </div>
                                </div>
                            </div>
                            <div class="selectWrapper input-group mt-1">
                                    <span>
                                        <i class="icon-tooth"></i>
                                    </span>
                                <select name="bookingservice" class="form-control">
                                    <option disabled>Select Service</option>
                                    <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                                    <option value="General Dentistry">General Dentistry</option>
                                    <option value="Orthodontics">Orthodontics</option>
                                    <option value="Children`s Dentistry">Children`s Dentistry</option>
                                    <option value="Dental Implants">Dental Implants</option>
                                    <option value="Dental Emergency">Dental Emergency</option>
                                </select>
                            </div>
                            <div class="input-group flex-nowrap mt-1">
                                    <span>
                                        <i class="icon-calendar2"></i>
                                    </span>
                                <div class="datepicker-wrap">
                                    <input name="bookingdate" type="text" class="form-control datetimepicker" placeholder="Date" readonly>
                                </div>
                            </div>
                            <div class="input-group flex-nowrap mt-1">
                                    <span>
                                        <i class="icon-clock"></i>
                                    </span>
                                <div class="datepicker-wrap">
                                    <input name="bookingtime" type="text" class="form-control timepicker" placeholder="Time">
                                </div>
                            </div>
                            <textarea name="bookingmessage" class="form-control" placeholder="Your comment"></textarea>
                            <div class="text-right mt-2">
                                <button type="submit" class="btn btn-sm btn-hover-fill">BOOK NOW</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>