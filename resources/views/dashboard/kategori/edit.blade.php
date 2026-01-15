@extends('dashboard.layouts.main', ['title' => 'Edit | Kategori -'])


@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Kategori</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">


                </div>

            </div>

        </div>
        <div class="card card-custom card-create">
            <div class="card-body">
                <form action="{{ url('dashboard/kategori/' . $kategori->id) }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-4">
                                <label class="required form-label">Kategori :</label>
                                <input type="text" placeholder="Kategori" name="nama_kategori" required="required"
                                    class="form-control" value="{{ $kategori->nama_kategori }}">
                            </div>
                        </div>
                        <div class="kt-form__actions mt-5">
                            <button type="submit" class="btn btn-primary btn-sm mb-2 me-2">
                                <i class="las la-save fs-2 me-2"></i> SAVE</button>
                            <a href="/dashboard/kategori" type="button" class="btn btn-danger btn-sm mb-2 me-2">
                                <i class="las la-ban fs-2 me-2"> </i> CANCEL
                            </a>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
