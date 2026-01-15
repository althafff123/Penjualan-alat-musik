@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Rating Produk'])

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
            <div class="body">
                <div class="row">
                    <div class="col-md-2">
                        <img src="{{ asset('storage/' . $barang->foto) }}" class="img-fluid" width="400px">
                    </div>
                    <div class="col-md-10">
                        <h1 style="font-size: 60px">{{ $barang->nama_barang }}</h1>
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <label class="required form-label">
                                            <h3>Berikan Rating :</h3>
                                        </label>
                                        <div class="star-rating mt-5">
                                            <input id="star-5" type="radio" name="rating" value="5"
                                                {{ @$rating->rating == 5 ? 'checked' : '' }} />
                                            <label for="star-5" title="Sangat Bagus">
                                                <i class="active fa fa-star" aria-hidden="true"></i>
                                            </label>
                                            <input id="star-4" type="radio" name="rating" value="4"
                                                {{ @$rating->rating == 4 ? 'checked' : '' }} />
                                            <label for="star-4" title="Cukup Bagus">
                                                <i class="active fa fa-star" aria-hidden="true"></i>
                                            </label>
                                            <input id="star-3" type="radio" name="rating" value="3"
                                                {{ @$rating->rating == 3 ? 'checked' : '' }} />
                                            <label for="star-3" title="Bagus">
                                                <i class="active fa fa-star" aria-hidden="true"></i>
                                            </label>
                                            <input id="star-2" type="radio" name="rating" value="2"
                                                {{ @$rating->rating == 2 ? 'checked' : '' }} />
                                            <label for="star-2" title="Cukup Jelek">
                                                <i class="active fa fa-star" aria-hidden="true"></i>
                                            </label>
                                            <input id="star-1" type="radio" name="rating" value="1"
                                                {{ @$rating->rating == 1 ? 'checked' : '' }} />
                                            <label for="star-1" title="Sangat Jelek">
                                                <i class="active fa fa-star" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="foto" style="cursor: pointer; position: relative">
                                        <div class="d-block">Foto Barang </div>
                                        <input type="file" accept="image/*" class="d-none" id="foto" name="foto"
                                            value="{{ @$rating->foto }}" accept=".png, .jpg, .jpeg"
                                            onchange="previewImage()">
                                        <span class="btn bg-white rounded-circle shadow"
                                            style="position: absolute; top: -10px; right: -10px">
                                            <i class="fa fa-pencil"></i>
                                        </span>
                                        <img width="150px"
                                            src="{{ isset($rating->foto) ? asset('storage/' . @$rating->foto) : asset('assets/media/avatars/blank.png') }}"
                                            class="rounded" id="foto-preview" alt="image">
                                    </label>
                                </div>


                                <div class="col-md-12 mt-3">
                                    <textarea type="textarea" placeholder="Berikan Komentar" name="komentar" class="form-control" rows="5">{{ @$rating->komentar }}</textarea>
                                    @error('komentar')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="kt-form__actions mt-5">
                                <button type="submit" class="btn btn-primary btn-sm mb-2 me-2">
                                    <i class="fa fa-save fs-2 me-2"></i> SIMPAN KOMENTAR</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function previewImage() {
            const imgInput = document.querySelector("#foto");
            const imgPreview = document.querySelector("#foto-preview");

            const reader = new FileReader();
            reader.readAsDataURL(imgInput.files[0]);

            reader.onload = function(ev) {
                imgPreview.src = ev.target.result;
            }
        }
    </script>
@endsection
