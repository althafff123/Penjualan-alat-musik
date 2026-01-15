<!-- footer section -->
<footer class="footer_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 footer-col">
                @if (isset($settings->no_whatsapp) && isset($settings->email))
                    <div class="footer_contact">
                        <h4>
                            Hubungi Kami
                        </h4>
                        <div class="contact_link_box">
                            <a href="https://wa.me/+62{{ @$settings->no_whatsapp }}">
                                <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                <span>
                                    {{ $settings->no_whatsapp }}
                                </span>
                            </a>
                            <a href="mailto:{{ @$settings->email }}">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    {{ $settings->email }}
                                </span>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-4 footer-col">
                <div class="footer_detail ">
                    <img src="{{ asset('storage/' . $settings->logo_footer) }}" width="300px" alt="">
                    <p>
                        Takut dapat barang palsu? Jangan khawatir, di sini kamu akan mendapatkan 99,9% barang
                        asli, jangan ragu beli produk kami, sudah pasti berkualitas tinggi dan tidak mengecewakan
                    </p>
                    <div class="footer_social">
                        @if (isset($settings->facebook))
                            <a href="{{ $settings->facebook }}">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        @endif
                        @if (isset($settings->instagram))
                            <a href="{{ $settings->instagram }}">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        @endif
                        @if (isset($settings->youtube))
                            <a href="{{ $settings->youtube }}">
                                <i class="fa fa-youtube" aria-hidden="true"></i>
                            </a>
                        @endif
                        @if (isset($settings->twitter))
                            <a href="{{ $settings->twitter }}">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 footer-col">
                <h4>
                    Jam Buka toko
                </h4>
                <p>
                    Setiap Hari
                </p>
                <p>
                    08.00 Am - 01.00 Am
                </p>
            </div>
        </div>
        <div class="footer-info">
            <p>
                &copy; Copyright <span id="displayYear"></span>
                <br><br>
                &copy; <span id="displayYear"></span> Created By
                <a> Althaf satria </a>
            </p>
        </div>
    </div>
</footer>
<!-- footer section -->

<!-- jQery -->
<script src="{{ asset('assets2/js/jquery-3.4.1.min.js') }}"></script>
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>

<!-- popper js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<!-- bootstrap js -->
<script src="{{ asset('assets2/js/bootstrap.js') }}"></script>
<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- isotope js -->
<script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<!-- custom js -->
<script src="{{ asset('assets2/js/custom.js') }}"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<!-- End Google Map -->
