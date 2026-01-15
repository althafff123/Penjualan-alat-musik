@extends('dashboard.layouts.main', ['title' => 'Balas | Rating -'])

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

@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Rating</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                </div>
            </div>
        </div>
        <div class="card card-custom card-create">
            <div class="card-body">
                <form action="{{ url('dashboard/rating/' . $rating->id) }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="required from-label">
                                    Rating :
                                </label>
                                <div class="star-rating">
                                    @for ($i = 0; $i < $rating->rating; $i++)
                                        <label for="star-5">
                                            <i class="active fa fa-star mt-5" aria-hidden="true"
                                                style="font-size: 1.5rem; color: #f2b600"></i>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="required form-label d-block">Foto :</label>
                                <div class="image-input image-input-empty" data-kt-image-input="true"
                                    style="background-image:  url('{{ asset('storage/' . $rating->foto) }}')">
                                    <div class="image-input-wrapper w-200px h-200px"></div>
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                @error('foto')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="required form-label">Komentar :</label>
                                <textarea disabled placeholder="komentar" name="komentar" id="komentar" class="form-control">{{ $rating->komentar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="required form-label">Balas :</label>
                                <textarea placeholder="Balas" name="balasan_admin" id="balasan_admin" class="form-control">{{ $rating->balasan_admin }}</textarea>
                            </div>
                        </div>
                        <div class="kt-form__actions mt-5">
                            <button type="submit" class="btn btn-primary btn-sm mb-2 me-2">
                                <i class="las la-save fs-2 me-2"></i> SAVE</button>
                            <a href="/dashboard/rating" type="button" class="btn btn-danger btn-sm mb-2 me-2">
                                <i class="las la-ban fs-2 me-2"> </i> CANCEL
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#balasan_admin'))
    </script>
@endsection
