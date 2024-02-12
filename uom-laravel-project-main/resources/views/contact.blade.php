@extends('layouts.master')

@section('title', 'Welcome')

@section('content')

    <!-- ======= Contact Section ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Contact</h2>
                <ol>
                    <li><a href="{{ route('welcome') }}">Home</a></li>
                    <li>Contact</li>
                </ol>
            </div>

        </div>
    </section><!-- End Contact Section -->

    <!-- ======= Contact Section ======= -->
    <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-6">

                    <div class="row ">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bx bx-map"></i>
                                <h3>Our Address</h3>
                                <p>312/B, Uragasmanhaniya, Galpoththawa</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bx bx-envelope"></i>
                                <h3>Email Us</h3>
                                <p>info@gmail.com<br>arogyahucontact@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bx bx-phone-call"></i>
                                <h3>Call Us</h3>
                                <p>+94 77 568 749<br>+94 77 123 678</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection
