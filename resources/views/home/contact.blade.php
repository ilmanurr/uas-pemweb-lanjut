@extends('home.app')

@section('title', 'IENEWS - Contact Us')

@section('content')
<!-- Contact Start -->
<div class="contact">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.3433964295573!2d112.72274718885498!3d-7.315266599999986!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb7081be4f83%3A0xa9c00ebea3e64b3d!2sUniversitas%20Negeri%20Surabaya%20-%20Kampus%201!5e0!3m2!1sid!2sid!4v1718381387812!5m2!1sid!2sid"
                        frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="col-md-6">
                <div class="contact-info">
                    <h3>Get in Touch</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra
                        dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus.
                    </p>
                    <h4><i class="fa fa-map-marker"></i>Surabaya, Jawa Timur, Indonesia</h4>
                    <h4><i class="fa fa-envelope"></i>hotline@ienews.com</h4>
                    <h4><i class="fa fa-phone"></i>+62 123 4324</h4>
                    <div class="social">
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-facebook"></i></a>
                        <a href=""><i class="fab fa-linkedin"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection