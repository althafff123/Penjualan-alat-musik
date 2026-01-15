@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Produk'])

@section('content')
    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Produk
                </h2>
            </div>

            <form class="input-group mx-auto mt-4" style="max-width: 768px" autocomplete="off">
                <input type="search" class="form-control" name="search" placeholder="Cari Produk ..."
                    value={{ request()->search }}>
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>

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
        </div>
    </section>

    <!-- end food section -->
@endsection
