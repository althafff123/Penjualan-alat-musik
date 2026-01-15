@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Detail Pembelajaran'])
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
                        <img src="{{ asset('storage/' . $pembelajaran->pelatih->foto) }}" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h1 style="font-size: 60px">{{ $pembelajaran->pelatih->nama_pelatih }}</h1>
                        <div class="d-flex" style="gap: 2rem">
                            @if ($pembelajaran->diskon > 0)
                                <div style="font-size: 20px; font-weight: 700">
                                    Rp
                                    {{ number_format($pembelajaran->tarif - ($pembelajaran->tarif * $pembelajaran->diskon) / 100, 0, ',', '.') }}
                                    <span class="text-optional text-info">/jam</span>

                                </div>
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
                            <span>|</span>
                            <div>Status: @if ($pembelajaran->pelatih->status == 1)
                                    <span class="text-optional text-success">Tersedia</span>
                                @endif
                                @if ($pembelajaran->pelatih->status == 2)
                                    <span class="text-optional text-danger">Tidak Tersedia</span>
                                @endif
                            </div>
                        </div>
                        <p>
                            {!! $pembelajaran->pelatih->deskripsi !!}
                        </p>
                        @if ($pembelajaran->pelatih->status == 1)
                            <div class="user_option w-100 d-flex justify-content-center mt-5">
                                <a href="/checkout_pembelajaran/{{ $pembelajaran->id }}" class="order_online"><i
                                        class="fa fa-tv"></i> Mulai
                                    Pembelajaran
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="star-rating">
                        <input id="star-5" type="radio" checked name="rating" value="5" />
                        <label>
                            <i class="active fa fa-star" aria-hidden="true"> {{ $total_rating_pembelajaran }}</i>
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <h1>Review Pembelajaran</h1>
            @foreach ($rating_pembelajarans as $rating_pembelajaran)
                <div class="row align-items-center mb-3">
                    <div class="col-md-6 mt-4">
                        <div class="d-flex">
                            <img class="card-img-top rounded-circle"
                                src="{{ isset($rating_pembelajaran->user->foto) ? asset('storage/' . $rating_pembelajaran->user->foto) : asset('assets/media/avatars/blank.png') }}"
                                alt="avatar" style="aspect-ratio: 1/1; object-fit: cover; width: 120px; height:120px">
                            <div class="ml-3 mt-4">
                                <h3>{{ $rating_pembelajaran->user->name }}</h3>
                                <h6>{{ $rating_pembelajaran->user->email }}</h6>
                                <div class="p-0 star-rating" style="margin-top: -18px;">
                                    @for ($i = 0; $i < $rating_pembelajaran->rating; $i++)
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
                        <h6> {!! $rating_pembelajaran->komentar !!}</h6>
                        @if ($rating_pembelajaran->balasan_admin)
                            <hr>
                            <p>
                            <h3>Balasan Admin</h3>
                            </p>
                            <p>
                                {!! $rating_pembelajaran->balasan_admin !!}
                            </p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
