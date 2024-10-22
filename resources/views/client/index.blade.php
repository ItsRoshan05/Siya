<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Siyay</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('client/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('client/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('client/vendor/bootstrap/css/bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('client/vendor/bootstrap-icons/bootstrap-icons.css') }}"
        rel="stylesheet">
    <link href="{{ asset('client/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('client/vendor/glightbox/css/glightbox.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('client/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('client/css/main.css') }}" rel="stylesheet">
    <!-- =======================================================
  * Template Name: HeroBiz
  * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img asset('client/img/logo.png')}}" alt=""> -->
                <h1 class="sitename">Yayasan <span class="text-black">Al-Rasyid</span></h1>
                <span>.</span>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#hero" class="active">Home<br></a></li>
                    <li><a href="#featured-services">Services</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#donate">Donation</a></li>

                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <p class="btn-get-started"></p>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
                data-aos="zoom-out">
                <img src="{{ asset('client/img/logo_yayasan-removebg-preview.png') }}"
                    class="img-fluid animated w-50 h-50" alt="Logo Yayasan">

                <h1>Bersama, Membangun Harapan</h1>
                <p>Bergabunglah dengan kami untuk memberikan dukungan kepada mereka yang membutuhkan. Salurkan donasi
                    Anda dan bantu kami menciptakan masa depan yang lebih baik.</p>

                <div class="d-flex">
                    <a href="#about" class="btn-get-started scrollto"><i class="bi bi-heart-fill"></i><span>Donasi
                            Sekarang</span></a>
                    <a href="#donasi" class="btn-donate scrollto d-flex align-items-center">
                </div>
            </div>
        </section>
        <!-- /Hero Section -->



        <!-- Featured Services Section -->
        <section id="featured-services" class="featured-services section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-people icon"></i></div>
                            <h4><a href="" class="stretched-link">Program Bantuan</a></h4>
                            <p>Bergabunglah dalam program bantuan untuk membantu mereka yang membutuhkan di sekitar
                                kita.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-heart icon"></i></div>
                            <h4><a href="" class="stretched-link">
                                    Online</a></h4>
                            <p>Bantu mereka dengan melakukan donasi online yang mudah dan cepat untuk program-program
                                kami.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-journal icon"></i></div>
                            <h4><a href="" class="stretched-link">Laporan Kegiatan</a></h4>
                            <p>Lihat laporan kegiatan kami untuk mengetahui bagaimana kontribusi Anda membantu orang
                                lain.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                        <div class="service-item position-relative">
                            <div class="icon"><i class="bi bi-geo-alt icon"></i></div>
                            <h4><a href="" class="stretched-link">Temukan Lokasi</a></h4>
                            <p>Kunjungi lokasi kami atau hubungi kami untuk bergabung menjadi relawan dalam kegiatan
                                sosial.</p>
                        </div>
                    </div><!-- End Service Item -->
                </div>
            </div>
        </section>
        <!-- /Featured Services Section -->


        <!-- About Section -->
        <!-- About Section -->
        <section id="about" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Tentang Kami</h2>
                <p>Kami adalah yayasan yang berdedikasi untuk membantu masyarakat dengan menyediakan solusi kesehatan
                    yang terjangkau dan efektif melalui pendekatan inovatif.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up">

                <div class="row g-4 g-lg-5" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-5">
                        <div class="about-img">
                            <img src="{{ asset('client/img/logo_yayasan-removebg-preview.png') }}"
                                class="img-fluid" alt="Gambar Tim Kami">
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <h3 class="pt-0 pt-lg-5">Misi Kami untuk Memberikan Dukungan Kesehatan yang Menyeluruh bagi
                            Masyarakat</h3>

                        <!-- Tabs -->
                        <ul class="nav nav-pills mb-3">
                            <li><a class="nav-link active" data-bs-toggle="pill" href="#about-tab1">Fokus Kami</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab2">Nilai Utama</a></li>
                            <li><a class="nav-link" data-bs-toggle="pill" href="#about-tab3">Tim Kami</a></li>
                        </ul><!-- End Tabs -->

                        <!-- Tab Content -->
                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="about-tab1">

                                <p class="fst-italic">Kami berfokus pada penyediaan layanan kesehatan yang terjangkau
                                    dan berkualitas untuk membantu meningkatkan kesejahteraan masyarakat.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Layanan yang Inklusif</h4>
                                </div>
                                <p>Kami berkomitmen untuk melayani semua kalangan masyarakat, tanpa memandang latar
                                    belakang atau kondisi ekonomi.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Solusi Berbasis Data</h4>
                                </div>
                                <p>Kami menggunakan data untuk memberikan layanan yang tepat sasaran sesuai kebutuhan
                                    kesehatan masyarakat.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Kerja Sama dengan Komunitas</h4>
                                </div>
                                <p>Kami bekerja sama dengan komunitas lokal untuk memastikan bahwa layanan kami
                                    benar-benar bermanfaat bagi masyarakat yang membutuhkan.</p>

                            </div><!-- End Tab 1 Content -->

                            <div class="tab-pane fade" id="about-tab2">

                                <p class="fst-italic">Nilai-nilai utama kami mendorong kami untuk terus memberikan yang
                                    terbaik dalam setiap pelayanan kami kepada masyarakat.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Pelayanan Berbasis Kasih</h4>
                                </div>
                                <p>Kami percaya bahwa setiap individu berhak mendapatkan akses ke pelayanan kesehatan
                                    yang penuh kasih dan tanpa diskriminasi.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Transparansi dan Akuntabilitas</h4>
                                </div>
                                <p>Kami menjaga transparansi dalam setiap langkah yang kami lakukan dan akuntabilitas
                                    kepada masyarakat yang kami layani.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Komitmen untuk Inovasi</h4>
                                </div>
                                <p>Kami terus berinovasi untuk meningkatkan layanan kesehatan demi kesejahteraan
                                    bersama.</p>

                            </div><!-- End Tab 2 Content -->

                            <div class="tab-pane fade" id="about-tab3">

                                <p class="fst-italic">Kami adalah tim yang terdiri dari individu-individu yang
                                    berdedikasi untuk menciptakan perubahan positif di masyarakat.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Tim yang Berdedikasi</h4>
                                </div>
                                <p>Tim kami terdiri dari berbagai latar belakang profesional yang bekerja dengan sepenuh
                                    hati untuk mencapai tujuan bersama.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Dukungan Profesional</h4>
                                </div>
                                <p>Kami menyediakan dukungan konsultasi untuk membantu masyarakat memahami layanan yang
                                    kami tawarkan dan bagaimana mereka dapat memanfaatkannya.</p>

                                <div class="d-flex align-items-center mt-4">
                                    <i class="bi bi-check2"></i>
                                    <h4>Integritas dalam Pelayanan</h4>
                                </div>
                                <p>Kami menjalankan setiap pelayanan dengan integritas dan komitmen untuk memberikan
                                    yang terbaik bagi masyarakat.</p>

                            </div><!-- End Tab 3 Content -->

                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Testimonials</h2>
                <p>Apa kata para donatur tentang Yayasan Al-Rasyid</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            }
                        }

                    </script>
                    <div class="swiper-wrapper">

                        @foreach($donations as $donation)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <!-- <img src="{{ asset('storage/' . $donation->payment_proof) }}" class="testimonial-img" alt="Photo of {{ $donation->nama }}"> -->
                                    <h3>{{ $donation->nama }}</h3>
                                    <h4>Donatur</h4>
                                    <div class="donation-amount text-success fw-bold fs-4 my-2">
                    Rp{{ number_format($donation->donation_amount, 0, ',', '.') }}
                </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>{{ $donation->donation_message ?? 'Terima kasih telah berdonasi untuk Yayasan Al-Rasyid!' }}</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div><!-- End swiper-wrapper -->
                    <div class="swiper-pagination"></div>
                </div><!-- End swiper -->
            </div>
        </section><!-- End Testimonials Section -->

        </div>
        <div class="swiper-pagination"></div>
        </div>

        </div>

        </section><!-- /Testimonials Section -->




        <section id="donate" class="donate section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Donasi</h2>
                <p>Bantu kami mencapai lebih banyak orang dengan memberikan donasi. Setiap kontribusi Anda sangat
                    berarti bagi mereka yang membutuhkan.</p>
            </div>

            <div class="container" data-aos="fade-up" data-aos-delay="200">
                <form action="{{ route('donation.store') }}" method="POST" class="donation-form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nama" class="form-label">Nama: </label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="donation-amount" class="form-label">Jumlah Donasi (Rp)</label>
                            <input type="number" class="form-control" id="donation-amount" name="donation_amount"
                                placeholder="Jumlah Donasi" required>
                        </div>
                        <div class="col-md-6">
                            <label for="donation-type" class="form-label">Metode Pembayaran</label>
                            <select class="form-select" id="donation-type" name="donation_type" required>
                                <option value="">Pilih Metode Pembayaran</option>
                                <option value="bank_transfer">Transfer Bank</option>
                                <option value="credit_card">Kartu Kredit</option>
                                <option value="paypal">PayPal</option>
                                <option value="gopay">GoPay</option>
                                <option value="ovo">OVO</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="donation-message" class="form-label">Pesan (Opsional)</label>
                        <textarea class="form-control" id="donation-message" name="donation_message" rows="4"
                            placeholder="Tulis pesan Anda di sini"></textarea>
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="anonymous-donation" name="anonymous">
                        <label class="form-check-label" for="anonymous-donation">Donasi secara anonim</label>
                    </div>

                    <div class="mb-3">
                        <label for="payment-proof" class="form-label">Unggah Bukti Pembayaran</label>
                        <input type="file" class="form-control" id="payment-proof" name="payment_proof"
                            accept="image/*,application/pdf" required>
                        <small class="form-text text-muted">Format yang didukung: JPG, PNG, PDF (maksimal 2 MB)</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Donasi</button>
                </form>
            </div>
        </section>




        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Contact</h2>
                <p>Lakukan Kontak dengan kami</p>
            </div><!-- End Section Title -->

            <div class="mb-5">
                <iframe style="width: 100%; height: 400px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.8927837122724!2d107.76807100985356!3d-6.535222763859302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b8cf379ba01%3A0x182b72b1ac1a20d9!2sJl.%20Palabuan%2C%20Kabupaten%20Subang%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1722955016690!5m2!1sid!2sid"
                    frameborder="0" allowfullscreen=""></iframe>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.8927837122724!2d107.76807100985356!3d-6.535222763859302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e693b8cf379ba01%3A0x182b72b1ac1a20d9!2sJl.%20Palabuan%2C%20Kabupaten%20Subang%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1722955016690!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div><!-- End Google Maps -->

            <div class="container" data-aos="fade">

                <div class="row gy-5 gx-lg-5">

                    <div class="col-lg-4">

                        <div class="info">
                            <h3>Get in touch</h3>
                            <p>Lorem.</p>

                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
                                    <p>palabuan subang</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>yayasan@example.com</p>
                                </div>
                            </div><!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Call:</h4>
                                    <p>+6282119428177</p>
                                </div>
                            </div><!-- End Info Item -->

                        </div>

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required="">
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required="">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required="">
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" placeholder="Message"
                                    required=""></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6 footer-about">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <span class="sitename">Yayasan Al-Rasyid.</span>
                        </a>
                        <div class="footer-contact pt-3">
                            <p>Palabuan</p>
                            <p>Subang, Indonesia</p>
                            <p class="mt-3"><strong>Phone:</strong> <span>+6282119428177</span></p>
                            <p><strong>Email:</strong> <span>yayasan@example.com</span></p>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Hic solutasetp</h4>
                        <ul>

                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 footer-links">
                        <h4>Nobis illum</h4>
                        <ul>

                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="copyright text-center">
            <div
                class="container d-flex flex-column flex-lg-row justify-content-center justify-content-lg-between align-items-center">

                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <div>
                        © Copyright <strong><span>Yayasan Al-Rasyid</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        <!-- All the links in the footer should remain intact. -->
                        <!-- You can delete the links only if you purchased the pro version. -->
                        <!-- Licensing information: https://bootstrapmade.com/license/ -->
                        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/herobiz-bootstrap-business-template/ -->

                    </div>
                </div>

                <div class="social-links order-first order-lg-last mb-3 mb-lg-0">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>

            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('client/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('client/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('client/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('client/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('client/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('client/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('client/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('client/js/main.js') }}"></script>


</body>

</html>
