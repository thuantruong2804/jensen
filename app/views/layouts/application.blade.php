<!DOCTYPE html>
<html lang="en-us">
    <head>
        <title>@section('title')@show</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="dentist, stomatologist, dental clinic, medical, clinic, surgery clinic, plastic surgery">
        <meta name="author" content="jensen.vn">
        <meta name="format-detection" content="telephone=no">

        <!-- Stylesheets -->
        {{ HTML::style('assets/frontend/css/slick.css') }}
        {{ HTML::style('assets/frontend/css/animate.min.css') }}
        {{ HTML::style('assets/frontend/css/icon-style.css') }}
        <link href="vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet">
        {{ HTML::style('assets/frontend/css/style.css') }}
        {{ HTML::style('assets/frontend/css/style-0.css') }}
        {{ HTML::style('assets/frontend/css/color-swatch.css') }}

        <!--Favicon-->
        <link rel="icon" href="{{Asset('assets/frontend/images/favicon.png')}}" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

        <!-- Google map -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCiFdr5Z0WRIXKUOqoRRvzRQ5SkzhkUVjk"></script>

        <!-- FAVICONS -->
        <link rel="icon" href="{{Asset('assets/frontend/img/logo.png')}}" type="image/x-icon">
    </head>
    <body class="">
    <!--header-->
    <header class="header">
        <div class="header-quickLinks js-header-quickLinks d-lg-none">
            <div class="quickLinks-top js-quickLinks-top"></div>
            <div class="js-quickLinks-wrap-m">
            </div>
        </div>
        <div class="header-topline d-none d-lg-flex">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-auto d-flex align-items-center">
                        <div class="header-info"><i class="icon-placeholder2"></i>1560 Holden Street San Diego, CA 92139</div>
                        <div class="header-phone"><i class="icon-telephone"></i><a href="tel:1-847-555-5555">1-800-267-0000</a> or <a href="tel:1-847-555-5555">1-800-267-0001</a></div>
                        <div class="header-info"><i class="icon-black-envelope"></i><a href="mailto:info@dentco.net">info@dentco.net</a></div>
                    </div>
                    <div class="col-auto ml-auto d-flex align-items-center">
                        <span class="d-none d-xl-inline-block">Stay connected:</span>
                        <span class="header-social">
							<a href="#" class="hovicon"><i class="icon-facebook-logo-circle"></i></a>
							<a href="#" class="hovicon"><i class="icon-twitter-logo-circle"></i></a>
							<a href="#" class="hovicon"><i class="icon-google-plus-circle"></i></a>
						</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-content">
            <div class="container">
                <div class="row align-items-lg-center">
                    <button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNavDropdown">
                        <span class="icon-menu"></span>
                    </button>
                    <div class="col-lg-auto col-lg-3 d-flex align-items-lg-center">
                        <a href="index.html" class="header-logo"><img src="{{Asset('assets/frontend/images/logo.png')}}" alt="" class="img-fluid"></a>
                    </div>
                    <div class="col-lg ml-auto">
                        <div class="header-nav js-header-nav">
                            <nav class="navbar navbar-expand-lg btco-hover-menu">
                                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="about.html">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="services.html" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="services.html">All Services</a></li>
                                                <li><a class="dropdown-item" href="service-page.html">Service Page</a></li>
                                                <li><a class="dropdown-item" href="prices.html">Prices</a></li>
                                                <li><a class="dropdown-item" href="shop-listing.html">Online Shop</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="gallery.html" class="nav-link dropdown-toggle" data-toggle="dropdown">Gallery</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="gallery.html">Creative Gallery</a></li>
                                                <li><a class="dropdown-item" href="gallery-simple.html">Simple Gallery</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a href="our-specialist.html" class="nav-link dropdown-toggle" data-toggle="dropdown">Specialists</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="our-specialist.html">All Specialists</a></li>
                                                <li><a class="dropdown-item" href="doctor-page.html">Doctor Page</a></li>
                                                <li><a class="dropdown-item" href="schedule.html">Schedule Table</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a href="blog.html" class="nav-link dropdown-toggle" data-toggle="dropdown">Blog</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="blog.html">Blog Posts</a></li>
                                                <li><a class="dropdown-item" href="blog-grid.html">Blog Grid Posts</a></li>
                                                <li><a class="dropdown-item" href="blog-post-page.html">Blog Single Post</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="testimonials.html">Testimonials</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact.html">Contacts</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--//header-->
    <div class="page-content">
        <!--section slider-->
        <div class="section mt-0">
            <div class="quickLinks-wrap js-quickLinks-wrap-d d-none d-lg-flex">
                <div class="quickLinks js-quickLinks">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col">
                                <a href="#" class="link">
                                    <i class="icon-placeholder"></i><span>Location</span></a>
                                <div class="link-drop p-0">
                                    <div id="googleMapDrop" class="google-map"></div>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#" class="link">
                                    <i class="icon-clock"></i><span>Working Time</span>
                                </a>
                                <div class="link-drop">
                                    <h5 class="link-drop-title"><i class="icon-clock"></i>Working Time</h5>
                                    <table class="row-table">
                                        <tr>
                                            <td><i>Mon-Thu</i></td>
                                            <td>08:00 - 20:00</td>
                                        </tr>
                                        <tr>
                                            <td><i>Friday</i></td>
                                            <td> 07:00 - 22:00</td>
                                        </tr>
                                        <tr>
                                            <td><i>Saturday</i></td>
                                            <td>08:00 - 18:00</td>
                                        </tr>
                                        <tr>
                                            <td><i>Sunday</i></td>
                                            <td>Closed</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#" class="link">
                                    <i class="icon-pencil-writing"></i><span>Request Form</span>
                                </a>
                                <div class="link-drop">
                                    <h5 class="link-drop-title"><i class="icon-pencil-writing"></i>Request Form</h5>
                                    <form id="requestForm" method="post" novalidate>
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
                                            <input name="requestname" type="text" class="form-control" placeholder="Your Name" />
                                        </div>
                                        <div class="row row-sm-space mt-1">
                                            <div class="col">
                                                <div class="input-group">
													<span>
													<i class="icon-email2"></i>
												</span>
                                                    <input name="requestemail" type="text" class="form-control" placeholder="Your Email" />
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="input-group">
													<span>
													<i class="icon-smartphone"></i>
												</span>
                                                    <input name="requestphone" type="text" class="form-control" placeholder="Your Phone" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="selectWrapper input-group mt-1">
											<span>
											<i class="icon-tooth"></i>
										</span>
                                            <select name="requestservice" class="form-control">
                                                <option disabled>Select Service</option>
                                                <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                                                <option value="General Dentistry">General Dentistry</option>
                                                <option value="Orthodontics">Orthodontics</option>
                                                <option value="Children`s Dentistry">Children`s Dentistry</option>
                                                <option value="Dental Implants">Dental Implants</option>
                                                <option value="Dental Emergency">Dental Emergency</option>
                                            </select>
                                        </div>
                                        <div class="row row-sm-space mt-1">
                                            <div class="col-sm-6">
                                                <div class="input-group flex-nowrap">
													<span>
														<i class="icon-calendar2"></i>
													</span>
                                                    <div class="datepicker-wrap">
                                                        <input name="requestdate" type="text" class="form-control datetimepicker" placeholder="Date" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 mt-1 mt-sm-0">
                                                <div class="input-group flex-nowrap">
													<span>
															<i class="icon-clock"></i>
													</span>
                                                    <div class="datepicker-wrap">
                                                        <input name="requesttime" type="text" class="form-control timepicker" placeholder="Time" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right mt-2">
                                            <button type="submit" class="btn btn-sm btn-hover-fill">Request</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#" class="link">
                                    <i class="icon-calendar"></i><span>Doctors Timetable</span>
                                </a>
                                <div class="link-drop">
                                    <h5 class="link-drop-title"><i class="icon-calendar"></i>Doctors Timetable</h5>
                                    <p>This simply works as a guide and helps you to connect with dentists of your choice. Please confirm the doctor’s availability before leaving your premises.</p>
                                    <p class="text-right"><a href="schedule.html" class="btn btn-sm btn-hover-fill">Details</a></p>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#" class="link">
                                    <i class="icon-price-tag"></i><span>Quick Pricing</span>
                                </a>
                                <div class="link-drop">
                                    <h5 class="link-drop-title"><i class="icon-price-tag"></i>Quick Pricing</h5>
                                    <table class="row-table">
                                        <tr>
                                            <td><i>Initial Consultation</i></td>
                                            <td>$10</td>
                                        </tr>
                                        <tr>
                                            <td><i>Dental check-up</i></td>
                                            <td>$15</td>
                                        </tr>
                                        <tr>
                                            <td><i>Routine Exam (no xrays)</i></td>
                                            <td>$50</td>
                                        </tr>
                                        <tr>
                                            <td><i>Simple Removal of a tooth</i></td>
                                            <td>$122</td>
                                        </tr>
                                        <tr>
                                            <td><i>Teeth cleaning</i></td>
                                            <td>$50 - $75</td>
                                        </tr>
                                        <tr>
                                            <td><i>X-ray image</i></td>
                                            <td>$10</td>
                                        </tr>
                                    </table>
                                    <p class="text-right mt-2"><a href="prices.html" class="btn btn-sm btn-hover-fill">Details</a></p>
                                </div>
                            </div>
                            <div class="col">
                                <a href="#" class="link">
                                    <i class="icon-emergency-call"></i><span>Emergency Case</span></a>
                                <div class="link-drop">
                                    <h5 class="link-drop-title"><i class="icon-emergency-call"></i>Emergency Case</h5>
                                    <p>Emergency dental care may be needed if you have had a blow to the face, lost a filling, or cracked a tooth. </p>
                                    <ul class="icn-list">
                                        <li><i class="icon-telephone"></i><span class="phone">1-800-267-0000<br>1-800-267-0001</span>
                                        </li>
                                        <li><i class="icon-black-envelope"></i><a href="mailto:info@besthotel-email.com">info@besthotel-email.com</a></li>
                                    </ul>
                                    <p class="text-right mt-2"><a href="contact.html" class="btn btn-sm btn-hover-fill">Our Contacts</a></p>
                                </div>
                            </div>
                            <div class="col col-close"><a href="#" class="js-quickLinks-close"><i class="icon-top" data-toggle="tooltip" data-placement="top" title="Close panel"></i></a></div>
                        </div>
                    </div>
                    <div class="quickLinks-open js-quickLinks-open"><span data-toggle="tooltip" data-placement="left" title="Open panel">+</span></div>
                </div>
            </div>
            <div id="mainSliderWrapper">
                <div class="loading-content">
                    <div class="inner-circles-loader"></div>
                </div>
                <div class="main-slider arrows-white arrows-bottom" id="mainSlider" data-slick='{"arrows": false, "dots": false}'>
                    <div class="slide">
                        <div class="img--holder" data-animation="kenburns" data-bg="images/content/slider/slide-02.jpg"></div>
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
                        <div class="img--holder" data-animation="kenburns" data-bg="images/content/slider/slide-01.jpg"></div>
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
                        <div class="h-sub">Welcome to our dental clinic</div>
                    </div>
                    <div class="col-lg-6">
                        <div class="title-wrap text-center text-lg-left">
                            <h2 class="h1">15 Years of Dental Excellence</h2>
                            <div class="h-decor"></div>
                        </div>
                        <p class="p-lg">Make your oral health a priority. Come to us if you need the help of an experienced dentist; we are your partners in keeping your mouth healthy. Whether you want to learn about the condition of your teeth and gums or you need immediate treatment for a particular oral problem, we can help.</p>
                        <p class="p-lg d-none d-lg-block">We have gained experience and expertise in different areas of dentistry. We offer our solutions to children and adults.</p>
                        <a href="#" class="btn mt-1" data-toggle="modal" data-target="#modalBookingForm"><i class="icon-right-arrow"></i><span>Booking a Visit</span><i class="icon-right-arrow"></i></a>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-1">
                        <div class="video-wrap embed-responsive embed-responsive-16by9">
                            <iframe src="https://www.youtube.com/embed/YZEvkRbQgHY?autoplay=0&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;start=70" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//section welcome-->
        <!--section services-->
        <div class="section">
            <div class="container-fluid px-0">
                <div class="title-wrap text-center">
                    <div class="h-sub">What we offer</div>
                    <h2 class="h1">General Services</h2>
                    <div class="h-decor"></div>
                </div>
                <div class="row no-gutters services-box-wrap">
                    <div class="col-4 col-lg-3 order-1">
                        <div class="service-box service-box-greybg service-box--hiddenbtn">
                            <div class="service-box-caption text-center">
                                <div class="service-box-icon"><i class="icon-icon-whitening"></i></div>
                                <div class="service-box-icon-bg"><i class="icon-icon-whitening"></i></div>
                                <h3 class="service-box-title">Cosmetic Dentistry</h3>
                                <p>Cosmetic dentistry is concerned with the appearance of teeth and the enhancement of a person's smile</p>
                                <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>KNOW MORE</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-lg-6 order-2">
                        <div class="service-box">
                            <div class="service-box-image" data-bg="images/content/service-02.jpg"></div>
                            <div class="service-box-caption text-center w-50 ml-auto">
                                <h3 class="service-box-title">General Dentistry</h3>
                                <p>General dentists provide services related to the general maintenance of oral hygiene and tooth health</p>
                                <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>KNOW MORE</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-lg-3 order-4 order-lg-3 order-xl-3">
                        <div class="service-box service-box-greybg service-box--hiddenbtn">
                            <div class="service-box-caption text-center">
                                <div class="service-box-icon"><i class="icon-icon-orthodontics"></i></div>
                                <div class="service-box-icon-bg"><i class="icon-icon-orthodontics"></i></div>
                                <h3 class="service-box-title">Orthodontics</h3>
                                <p>Diagnosis and treatment of improper bites and irregularity of teeth</p>
                                <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>KNOW MORE</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-lg-6 order-3 order-lg-4 order-xl-3">
                        <div class="service-box">
                            <div class="service-box-image" data-bg="images/content/service-04.jpg"></div>
                            <div class="service-box-caption text-center w-50 ml-auto">
                                <h3 class="service-box-title">Children`s Dentistry</h3>
                                <p>Your child will receive state-of-the-art oral care from our team. </p>
                                <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>KNOW MORE</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-lg-3 order-5">
                        <div class="service-box service-box-greybg service-box--hiddenbtn">
                            <div class="service-box-caption text-center">
                                <div class="service-box-icon"><i class="icon-icon-implant"></i></div>
                                <div class="service-box-icon-bg"><i class="icon-icon-implant"></i></div>
                                <h3 class="service-box-title">Dental Implants</h3>
                                <p>When teeth are lost because of disease or an accident, dental implants may be a good option</p>
                                <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>KNOW MORE</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 col-lg-3 order-6">
                        <div class="service-box">
                            <div class="service-box-image" data-bg="images/content/service-06.jpg"></div>
                            <div class="service-box-caption w-50 text-right ml-auto pl-0">
                                <h3 class="service-box-title">Dental Emergency</h3>
                                <p>Helping thousands of people each year find immediate dental services</p>
                                <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>KNOW MORE</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//section services-->
        <!--section why choose us-->
        <div class="section">
            <div class="container">
                <div class="title-wrap text-center">
                    <div class="h-sub">See the difference</div>
                    <h2 class="h1">Why Choose Us?</h2>
                    <div class="h-decor"></div>
                </div>
                <div class="row js-icn-carousel icn-carousel flex-column flex-sm-row text-center text-sm-left" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}]}'>
                    <div class="col-md">
                        <div class="icn-text">
                            <div class="icn-text-circle"><i class="icon-tooth2"></i></div>
                            <div>
                                <h5 class="icn-text-title">High Standard of Dentistry</h5>
                                <p>We provide the full spectrum of high quality dental care, from prevention to general restorative dentistry, cosmetic treatments, specialised care, and dental implantology all at affordable prices.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="icn-text">
                            <div class="icn-text-circle"><i class="icon-team"></i></div>
                            <div>
                                <h5 class="icn-text-title">Committed Dental Team</h5>
                                <p>Our excellent dental team is friendly, caring, and has years of experience as established clinicians.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="icn-text">
                            <div class="icn-text-circle"><i class="icon-dental-chair"></i></div>
                            <div>
                                <h5 class="icn-text-title">Modern Equipment</h5>
                                <p>Our practice is equipped with the latest technology that allows us to perform the most modern treatments. We only use the premium brand products from the leading manufacturers.</p>
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
                        <img src="images/content/testimonials-right.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!--//section testimonials-->
        <!--section achieved-->
        <div class="section">
            <div class="container">
                <div class="title-wrap text-center">
                    <div class="h-sub">Clinic figures</div>
                    <h2 class="h1">What Have We Achieved</h2>
                    <div class="h-decor"></div>
                </div>
                <div class="row d-block js-counter-carousel">
                    <div class="col">
                        <div class="counter-box">
                            <div class="counter-box-number"><span class="count" data-to="15" data-speed="1500">0</span>+</div>
                            <div class="decor"></div>
                            <div class="counter-box-text">Years of experience</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="counter-box">
                            <div class="counter-box-number"><span class="count" data-to="10" data-speed="1500">0</span>K+</div>
                            <div class="decor"></div>
                            <div class="counter-box-text">Improved Smiles</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="counter-box">
                            <div class="counter-box-number"><span class="count" data-to="50" data-speed="1500">0</span>+</div>
                            <div class="decor"></div>
                            <div class="counter-box-text">Dentistry Specialists</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="counter-box">
                            <div class="counter-box-number"><span class="count" data-to="4" data-speed="1500">0</span></div>
                            <div class="decor"></div>
                            <div class="counter-box-text">Our Locations</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//section achieved-->
        <!--section faq-->
        <div class="section bg-grey py-0">
            <div class="container-fluid px-0">
                <div class="row no-gutters">
                    <div class="col-xl-6 banner-left bg-full" style="background-image: url(images/content/banner-left.jpg)">
                        <div class="banner-left-caption">
                            <div class="banner-left-text1">Get Expert Dental Care</div>
                            <div><a href="#" class="btn btn-fill btn-hover-fill mt-3" data-toggle="modal" data-target="#modalQuestionForm"><i class="icon-right-arrow"></i><span>ASK QUESTION</span><i class="icon-right-arrow"></i></a></div>
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
        <!--section special offers-->
        <div class="section" id="specialOffer">
            <div class="container">
                <div class="title-wrap text-center">
                    <div class="h-sub">For our dear clients</div>
                    <h2 class="h1">Special Offers</h2>
                    <div class="h-decor"></div>
                </div>
                <div class="special-carousel js-special-carousel row">
                    <div class="col-6">
                        <div class="special-card">
                            <div class="special-card-photo">
                                <img src="images/content/special-photo-01.jpg" alt="">
                            </div>
                            <div class="special-card-caption text-right">
                                <div class="special-card-txt2">New Patient</div>
                                <div class="special-card-txt1">OFFER</div>
                                <div class="special-card-txt3">Full Consultation, Scale & Polish</div>
                                <div><a href="schedule.html" class="btn mt-2 mt-lg-3"><i class="icon-right-arrow"></i><span>Schedule a Visit</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="special-card">
                            <div class="special-card-photo">
                                <img src="images/content/special-photo-02.jpg" alt="">
                            </div>
                            <div class="special-card-caption text-right">
                                <div class="special-card-txt1">FREE</div>
                                <div class="special-card-txt2">Dental Implant
                                    <br>Consultation</div>
                                <div class="special-card-txt3">Contact us to find out more</div>
                                <div><a href="contact.html" class="btn mt-2 mt-lg-3"><i class="icon-right-arrow"></i><span>Contact NOW</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="special-card">
                            <div class="special-card-photo">
                                <img src="images/content/special-photo-03.jpg" alt="">
                            </div>
                            <div class="special-card-caption text-left">
                                <div class="special-card-txt2">Laser Teeth</div>
                                <div class="special-card-txt1">Whitening</div>
                                <div class="special-card-txt3">and Home Bleaching</div>
                                <div><a href="services.html" class="btn mt-2 mt-lg-3"><i class="icon-right-arrow"></i><span>Know more</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="special-card">
                            <div class="special-card-photo">
                                <img src="images/content/special-photo-04.jpg" alt="">
                            </div>
                            <div class="special-card-caption text-right">
                                <div class="special-card-txt1">Porcelain
                                    <br>Veneer</div>
                                <div class="special-card-txt3">6 Teeth or more in the same jaw,
                                    <br>upper or lower front</div>
                                <div><a href="service-page.html" class="btn mt-2 mt-lg-3"><i class="icon-right-arrow"></i><span>Know more</span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--//section special offers-->
        <!--section clients gallery-->
        <div class="section">
            <div class="container p-0">
                <div class="title-wrap text-center">
                    <div class="h-sub">Our clients stories</div>
                    <h2 class="h1">Smile Gallery</h2>
                    <div class="h-decor"></div>
                </div>
                <div class="row no-gutters mx-lg-15">
                    <div class="col"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-01.jpg"><img src="images/content/gallery/smile-gallery-01.jpg" alt="" class="img-fluid"></span></div>
                    <div class="col"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-02.jpg"><img src="images/content/gallery/smile-gallery-02.jpg" alt="" class="img-fluid"></span></div>
                    <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-03.jpg"><img src="images/content/gallery/smile-gallery-03.jpg" alt="" class="img-fluid"></span></div>
                    <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-04.jpg"><img src="images/content/gallery/smile-gallery-04.jpg" alt="" class="img-fluid"></span></div>
                    <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-05.jpg"><img src="images/content/gallery/smile-gallery-05.jpg" alt="" class="img-fluid"></span></div>
                </div>
                <div class="row no-gutters mx-lg-15">
                    <div class="col"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-06.jpg"><img src="images/content/gallery/smile-gallery-06.jpg" alt="" class="img-fluid"></span></div>
                    <div class="col"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-07.jpg"><img src="images/content/gallery/smile-gallery-07.jpg" alt="" class="img-fluid"></span></div>
                    <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-08.jpg"><img src="images/content/gallery/smile-gallery-08.jpg" alt="" class="img-fluid"></span></div>
                    <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-09.jpg"><img src="images/content/gallery/smile-gallery-09.jpg" alt="" class="img-fluid"></span></div>
                    <div class="col d-none d-sm-flex"><span class="gallery-popover-link" data-full="images/content/gallery/smile-gallery-hover-10.jpg"><img src="images/content/gallery/smile-gallery-10.jpg" alt="" class="img-fluid"></span></div>
                </div>
                <div class="text-center mt-5">
                    <a href="gallery.html" class="btn btn-sm btn-hover-fill">View more smiles</a>
                </div>
            </div>
        </div>
        <!--//section clients gallery-->
        <!--section call us-->
        <div class="section mt-5">
            <div class="container">
                <div class="banner-call">
                    <div class="row no-gutters">
                        <div class="col-sm-6 col-lg-5 order-2 order-sm-1 mt-3 mt-md-0 text-center text-md-right">
                            <img src="images/content/banner-callus.jpg" alt="" class="shift-left">
                        </div>
                        <div class="col-sm-6 col-lg-7 d-flex align-items-center order-1 order-sm-2">
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
        <!--section call us-->
    </div>
    <!--footer-->
    <div class="footer mt-0">
        <div class="container">
            <div class="row py-1 py-md-4 px-1 px-sm-2 px-lg-0">
                <div class="col-lg-4 footer-col1 text-center text-md-left">
                    <div class="row flex-column flex-md-row flex-lg-column">
                        <div class="col-md col-lg-auto">
                            <div class="footer-logo">
                                <img src="images/footer-logo.png" alt="" class="img-fluid">
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
                        <div class="footer-post-photo"><img src="images/content/footer-post-author-01.jpg" alt="" class="img-fluid"></div>
                        <div class="footer-post-text">
                            <div class="footer-post-title"><a href="post.html">Are you brushing your teeth correctly?</a></div>
                            <p>Roseman University College of Dental Medicine is providing dental screenings and cleanings free to children ages 18...</p>
                        </div>
                    </div>
                    <div class="footer-post d-flex">
                        <div class="footer-post-photo"><img src="images/content/footer-post-author-02.jpg" alt="" class="img-fluid"></div>
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
    </div>

    <!-- Vendors -->
    {{ HTML::script('assets/frontend/js/jquery-3.2.1.min.js') }}
    <script src="vendor/jquery-migrate/jquery-migrate-3.0.1.min.js"></script>
    <script src="vendor/cookie/jquery.cookie.js"></script>
    <script src="vendor/bootstrap-datetimepicker/moment.js"></script>
    <script src="vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    {{ HTML::script('assets/frontend/js/bootstrap.min.js') }}
    <script src="vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="vendor/waypoints/sticky.min.js"></script>
    <script src="vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="vendor/slick/slick.min.js"></script>
    <script src="vendor/scroll-with-ease/jquery.scroll-with-ease.min.js"></script>
    <script src="vendor/countTo/jquery.countTo.js"></script>
    <script src="vendor/form-validation/jquery.form.js"></script>
    <script src="vendor/form-validation/jquery.validate.min.js"></script>
    <!-- Custom Scripts -->
    <script src="js/app.js"></script>
    <script src="form/forms.js"></script>
    <script src="color/color.js"></script>

        {{ HTML::script('assets/frontend/js/script.js') }}

        @section('scripts')
        @show
    </body>
</html>