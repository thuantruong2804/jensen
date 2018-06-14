<!--footer-->
<div class="footer mt-0">
    <div class="container">
        <div class="row py-1 py-md-4 px-1 px-sm-2 px-lg-0">
            <div class="col-lg-4 footer-col1 text-center text-md-left">
                <div class="row flex-column flex-md-row flex-lg-column">
                    <div class="col-md col-lg-auto">
                        <div class="footer-logo">
                            <img src="{{Asset('assets/frontend/images/footer-logo.png')}}" alt="" class="img-fluid">
                        </div>
                        <div class="footer-text mt-1">
                            <p>I am writing to you to say how much I appreciate your skills as a caring and gentle dentist. </p>
                            <b>- John L. Sand</b>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="footer-social">
                            <a href="https://www.facebook.com/" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
                            <a href="https://www.twitter.com/" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
                            <a href="https://plus.google.com/" target="blank" class="hovicon"><i class="icon-google-logo"></i></a>
                            <a href="https://www.instagram.com/" target="blank" class="hovicon"><i class="icon-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <h3 class="text-center text-md-left">Blog Posts</h3>
                <div class="footer-post d-flex">
                    <div class="footer-post-photo"><img src="{{Asset('assets/frontend/images/footer-post-author-01.jpg')}}" alt="" class="img-fluid"></div>
                    <div class="footer-post-text">
                        <div class="footer-post-title"><a href="post.html">Are you brushing your teeth correctly?</a></div>
                        <p>Roseman University College of Dental Medicine is providing dental screenings and cleanings free to children ages 18...</p>
                    </div>
                </div>
                <div class="footer-post d-flex">
                    <div class="footer-post-photo"><img src="{{Asset('assets/frontend/images/footer-post-author-02.jpg')}}" alt="" class="img-fluid"></div>
                    <div class="footer-post-text">
                        <div class="footer-post-title"><a href="post.html">FREE Dental Screening & X-Rays</a></div>
                        <p>Find out if you are qualified for FREE fillings or deep cleanings. Dental students looking for patients for upcoming licensure exam...</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <h3 class="text-center text-md-left">Our Contacts</h3>
                <ul class="icn-list">
                    <li><i class="icon-placeholder2"></i>1560 Holden Street San Diego,
                        <br> CA 92139
                        <br>
                        <a href="contact.html" class="btn btn-xs btn-gradient"><i class="icon-placeholder2"></i><span>Get directions on the map</span><i class="icon-right-arrow"></i></a>
                    </li>
                    <li><i class="icon-telephone"></i><b><span class="phone"><span class="text-nowrap">1-800-267-0000</span>, <span class="text-nowrap">1-800-267-0001</span></span></b>
                        <br>(24/7 General inquiry)</li>
                    <li><i class="icon-black-envelope"></i><a href="mailto:info@dentco.net">info@dentco.net</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row text-center text-md-left">
                <div class="col-sm">Copyright © 2018 <a href="#">DentCo</a><span class="d-none d-sm-inline">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
                    <br class="d-sm-none"><a href="#">Privacy Policy</a></div>
                <div class="col-sm-auto ml-auto"><span class="d-none d-sm-inline">For emergency cases&nbsp;&nbsp;&nbsp;</span><i class="icon-telephone"></i>&nbsp;&nbsp;<b>1-800-267-0000</b></div>
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