@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Detail Barang'])
@section('style')
    <style>
        .rating {
            margin-top: 40px;
            border: none;
            float: left;
        }

        .rating>label {
            color: #90A0A3;
            float: right;
        }


        .rating>input {
            display: none;
        }

        .rating>input:checked~label,
        .rating:not(:checked)>label:hover,
        .rating:not(:checked)>label:hover~label {
            color: #F79426;
        }

        .rating>input:checked+label:hover,
        .rating>input:checked~label:hover,
        .rating>label:hover input:checked label,
        .rating>input:checked label:hover label {
            color: #FECE31;
        }

        .star-rating {
            direction: rtl;
            display: inline-block;
            padding: 20px;
            cursor: default;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            color: #bbb;
            font-size: 2rem;
            padding: 0;
            cursor: pointer;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input[type="radio"]:checked~label {
            color: #f2b600;
        }
    </style>
@endsection
@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container">

            </div>

            <div class="body">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/' . $barang->foto) }}" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h1 style="font-size: 60px">{{ $barang->nama_barang }}</h1>
                        <div class="d-flex" style="gap: 2rem">
                            @if ($barang->diskon > 0)
                                <div style="font-size: 20px; font-weight: 700">
                                    Rp
                                    {{ number_format($barang->harga - ($barang->harga * $barang->diskon) / 100, 0, ',', '.') }}
                                </div>
                                <h6 style="text-decoration: line-through; font-size: 0.8rem">
                                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                </h6>
                            @else
                                <h6>
                                    Rp {{ number_format($barang->harga, 0, ',', '.') }}
                                </h6>
                            @endif
                            <span>|</span>
                            <div>Stok : {{ $barang->stock }}</div>
                            <span>|</span>
                            <div>Terjual : {{ $barang->terjual }} </div>
                        </div>
                        <p>
                            {!! $barang->deskripsi !!}
                        </p>
                        @if ($barang->stock > 0)
                            <div class="user_option w-100 d-flex justify-content-center mt-4">
                                <form action="/keranjang/{{ $barang->id }}" method="POST">
                                    <button type="submit" class="order_online">
                                        @csrf
                                        <i class="fa fa-shopping-cart"></i>
                                        Masukan Ke keranjang
                                    </button>
                                </form>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="star-rating">
                        <input id="star-5" type="radio" checked name="rating" value="5" />
                        <label>
                            <i class="active fa fa-star" aria-hidden="true"> {{ $total_rating }}</i>
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <h1>Review Barang</h1>

            @foreach ($ratings as $rating)
                <div class="row align-items-center mb-3">
                    <div class="col-md-6 mt-4">
                        <div class="d-flex">
                            <img class="card-img-top rounded-circle"
                                src="{{ isset($rating->user->foto) ? asset('storage/' . $rating->user->foto) : asset('assets/media/avatars/blank.png') }}"
                                alt="avatar" style="aspect-ratio: 1/1; object-fit: cover; width: 120px; height:120px">
                            <div class="ml-3 mt-4">
                                <h3>{{ $rating->user->name }}</h3>
                                <h6>{{ $rating->user->email }}</h6>
                                <div class="p-0 star-rating" style="margin-top: -18px;">
                                    @for ($i = 0; $i < $rating->rating; $i++)
                                        <label for="star-5">
                                            <i class="active fa fa-star" aria-hidden="true"
                                                style="font-size: 1rem; color: #f2b600"></i>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if ($rating->foto)
                            <img src="{{ asset('storage/' . $rating->foto) }}" class="img-fluid" width="75px">
                        @endif
                        <h6 class="mt-2"> {!! $rating->komentar !!}</h6>
                        @if ($rating->balasan_admin)
                            <hr>
                            <p>
                            <h3>Balasan Admin</h3>
                            </p>
                            <p>
                                {!! $rating->balasan_admin !!}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
