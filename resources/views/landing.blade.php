<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ZGraphic</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="{{secure_asset("user/assets/img/favicon.png")}}" rel="icon">
    <link href="{{secure_asset("user/assets/img/apple-touch-icon.png")}}" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{secure_asset("user/assets/vendor/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <link href="{{secure_asset("user/assets/vendor/icofont/icofont.min.css")}}" rel="stylesheet">
    <link href="{{secure_asset("user/assets/vendor/remixicon/remixicon.css")}}" rel="stylesheet">
    <link href="{{secure_asset("user/assets/vendor/owl.carousel/assets/owl.carousel.min.css")}}" rel="stylesheet">
    <link href="{{secure_asset("user/assets/vendor/boxicons/css/boxicons.min.css")}}" rel="stylesheet">
    <link href="{{secure_asset("user/assets/vendor/venobox/venobox.css")}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{secure_asset("user/assets/css/style.css")}}" rel="stylesheet">
    <!-- =======================================================
    * Template Name: Personal - v2.3.0
    * Template URL: https://bootstrapmade.com/personal-free-resume-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header-tops">
    <div class="container">

    <h1><a href="#">ZGraphic</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    {{-- <a href="index.html" class="mr-auto"><img src="{{asset('user/assets/img/logo.png')}}" alt="" class="img-fluid"></a> --}}
    <h2>We are passionate <span>graphic designer</span> from Purwokerto</h2>

    <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li class="active"><a href="#header">Home</a></li>
        <li><a href="#about">About</a></li>
        {{-- <li><a href="#services">Services</a></li> --}}
        <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#contact">Contact</a></li>
        </ul>
    </nav><!-- .nav-menu -->

    <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="google-plus"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
    </div>

    </div>
</header><!-- End Header -->

<!-- ======= About Section ======= -->
<section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

    <div class="section-title">
        <h2>About</h2>
        {{-- <p>Learn more about ZGraphic</p> --}}
    </div>

    <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
        <img src="{{asset('user/assets/img/me.jpg')}}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
        <h3>UI/UX &amp; Graphic Designer</h3>
        <p class="font-italic">
            Berikut adalah detail dari ZGraphic
        </p>
        <div class="row">
            <div class="col-lg-6">
            <ul>
                <li><i class="icofont-rounded-right"></i> <strong>Birthday:</strong> 1 May 1995</li>
                <li><i class="icofont-rounded-right"></i> <strong>Website:</strong> www.example.com</li>
                <li><i class="icofont-rounded-right"></i> <strong>Phone:</strong> +123 456 7890</li>
                <li><i class="icofont-rounded-right"></i> <strong>City:</strong> City : New York, USA</li>
            </ul>
            </div>
            {{-- <div class="col-lg-6">
            <ul>
                <li><i class="icofont-rounded-right"></i> <strong>Age:</strong> 30</li>
                <li><i class="icofont-rounded-right"></i> <strong>Degree:</strong> Master</li>
                <li><i class="icofont-rounded-right"></i> <strong>PhEmailone:</strong> email@example.com</li>
                <li><i class="icofont-rounded-right"></i> <strong>Freelance:</strong> Available</li>
            </ul>
            </div> --}}
        </div>
        <p>
            Demikian. terima kasih !
            <br><br>
        </p>
        </div>
    </div>

    </div><!-- End About Me -->

    <!-- ======= Counts ======= -->
    <div class="counts container">

    <div class="row">

        <div class="col-lg-4 col-md-6">
        <div class="count-box">
            <?php
                $customer = DB::table('customers');
            ?>
            <i class="icofont-simple-smile"></i>
            <span data-toggle="counter-up">{{$customer->count()}}</span>
            <p>Happy Clients</p>
        </div>
        </div>

        <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
        <div class="count-box">
            <i class="icofont-document-folder"></i>
            <span data-toggle="counter-up">521</span>
            <p>Projects</p>
        </div>
        </div>

        <div class="col-lg-4 col-md-6 mt-5 mt-lg-0">
        <div class="count-box">
            @php
                $user = DB::table('users')->count();
            @endphp
            <i class="icofont-users-alt-5"></i>
            <span data-toggle="counter-up">{{$user}}</span>
            <p>Hard Workers</p>
        </div>
        </div>

    </div>

    </div><!-- End Counts -->
</section><!-- End About Section -->

<!-- ======= Services Section ======= -->
{{-- <section id="services" class="services">
    <div class="container">

    <div class="section-title">
        <h2>Services</h2>
        <p>Our Services</p>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
        <div class="icon-box">
            <div class="icon"><i class="bx bxl-dribbble"></i></div>
            <h4><a href="">Lorem Ipsum</a></h4>
            <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
        </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
        <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="">Sed ut perspiciatis</a></h4>
            <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
        </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
        <div class="icon-box">
            <div class="icon"><i class="bx bx-tachometer"></i></div>
            <h4><a href="">Magni Dolores</a></h4>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
        </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
        <div class="icon-box">
            <div class="icon"><i class="bx bx-world"></i></div>
            <h4><a href="">Nemo Enim</a></h4>
            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
        </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
        <div class="icon-box">
            <div class="icon"><i class="bx bx-slideshow"></i></div>
            <h4><a href="">Dele cardo</a></h4>
            <p>Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
        </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
        <div class="icon-box">
            <div class="icon"><i class="bx bx-arch"></i></div>
            <h4><a href="">Divera don</a></h4>
            <p>Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
        </div>
        </div>

    </div>

    </div>
</section><!-- End Services Section --> --}}

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

    <div class="section-title">
        <h2>Portfolio</h2>
        <p>Our Works</p>
    </div>

    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
        <?php
            $category = \DB::select("SELECT * from categories");
        ?>
        <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            @foreach ($category as $item)
            <li data-filter=".filter-{{$item->id}}">{{$item->name}}</li>
            @endforeach
        </ul>
        </div>
    </div>

    <div class="row portfolio-container">
        <?php
            $produk = \DB::select("SELECT * from produks");
            // $produk = App\Produk::all();
        ?>
        @foreach ($produk as $data)
        <div class="col-lg-4 col-md-6 portfolio-item filter-{{$data->category_id}}">
            <div class="portfolio-wrap">
                <img src="{{ asset('storage/produk1/'.$data->produk_1) }}" class="img-fluid" alt="">
                <div class="portfolio-info">
                <h4>{{$data->name}}</h4>
                <div class="portfolio-links">
                    <a href="{{ asset('storage/produk1/'.$data->produk_1) }}" data-gall="portfolioGallery" class="venobox" title="{{$data->name}}"><i class="bx bx-plus"></i></a>
                    <a href="portfolio-details.html" data-gall="portfolioDetailsGallery" data-vbtype="iframe" class="venobox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>
</section><!-- End Portfolio Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

    <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
    </div>

    <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
        <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>My Address</h3>
            <p>A108 Adam Street, New York, NY 535022</p>
        </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
        <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <div class="social-links">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="google-plus"><i class="icofont-skype"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
            </div>
        </div>
        </div>

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
        <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p>contact@example.com</p>
        </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
        <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            <p>+1 5589 55488 55</p>
        </div>
        </div>
    </div>

    <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
        <div class="form-row">
        <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
            <div class="validate"></div>
        </div>
        <div class="col-md-6 form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
            <div class="validate"></div>
        </div>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
        <div class="validate"></div>
        </div>
        <div class="form-group">
        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
        <div class="validate"></div>
        </div>
        <div class="mb-3">
        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
    </form>

    </div>
</section><!-- End Contact Section -->

<div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/personal-free-resume-bootstrap-template/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
</div>

<!-- Vendor JS Files -->
<script src="{{secure_asset('user/assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{secure_asset('user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{secure_asset('user/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{secure_asset('user/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{secure_asset('user/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{secure_asset('user/assets/vendor/counterup/counterup.min.js')}}"></script>
<script src="{{secure_asset('user/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{secure_asset('user/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{secure_asset('user/assets/vendor/venobox/venobox.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{secure_asset('user/assets/js/main.js')}}"></script>

</body>

</html>