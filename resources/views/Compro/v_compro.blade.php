@extends('Compro.v_main')

@section('konten')
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
                            <h2 class="animated fadeInDown"><strong>Hubungi <span class="colored">kami</span></strong></h2>
                            <p class="animated fadeInUp"> Kirim barang Anda ke mana saja di Indonesia dengan cepat dan aman bersama kami! Dapatkan harga terjangkau dan layanan pelacakan online untuk memantau pengiriman barang Anda. Hubungi kami sekarang untuk pengiriman barang yang lebih mudah dan efisien!</p>
                            <a href="#contactus" class="btn btn-success btn-large animated fadeInUp">
                                <i class="icon-phone"></i> Hubungi Kami
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


        <div class="row" id="aboutus" style="padding: 20px 0 0 0;">
            <h4>Tentang Kami</h4>
            <div class="span12" style="display: flex;">
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
                            Jl. Peres No.177A, Kelurahan Kuningan, Kecamatan Semarang Utara, Kota Semarang, Jawa Tengah, 50176
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
        </div>

        <div class="row" id="contactus" style="padding: 20px 0 0 0;">
            <h4>Hubungi Kami</h4>

            <div class="span12">

                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#topone" data-toggle="tab"> DKI Jakarta</a></li>
                        <li><a href="#toptwo" data-toggle="tab">Kota Cirebon</a></li>
                        <li><a href="#topthree" data-toggle="tab">Kota Semarang</a></li>
                        <li><a href="#topfour" data-toggle="tab">Kota Surabaya</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="topone">
                            <p>
                                <strong>Lokasi:</strong> Komplek Pergudangan KA, Jl. Kp. Bandan, RT.2/RW.4, Ancol, Kec. Pademangan, Jakarta Utara, DKI Jakarta, 14430
                            </p>
                            <p>
                                <strong>Telepon:</strong> (021) 691 44 27
                            </p>
                            <p>
                                <strong>WhatsApp:</strong>
                                <a href="https://wa.me/628118999956" class="btn btn-success btn-small" target="_blank">
                                    <i class="icon-phone"></i>
                                    0811 8999 956
                                </a>
                            </p>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10525.768703179945!2d106.80751839751314!3d-6.131845871412665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6a1dfe695cdec7%3A0x3a20a25aab9bdd2e!2sPT.%20Catur%20Mandiri%20Pertama%20(CMP)!5e0!3m2!1sen!2sid!4v1677854390506!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="tab-pane" id="toptwo">
                            <p>
                                <strong>Lokasi:</strong> Jl. Nyi Mas Gandasari Stasiun Parujakan No.81, Pekalangan, Kec. Pekalipan, Kota Cirebon, Jawa Barat, 45118
                            </p>
                            <p>
                                <strong>Telepon:</strong> (0231) 244 601
                            </p>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28849.359744865415!2d108.55446098497289!3d-6.718602534097974!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6ee27a41bfe1ff%3A0xf9c2c4857f9a6538!2sPT.%20Catur%20Mandiri%20Pertama!5e0!3m2!1sen!2sid!4v1677855805269!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            {{--                                <p>--}}
                            {{--                                    <strong>WhatsApp:</strong>--}}
                            {{--                                    <a href="https://wa.me/6287874967856">--}}
                            {{--                                        0878 7496 7856--}}
                            {{--                                    </a>--}}
                            {{--                                </p>--}}
                        </div>
                        <div class="tab-pane" id="topthree">
                            <p>
                                <strong>Lokasi:</strong> Jl. Peres No.177A, Kelurahan Kuningan, Kecamatan Semarang Utara, Kota Semarang, Jawa Tengah, 50176
                            </p>
                            <p>
                                <strong>Telepon:</strong> (024) 356 0657
                            </p>
                            <p>
                                <strong>WhatsApp:</strong>
                                <a href="https://wa.me/6285786821994" class="btn btn-success btn-small" target="_blank">
                                    <i class="icon-phone"></i>
                                    0857 8682 1994
                                </a>
                            </p>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8883.41570822821!2d110.40730951904725!3d-6.9673541771561265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70f4b06bbbc2a3%3A0xd2cc7bd187db20d7!2sPT%20CATUR%20MANDIRI%20PERTAMA!5e0!3m2!1sen!2sid!4v1677855923011!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="tab-pane" id="topfour">
                            <p>
                                <strong>Lokasi:</strong> Pintu C Pergudangan Kereta Api Logistic, Jl. Cepu No.1, Gundih, Kec. Bubutan, Kota Surabaya, Jawa Timur, 60172
                            </p>
                            <p>
                                <strong>Telepon:</strong> 0815 5587 7919
                            </p>
                            <p>
                                <strong>WhatsApp:</strong>
                                <a href="https://wa.me/6281555877919" class="btn btn-success btn-small" target="_blank">
                                    <i class="icon-phone"></i>
                                    0815 5587 7919
                                </a>
                            </p>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4069.220092699682!2d112.72830879919415!3d-7.247626848827117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9477c318fd9%3A0x2b41afcbffa02694!2sPT.%20Catur%20Mandiri%20Pertama!5e0!3m2!1sen!2sid!4v1677855981470!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <!-- end tab -->
            </div>
        </div>

        {{--            <div class="row">--}}
        {{--                <div class="span12 aligncenter">--}}
        {{--                    <h3 class="title">What people <strong>saying</strong> about us</h3>--}}
        {{--                    <div class="blankline30"></div>--}}

        {{--                    <ul class="bxslider">--}}
        {{--                        <li>--}}
        {{--                            <blockquote>--}}
        {{--                                Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis--}}
        {{--                                feugiat--}}
        {{--                            </blockquote>--}}
        {{--                            <div class="testimonial-autor">--}}
        {{--                                <img src="{{ asset('template_compro') }}/assets/img/dummies/testimonial/1.png" alt="" />--}}
        {{--                                <h4>Hillary Doe</h4>--}}
        {{--                                <a href="#">www.companyname.com</a>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                        <li>--}}
        {{--                            <blockquote>--}}
        {{--                                Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis--}}
        {{--                                feugiat--}}
        {{--                            </blockquote>--}}
        {{--                            <div class="testimonial-autor">--}}
        {{--                                <img src="{{ asset('template_compro') }}/assets/img/dummies/testimonial/2.png" alt="" />--}}
        {{--                                <h4>Michael Doe</h4>--}}
        {{--                                <a href="#">www.companyname.com</a>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                        <li>--}}
        {{--                            <blockquote>--}}
        {{--                                Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis--}}
        {{--                                feugiat--}}
        {{--                            </blockquote>--}}
        {{--                            <div class="testimonial-autor">--}}
        {{--                                <img src="{{ asset('template_compro') }}/assets/img/dummies/testimonial/3.png" alt="" />--}}
        {{--                                <h4>Mark Donovan</h4>--}}
        {{--                                <a href="#">www.companyname.com</a>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                        <li>--}}
        {{--                            <blockquote>--}}
        {{--                                Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis feugiat.Suspendisse eu erat quam. Vivamus porttitor eros quis nisi lacinia sed interdum lorem vulputate. Aliquam a orci quis nisi sagittis sagittis. Etiam adipiscing, justo quis--}}
        {{--                                feugiat--}}
        {{--                            </blockquote>--}}
        {{--                            <div class="testimonial-autor">--}}
        {{--                                <img src="{{ asset('template_compro') }}/assets/img/dummies/testimonial/4.png" alt="" />--}}
        {{--                                <h4>Marry Doe Elliot</h4>--}}
        {{--                                <a href="#">www.companyname.com</a>--}}
        {{--                            </div>--}}
        {{--                        </li>--}}
        {{--                    </ul>--}}

        {{--                </div>--}}
        {{--            </div>--}}

    </div>
</section>


{{--    <section id="works">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="span12">--}}
{{--                    <h4 class="title">Recent <strong>Works</strong></h4>--}}
{{--                    <div class="row">--}}

{{--                        <div class="grid cs-style-4">--}}
{{--                            <div class="span3">--}}
{{--                                <div class="item">--}}
{{--                                    <figure>--}}
{{--                                        <div><img src="{{ asset('template_compro') }}/assets/img/dummies/works/1.jpg" alt="" /></div>--}}
{{--                                        <figcaption>--}}
{{--                                            <div>--}}
{{--                          <span>--}}
{{--								<a href="{{ asset('template_compro') }}/assets/img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>--}}
{{--								</span>--}}
{{--                                                <span>--}}
{{--								<a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>--}}
{{--								</span>--}}
{{--                                            </div>--}}
{{--                                        </figcaption>--}}
{{--                                    </figure>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="span3">--}}
{{--                                <div class="item">--}}
{{--                                    <figure>--}}
{{--                                        <div><img src="{{ asset('template_compro') }}/assets/img/dummies/works/2.jpg" alt="" /></div>--}}
{{--                                        <figcaption>--}}
{{--                                            <div>--}}
{{--                          <span>--}}
{{--								<a href="{{ asset('template_compro') }}/assets/img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>--}}
{{--								</span>--}}
{{--                                                <span>--}}
{{--								<a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>--}}
{{--								</span>--}}
{{--                                            </div>--}}
{{--                                        </figcaption>--}}
{{--                                    </figure>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="span3">--}}
{{--                                <div class="item">--}}
{{--                                    <figure>--}}
{{--                                        <div><img src="{{ asset('template_compro') }}/assets/img/dummies/works/3.jpg" alt="" /></div>--}}
{{--                                        <figcaption>--}}
{{--                                            <div>--}}
{{--                          <span>--}}
{{--								<a href="{{ asset('template_compro') }}/assets/img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>--}}
{{--								</span>--}}
{{--                                                <span>--}}
{{--								<a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>--}}
{{--								</span>--}}
{{--                                            </div>--}}
{{--                                        </figcaption>--}}
{{--                                    </figure>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="span3">--}}
{{--                                <div class="item">--}}
{{--                                    <figure>--}}
{{--                                        <div><img src="{{ asset('template_compro') }}/assets/img/dummies/works/4.jpg" alt="" /></div>--}}
{{--                                        <figcaption>--}}
{{--                                            <div>--}}
{{--                          <span>--}}
{{--								<a href="{{ asset('template_compro') }}/assets/img/dummies/works/big.png" data-pretty="prettyPhoto[gallery1]" title="Portfolio caption here"><i class="icon-plus icon-circled icon-bglight icon-2x"></i></a>--}}
{{--								</span>--}}
{{--                                                <span>--}}
{{--								<a href="#"><i class="icon-file icon-circled icon-bglight icon-2x"></i></a>--}}
{{--								</span>--}}
{{--                                            </div>--}}
{{--                                        </figcaption>--}}
{{--                                    </figure>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
@endsection

