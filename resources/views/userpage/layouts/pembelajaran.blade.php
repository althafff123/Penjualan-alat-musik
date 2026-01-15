@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Pembelajaran'])

@section('content')
    <section class="food_section layout_padding-bottom">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Pembelajaran
                </h2>
            </div>


            <form class="input-group mx-auto mt-4" style="max-width: 768px" autocomplete="off">
                <input type="search" class="form-control" name="search" placeholder="Cari Pembelajaran ..."
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

            @if (count($pembelajarans))
                <div class="filters-content">
                    <div class="row grid">
                        @foreach ($pembelajarans as $pembelajaran)
                            <div class="col-sm-6 col-lg-4 all kategori-{{ $pembelajaran->kategori->id }}">
                                <div class="box">
                                    <div>
                                        <div class="img-box">
                                            <img src="{{ asset('storage/' . $pembelajaran->pelatih->foto) }}"
                                                alt="">
                                        </div>
                                        <div class="detail-box">
                                            <h5>
                                                {{ $pembelajaran->nama_pembelajaran }}
                                            </h5>
                                            Terpesan : {{ $pembelajaran->terpesan }}
                                            <div class="options row">
                                                <div class="col-lg-12">
                                                    {!! $pembelajaran->deskripsi !!}
                                                </div>
                                                <div class="row mt-1">
                                                    @if ($pembelajaran->diskon > 0)
                                                        <h6 class="fw-bold">
                                                            Rp
                                                            {{ number_format($pembelajaran->tarif - ($pembelajaran->tarif * $pembelajaran->diskon) / 100, 0, ',', '.') }}
                                                            <span class="text-optional text-info">/jam</span>
                                                        </h6>
                                                        <h6 style="text-decoration: line-through; font-size: 0.8rem">
                                                            Rp {{ number_format($pembelajaran->tarif, 0, ',', '.') }}
                                                            <span class="text-optional text-info">/jam</span>
                                                        </h6>
                                                    @else
                                                        <h6>
                                                            Rp {{ number_format($pembelajaran->tarif, 0, ',', '.') }}
                                                            <span class="text-optional text-info">/jam</span>

                                                        </h6>
                                                    @endif
                                                    <a class="ms-auto col-lg-3 text-right"
                                                        href="/pembelajaran/{{ $pembelajaran->id }}">
                                                        <i class="fa-eye fa text-light"></i>
                                                    </a>
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
@endsection
