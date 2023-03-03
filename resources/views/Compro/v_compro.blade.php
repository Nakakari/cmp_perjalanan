<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Aisysae Bersaudara</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Your page description here" />
    <meta name="author" content="" />

    <!-- css -->
    <link href="https://fonts.googleapis.com/css?family=Handlee|Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="{{ asset('template_compro') }}/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="{{ asset('template_compro') }}/assets/css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="{{ asset('template_compro') }}/assets/css/flexslider.css" rel="stylesheet" />
    <link href="{{ asset('template_compro') }}/assets/css/prettyPhoto.css" rel="stylesheet" />
    <link href="{{ asset('template_compro') }}/assets/css/camera.css" rel="stylesheet" />
    <link href="{{ asset('template_compro') }}/assets/css/jquery.bxslider.css" rel="stylesheet" />
    <link href="{{ asset('template_compro') }}/assets/css/style.css" rel="stylesheet" />

    <!-- Theme skin -->
    <link href="{{ asset('template_compro') }}/assets/color/default.css" rel="stylesheet" />

    <!-- Fav and touch icons -->
{{--    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('template_compro') }}/assets/ico/apple-touch-icon-144-precomposed.png" />--}}
{{--    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('template_compro') }}/assets/ico/apple-touch-icon-114-precomposed.png" />--}}
{{--    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('template_compro') }}/assets/ico/apple-touch-icon-72-precomposed.png" />--}}
{{--    <link rel="apple-touch-icon-precomposed" href="{{ asset('template_compro') }}/assets/ico/apple-touch-icon-57-precomposed.png" />--}}
{{--    <link rel="shortcut icon" href="{{ asset('template_compro') }}/assets/ico/favicon.png" />--}}

    <!-- =======================================================
      Theme Name: Eterna
      Theme URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
      Author: BootstrapMade.com
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body>

<div id="wrapper">


    <!-- start header -->
    <header>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <p class="topcontact"><i class="icon-phone"></i> +62 088 999 123</p>
                    </div>
                    <div class="span6">

                        <ul class="social-network">
                            <li><a href="#" data-placement="bottom" title="Facebook"><i class="icon-facebook icon-white"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="Twitter"><i class="icon-twitter icon-white"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="Linkedin"><i class="icon-linkedin icon-white"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="Pinterest"><i class="icon-pinterest  icon-white"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="Google +"><i class="icon-google-plus icon-white"></i></a></li>
                            <li><a href="#" data-placement="bottom" title="Dribbble"><i class="icon-dribbble icon-white"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <div class="container">


            <div class="row nomargin">
                <div class="span4">
                    <div class="logo">
                        <a href="/company_profile"><img style="width: 25%" src="{{ url('') }}{{ logo_instansi() }}" alt="" /></a>
                    </div>
                </div>
                <div class="span8">
                    <div class="navbar navbar-static-top">
                        <div class="navigation">
                            <nav>
                                <ul class="nav topnav">
                                    <li class="dropdown active">
                                        <a href="/company_profile"><i class="icon-home"></i> Beranda</a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#aboutus">Tentang Kami </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Hubungi Kami </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Cek Resi </a>
                                    </li>
{{--                                    <li>--}}
{{--                                        <a href="contact.html">Contact </a>--}}
{{--                                    </li>--}}
                                </ul>
                            </nav>
                        </div>
                        <!-- end navigation -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header -->

    <!-- section featured -->
    <section id="featured">

        <!-- slideshow start here -->

        <div class="camera_wrap" id="camera-slide">

            <!-- slide 1 here -->
            <div data-src="{{ asset('template_compro') }}/assets/img/slides/camera/slide1/img1.jpg">
                <div class="camera_caption fadeFromLeft">
                    <div class="container">
                        <div class="row">
                            <div class="span6">
                                <h2 class="animated fadeInDown"><strong>Penawaran terbaik <span class="colored">pengiriman barang</span></strong></h2>
                                <p class="animated fadeInUp"> Dapatkan pengiriman barang yang cepat, aman, dan terpercaya dengan menggunakan layanan ekspedisi kami! Kami adalah perusahaan ekspedisi barang yang siap membantu mengirimkan barang Anda ke seluruh pelosok Indonesia dengan harga yang terjangkau.</p>
{{--                                <a href="#" class="btn btn-success btn-large animated fadeInUp">--}}
{{--                                    <i class="icon-link"></i> Read more--}}
{{--                                </a>--}}
{{--                                <a href="#" class="btn btn-theme btn-large animated fadeInUp">--}}
{{--                                    <i class="icon-download"></i> Download--}}
{{--                                </a>--}}
                            </div>
                            <div class="span6">
                                <img src="{{ asset('template_compro') }}/assets/img/slides/camera/slide1/screen.png" alt="" class="animated bounceInDown delay1" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- slide 2 here -->
            <div data-src="{{ asset('template_compro') }}/assets/img/slides/camera/slide2/img1.jpg">
                <div class="camera_caption fadeFromLeft">
                    <div class="container">
                        <div class="row">
                            <div class="span6">
                                <img src="{{ asset('template_compro') }}/assets/img/slides/camera/slide2/iMac.png" alt="" />
                            </div>
                            <div class="span6">
                                <h2 class="animated fadeInDown"><strong>Tim yang <span class="colored">terlatih</span></strong></h2>
                                <p class="animated fadeInUp"> Kami memiliki tim profesional yang terlatih dalam mengirimkan barang dengan berbagai jenis dan ukuran, sehingga Anda tidak perlu khawatir tentang keamanan barang Anda selama dalam perjalanan. Selain itu, kami juga menyediakan layanan pelacakan online yang memungkinkan Anda untuk memantau status pengiriman barang Anda secara real-time.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- slide 3 here -->
            <div data-src="{{ asset('template_compro') }}/assets/img/slides/camera/slide2/img1.jpg">
                <div class="camera_caption fadeFromLeft">
                    <div class="container">
                        <div class="row">
                            <div class="span6">
                                <img src="{{ asset('template_compro') }}/assets/img/slides/camera/slide2/iMac.png" alt="" />
                            </div>
                            <div class="span6">
                                <h2 class="animated fadeInDown"><strong>Tim yang <span class="colored">terlatih</span></strong></h2>
                                <p class="animated fadeInUp"> Kami memiliki tim profesional yang terlatih dalam mengirimkan barang dengan berbagai jenis dan ukuran, sehingga Anda tidak perlu khawatir tentang keamanan barang Anda selama dalam perjalanan. Selain itu, kami juga menyediakan layanan pelacakan online yang memungkinkan Anda untuk memantau status pengiriman barang Anda secara real-time.</p>
                                <a href="#" class="btn btn-success btn-large animated fadeInUp">
                                    <i class="icon-link"></i> Read more
                                </a>
                                <a href="#" class="btn btn-theme btn-large animated fadeInUp">
                                    <i class="icon-download"></i> Download
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- slideshow end here -->

    </section>
    <!-- /section featured -->

    <section id="content">
        <div class="container">


            <div class="row" id="aboutus" style="padding: 20px 0 0 0; display: flex">
                <div class="span3">
                    <div class="service-box aligncenter flyLeft">
                        <div class="icon">
                            <i class="icon-circled icon-bgprimary icon-map-marker icon-4x"></i>
                        </div>
                        <h5>DKI <span class="colored">Jakarta</span></h5>
                        <p>
                            Komplek Pergudangan KA, Jl. Kp. Bandan, RT.2/RW.4, Ancol, Kec. Pademangan, Jakarta Utara, DKI Jakarta, 14430
                        </p>

                    </div>
                </div>
                <div class="span3">
                    <div class="service-box aligncenter flyIn">
                        <div class="icon">
                            <i class="icon-circled icon-bgsuccess icon-map-marker icon-4x"></i>
                        </div>
                        <h5>Kota <span class="colored">Cirebon</span></h5>
                        <p>
                            Jl. Nyi Mas Gandasari Stasiun Parujakan No.81, Pekalangan, Kec. Pekalipan, Kota Cirebon, Jawa Barat, 45118
                        </p>

                    </div>
                </div>
                <div class="span3">
                    <div class="service-box aligncenter flyIn">
                        <div class="icon">
                            <i class="icon-circled icon-bgdanger icon-map-marker icon-4x"></i>
                        </div>
                        <h5>Kota <span class="colored">Semarang</span></h5>
                        <p>
                            Jl. Peres No.177A, Kuningan, Kecamatan Semarang Utara, Kota Semarang, Jawa Tengah, 50176
                        </p>

                    </div>
                </div>
                <div class="span3">
                    <div class="service-box aligncenter flyRight">
                        <div class="icon">
                            <i class="icon-circled icon-bgwarning icon-map-marker icon-4x"></i>
                        </div>
                        <h5>Kota <span class="colored">Surabaya</span></h5>
                        <p>
                            Pintu C Pergudangan Kereta Api Logistic, Jl. Cepu No.1, Gundih, Kec. Bubutan, Kota Surabaya, Jawa Timur, 60172
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="span12">
                    <div class="cta-box">
                        <div class="row">
                            <div class="span8">
                                <div class="cta-text">
                                    <h2>Special price in very <span>limited</span> times</h2>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="cta-btn">
                                    <a href="#" class="btn btn-theme">Get a quote <i class="icon-angle-right"></i></a>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>

            <div class="row">
                <div class="span12 aligncenter">
                    <h3 class="title">What people <strong>saying</strong> about us</h3>
                    <div class="blankline30"></div>

                    <ul class="bxslider">
                        <li>
                            <blockquote>
                                Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                                feugiat
                            </blockquote>
                            <div class="testimonial-autor">
                                <img src="{{ asset('template_compro') }}/assets/img/dummies/testimonial/1.png" alt="" />
                                <h4>Hillary Doe</h4>
                                <a href="#">www.companyname.com</a>
                            </div>
                        </li>
                        <li>
                            <blockquote>
                                Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                                feugiat
                            </blockquote>
                            <div class="testimonial-autor">
                                <img src="{{ asset('template_compro') }}/assets/img/dummies/testimonial/2.png" alt="" />
                                <h4>Michael Doe</h4>
                                <a href="#">www.companyname.com</a>
                            </div>
                        </li>
                        <li>
                            <blockquote>
                                Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                                feugiat
                            </blockquote>
                            <div class="testimonial-autor">
                                <img src="{{ asset('template_compro') }}/assets/img/dummies/testimonial/3.png" alt="" />
                                <h4>Mark Donovan</h4>
                                <a href="#">www.companyname.com</a>
                            </div>
                        </li>
                        <li>
                            <blockquote>
                                Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis
                                feugiat
                            </blockquote>
                            <div class="testimonial-autor">
                                <img src="{{ asset('template_compro') }}/assets/img/dummies/testimonial/4.png" alt="" />
                                <h4>Marry Doe Elliot</h4>
                                <a href="#">www.companyname.com</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </section>


    <section id="works">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h4 class="title">Recent <strong>Works</strong></h4>
                    <div class="row">

                        <div class="grid cs-style-4">
                            <div class="span3">
                                <div class="item">
                                    <figure>
                                        <div><img src="{{ asset('template_compro') }}/assets/img/dummies/works/1.jpg" alt="" /></div>
                                        <figcaption>
                                            <div>
                          <span>
								<a href="{{ asset('template_compro') }}/assets/img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>
								</span>
                                                <span>
								<a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>
								</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="item">
                                    <figure>
                                        <div><img src="{{ asset('template_compro') }}/assets/img/dummies/works/2.jpg" alt="" /></div>
                                        <figcaption>
                                            <div>
                          <span>
								<a href="{{ asset('template_compro') }}/assets/img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>
								</span>
                                                <span>
								<a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>
								</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="item">
                                    <figure>
                                        <div><img src="{{ asset('template_compro') }}/assets/img/dummies/works/3.jpg" alt="" /></div>
                                        <figcaption>
                                            <div>
                          <span>
								<a href="{{ asset('template_compro') }}/assets/img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>
								</span>
                                                <span>
								<a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>
								</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="span3">
                                <div class="item">
                                    <figure>
                                        <div><img src="{{ asset('template_compro') }}/assets/img/dummies/works/4.jpg" alt="" /></div>
                                        <figcaption>
                                            <div>
                          <span>
								<a href="{{ asset('template_compro') }}/assets/img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>
								</span>
                                                <span>
								<a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>
								</span>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="span4">
                    <div class="widget">
                        <h5 class="widgetheading">Browse pages</h5>
                        <ul class="link-list">
                            <li><a href="/company_profile">Beranda</a></li>
                            <li><a href="#">Hubungi Kami</a></li>
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Cek Resi</a></li>
                        </ul>

                    </div>
                </div>
                <div class="span4">
                    <div class="widget">
                        <h5 class="widgetheading">Get in touch</h5>
                        <address>
                            <strong>Eterna company Inc.</strong><br>
                            Somestreet 200 VW, Suite Village A.001<br>
                            Jakarta 13426 Indonesia
                        </address>
                        <p>
                            <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891 <br>
                            <i class="icon-envelope-alt"></i> email@domainname.com
                        </p>
                    </div>
                </div>
                <div class="span4">
                    <div class="widget">
                        <h5 class="widgetheading">Subscribe newsletter</h5>
                        <p>
                            Keep updated for new releases and freebies. Enter your e-mail and subscribe to our newsletter.
                        </p>
                        <form class="subscribe">
                            <div class="input-append">
                                <input class="span2" id="appendedInputButton" type="text">
                                <button class="btn btn-theme" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div id="sub-footer">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <div class="copyright">
                            <p><span>&copy; Eterna company. All right reserved</span></p>
                        </div>

                    </div>

                    <div class="span6">
                        <div class="credits">
                            <!--
                              All the links in the footer should remain intact.
                              You can delete the links only if you purchased the pro version.
                              Licensing information: https://bootstrapmade.com/license/
                              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Eterna
                            -->
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<a href="#" class="scrollup"><i class="icon-angle-up icon-square icon-bglight icon-2x active"></i></a>

<!-- javascript
  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('template_compro') }}/assets/js/jquery.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/jquery.easing.1.3.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/bootstrap.js"></script>

<script src="{{ asset('template_compro') }}/assets/js/modernizr.custom.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/toucheffects.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/google-code-prettify/prettify.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/jquery.bxslider.min.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/camera/camera.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/camera/setting.js"></script>

<script src="{{ asset('template_compro') }}/assets/js/jquery.prettyPhoto.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/portfolio/jquery.quicksand.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/portfolio/setting.js"></script>

<script src="{{ asset('template_compro') }}/assets/js/jquery.flexslider.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/animate.js"></script>
<script src="{{ asset('template_compro') }}/assets/js/inview.js"></script>

<!-- Template Custom JavaScript File -->
<script src="{{ asset('template_compro') }}/assets/js/custom.js"></script>



</body>

</html>
