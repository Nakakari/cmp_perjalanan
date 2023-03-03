<!DOCTYPE html>
<html lang="en">

@include('Compro.v_head')

<body>

<div id="wrapper">
    <!-- start header -->
    <header>
        @include('Compro.v_top')
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
                                        <a href="/company_profile#aboutus">Tentang Kami </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="/company_profile#contactus">Hubungi Kami </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="/tracking_resi">Cek Resi </a>
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

@yield('konten')

    <footer>
        <div class="container">
            <div class="row">
                <div class="span6">
                    <div class="widget">
                        <h5 class="widgetheading">Pencarian Halaman</h5>
                        <ul class="link-list">
                            <li><a href="/company_profile">Beranda</a></li>
                            <li><a href="/company_profile#aboutus">Tentang Kami</a></li>
                            <li><a href="/company_profile#contactus">Hubungi Kami</a></li>
                            <li><a href="/tracking_resi">Cek Resi</a></li>
                        </ul>

                    </div>
                </div>
                <div class="span6">
                    <div class="widget">
                        <h5 class="widgetheading">Hubungi Kami</h5>
                        <address>
                            <strong>PT Catur Mandiri Pertama</strong><br>
                            <strong>Pusat (Jakarta)</strong><br>
                            Komplek Pergudangan KA, Jl. Kp. Bandan, RT.2/RW.4, Ancol, Kec. Pademangan, Jakarta Utara, DKI Jakarta, 14430<br>
                        </address>
                        <p>
                            <i class="icon-phone"></i> (021) 691 44 27<br>
                            <a href="https://wa.me/628118999956" target="_blank">
                                <i class="icon-phone"></i>
                                0811 8999 956
                            </a>
                        </p>
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
@include('Compro.v_script')


</body>

</html>
