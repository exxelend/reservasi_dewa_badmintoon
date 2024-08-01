@extends('layouts.user')
@section('content')
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container text-center">
            <h1 class="display-10 text-white mb-3 animated slideInDown">Events</h1>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid animated pulse infinite" src="{{ asset('assets/img/raket.png') }}">
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="text-primary mb-4">Dewa<span class="fw-light text-dark">Badminton Hall</span></h1>
                    <p class="mb-4">Dewa Badmintoon Hall hadir untuk para pecinta badminton! </p>
                    <p class="mb-4">Dewa Badmintoon Hall dengan bangga mengadakan Perlombaan Antar Mahasiswa !</p>
                    <p class="mb-4">Acara ini dirancang khusus untuk para mahasiswa yang ingin menunjukkan bakat dan kemampuan mereka dalam bermain bulutangkis.</p>
                    <p class="mb-4">Perlombaan ini akan berlangsung pada tanggal 20 Agustus 2024, mulai pukul 09.00 WIB. Dengan fasilitas modern dan atmosfer yang kompetitif, ini adalah kesempatan sempurna untuk berkompetisi, belajar, dan menikmati semangat olahraga bersama rekan-rekan mahasiswa lainnya.</p>
                    <p class="mb-4">Kami mengundang seluruh mahasiswa untuk berpartisipasi dalam acara ini. Ayo, tunjukkan skill bulutangkismu dan raih gelar juara !!</p>
                    <p class="mb-4">Pantau terus Instagram kami pada header bagian bawah :)</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-map-marker-alt fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Address</h5>
                            <h5 class="fw-light text-white">Jl. Perdagangan, Banjarmasin</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeIn" data-wow-delay="0.3s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fa fa-phone-alt fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Call Us</h5>
                            <h5 class="fw-light text-white">
                                <a href="https://wa.me/6287842140196" class="text-white" target="_blank">+62878 4214 0196</a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                    <div class="contact-info-item position-relative bg-primary text-center p-3">
                        <div class="border py-5 px-3">
                            <i class="fab fa-instagram fa-3x text-dark mb-4"></i>
                            <h5 class="text-white">Instagram</h5>
                            <h5 class="fw-light text-white">
                                <a href="https://www.instagram.com/dewabadminton?igsh=MWh4b2NjNDRiN3Fiag==" class="text-white" target="_blank">@dewabadmintoon</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s">
                <h1 class="text-primary mb-5"><span class="fw-light text-dark">Temukan </span>Kami</h1>
            </div>
            <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                <iframe class="w-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.2656882108954!2d114.5814315!3d-3.2841910999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de423b748c1aa05%3A0x8791f1b6ddaa722f!2sDEWA%20GYM!5e0!3m2!1sid!2sid!4v1718478234256!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    frameborder="0" style="min-height: 500px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
@endsection
