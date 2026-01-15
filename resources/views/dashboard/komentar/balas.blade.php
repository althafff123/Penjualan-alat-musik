@extends('dashboard.layouts.main', ['title' => 'Balas | Komentar -'])


@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Komentar</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">


                </div>

            </div>

        </div>
        <div class="card card-custom card-create">
            <div class="card-body">
                <form action="{{ url('dashboard/komentar/' . $komentar->id) }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="required form-label">komentar :</label>
                                <textarea disabled placeholder="komentar" name="komentar" required="required" class="form-control">{{ $komentar->komentar }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="required form-label">Balas :</label>
                                <textarea placeholder="Balas" name="balasan_admin" id="balasan_admin" class="form-control">{{ $komentar->balasan_admin }}</textarea>
                            </div>
                        </div>
                        <div class="kt-form__actions mt-5">
                            <button type="submit" class="btn btn-primary btn-sm mb-2 me-2">
                                <i class="las la-save fs-2 me-2"></i> SAVE</button>
                            <a href="/dashboard/komentar" type="button" class="btn btn-danger btn-sm mb-2 me-2">
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
