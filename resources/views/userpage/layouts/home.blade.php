@extends('userpage.layouts.main', ['title' => 'Home'])

@section('slider')
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Website berkualitas
                                    </h1>
                                    <p>
                                        Rock N' Roll Store, website penjualan alat musik yang berkualitas dan cocok bagi
                                        anda untuk pecinta musik dan ingin belajar alat musik</p>
                                    <div class="btn-box">
                                        <a href="/produk" class="btn1">
                                            Pesan Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Fitur Pembelajaran Yang Memuaskan
                                    </h1>
                                    <p>
                                        Ingin belajar alat musik dengan cepat dan nyaman , dan tidak ada waktu untuk keluar
                                        rumah? Segera gunakan fitur pembelajaran
                                        sekarang dan pelatih akan mendatangi daftar alamat anda di jamin harga terjangkau
                                    </p>
                                    <div class="btn-box">
                                        <a href="/produk" class="btn1">
                                            Pesan Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box">
                                    <h1>
                                        Barang dan Pelatih Terbaik
                                    </h1>
                                    <p>
                                        Kami menyediakan barang dan pelatih terbaik dari seluruh dunia tetapi, harga masih
                                        terjangkau dan aman di kantong
                                    </p>
                                    <div class="btn-box">
                                        <a href="/produk" class="btn1">
                                            Pesan Sekarang
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <ol class="carousel-indicators">
                    <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                    <li data-target="#customCarousel1" data-slide-to="1"></li>
                    <li data-target="#customCarousel1" data-slide-to="2"></li>
                </ol>
            </div>
        </div>

    </section>
    <!-- end slider section -->
@endsection

@section('content')
    <!-- offer section -->

    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container ">
                <div class="row">
                    @foreach ($barangs_diskon as $barang)
                        <div class="col-md-6">
                            <div class="box ">
                                <div class="img-box">
                                    <img src="{{ asset('storage/' . $barang->foto) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $barang->nama_barang }}
                                    </h5>
                                    <h6>
                                        <span>{{ $barang->diskon }}%</span> Off
                                        <div>
                                            Rp.
                                            {{ number_format($barang->harga - ($barang->harga * $barang->diskon) / 100, 0, ',', '.') }}
                                        </div>
                                    </h6>
                                    <form action="/keranjang/{{ $barang->id }}" method="post">
                                        @csrf
                                        <button type="submit">
                                            Pesan Sekarang
                                            <i class=" fa-shopping-cart fa text-light"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end offer section -->

    <!-- food section -->
    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Produk
                </h2>
            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">All</li>
                @foreach ($kategoris as $kategori)
                    <li data-filter=".kategori-{{ $kategori->id }}">{{ $kategori->nama_kategori }}</li>
                @endforeach
            </ul>

            @if (count($barangs))
                <div class="filters-content">
                    <div class="row grid">
                        @foreach ($barangs as $barang)
                            <div class="col-sm-6 col-lg-4 all kategori-{{ $barang->kategori->id }}">
                                <div class="box">
                                    <div>
                                        <div class="img-box">
                                            <img src="{{ asset('storage/' . $barang->foto) }}" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h5
                                                style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">
                                                {{ $barang->nama_barang }}
                                            </h5>
                                            <h6>
                                                Stock : {{ $barang->stock }}
                                            </h6>
                                            <h6>
                                                Terjual : {{ $barang->terjual }}
                                            </h6>
                                            <div class="options">
                                                @if ($barang->diskon > 0)
                                                    <h6 class="fw-bold" style="font-size: 1.25rem">
                                                        Rp
                                                        {{ number_format($barang->harga - ($barang->harga * $barang->diskon) / 100, 0, ',', '.') }}
                                                    </h6>
                                                    <h6 style="text-decoration: line-through; font-size: 0.8rem">
                                                        Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                                    </h6>
                                                @else
                                                    <h6>
                                                        Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                                    </h6>
                                                @endif
                                                <div class="d-flex">
                                                    <a class="ms-auto mr-1" href="/barang/{{ $barang->id }}">
                                                        <i class="fa-eye fa text-light"></i>
                                                    </a>
                                                    <form action="/keranjang/{{ $barang->id }}" method="post">
                                                        @csrf
                                                        @if ($barang->stock > 0)
                                                            <button type="submit">
                                                                <i class=" fa-shopping-cart fa text-light"></i>
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="filters-content">
                    <h1 class="text-center">Tidak ada produk</h1>
                </div>
            @endif
            <div class="btn-box">
                <a href="/produk">
                    Lebih Banyak
                </a>
            </div>
        </div>
    </section>

    <!-- end food section -->

    <!-- about section -->


    <!-- end about section -->

    <!-- book section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Lokasi Toko
                </h2>
            </div>
            <div class="col-md-12">
                <div class="map_container ">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="1200" height="500" id="gmap_canvas"
                                src="https://maps.google.com/maps?q=Bibis%20Tama%20Ia%20no%2022&t=&z=13&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                                href="https://www.whatismyip-address.com/divi-discount/">divi discount</a><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 500px;
                                    width: 1200px;
                                }
                            </style><a href="https://www.embedgooglemap.net">embed custom google map</a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 500px;
                                    width: 1200px;
                                }
                            </style>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- end book section -->

    <!-- client section -->

    <section class="client_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center psudo_white_primary mb_45">
                <h2>
                    Komentar Tentang Website Kami </h2>
            </div>
            @if (count($komentars))
                <div class="carousel-wrap row ">
                    <div class="owl-carousel client_owl-carousel">
                        @foreach ($komentars as $komentar)
                            <div class="item">
                                <div class="box">
                                    <div class="detail-box">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <p>
                                                    <img class="card-img-top rounded-circle"
                                                        src={{ isset($komentar->user->foto) ? asset('storage/' . $komentar->user->foto) : asset('assets/media/avatars/blank.png') }}
                                                        style="width: 80px; height: 80px">
                                                </p>
                                            </div>
                                            <div class="col-md-10">
                                                <p>
                                                    {{ $komentar->komentar }}
                                                </p>
                                                <h6>
                                                    {{ $komentar->user->name }}
                                                </h6>
                                                <p>
                                                    {{ $komentar->user->email }}
                                                </p>
                                            </div>
                                        </div>
                                        <hr>
                                        @if (isset($komentar->balasan_admin))
                                            <p>
                                            <h6>Balasan Admin</h6>
                                            </p>
                                            <p>
                                                {!! $komentar->balasan_admin !!}
                                            </p>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div>
                    <h3 class="text-center">Tidak Ada Komentar</h3>
                </div>
            @endif
            @auth
                <div class="btn-box d-flex justify-content-center w-100 mt-5">
                    <a class="btn btn-primary text-white" data-toggle="modal" data-target="#Komentar">
                        {{ isset(\App\Models\Komentar::where('user_id', auth()->user()->id)->first()->id) ? 'Ubah' : 'Berikan' }}
                        Komentar
                    </a>
                    @if (isset(\App\Models\Komentar::where('user_id', auth()->user()->id)->first()->id))
                        <form
                            action="userpage/layouts/komentar/komentar-web/{{ @\App\Models\Komentar::where('user_id', auth()->user()->id)->first()->id }}"
                            method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger ml-3 text-white hapus" type="button" title="hapus">
                                Hapus Komentar
                            </button>
                        </form>
                    @endif

                    <div class="modal fade" id="Komentar" tabindex="-1" role="dialog" aria-labelledby="KomentarLabel"
                        aria-hidden="true">
                        <form action="/userpage/layouts/komentar/komentar-web" method="POST" class="modal-dialog"
                            role="document">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="KomentarLabel">
                                        {{ isset(\App\Models\Komentar::where('user_id', auth()->user()->id)->first()->id) ? 'Ubah' : 'Berikan' }}
                                        Komentar</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <textarea name="komentar" id="" class="w-100" rows="5">{{ @\App\Models\Komentar::where('user_id', auth()->user()->id)->first()->komentar }}</textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            @endauth
    </section>
@endsection
@section('script')
    <script>
        $('.hapus').on('click', function() {
            var id = $(this).data('id')
            Swal.fire({
                title: 'Apakah Anda yakin ingin Menghapus?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        url: "userpage/layouts/komentar/komentar-web/{{ @\App\Models\Komentar::where('user_id', auth()->user()->id)->first()->id }}",
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "DELETE"
                        },
                        error: function() {
                            Swal.showValidationMessage('Gagal Menghapus')
                            window.location.reload()
                        }
                    });
                }
            }).then(result => {
                if (result.isConfirmed) {
                    Swal.fire('Berhasil Menghapus', '', 'success')
                    window.location.reload()
                }
            })
        });
    </script>
@endsection
