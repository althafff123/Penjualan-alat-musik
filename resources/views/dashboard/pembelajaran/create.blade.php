@extends('dashboard.layouts.main', ['title' => 'Create | Pembelajaran -'])


@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Pembelajaran</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">


                </div>

            </div>

        </div>
        <div class="card card-custom card-create">
            <div class="card-body">
                <form action="{{ url('dashboard/pembelajaran') }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label class="required form-label">Nama Pembelajaran
                            </label>
                            <div class="input-group">
                                <input type="text" placeholder="Nama Pembelajaran" name="nama_pembelajaran"
                                    required="required" @error('nama_pembelajaran')is-invalid @enderror
                                    class="form-control">
                                @error('nama_pembelajaran')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="required form-label">Pelatih :</label>
                            <select class="form-select" data-control="select2" data-placeholder="Select an option"
                                name="pelatih_id" @error('pelatih_id')is-invalid @enderror>
                                <option></option>
                                @foreach ($pelatihs as $pelatih)
                                    <option value="{{ $pelatih->id }}">{{ $pelatih->nama_pelatih }}</option>
                                @endforeach
                            </select>
                            @error('pelatih_id')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label class="required form-label">Kategori :</label>
                            <select class="form-select" data-control="select2" data-placeholder="Select an option"
                                name="kategori_id" @error('kategori_id')is-invalid @enderror>
                                <option></option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group col-md-8">
                            <label class="required form-label">Tarif
                                <span class="text-optional text-info">(/jam)</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                                <input type="integer" placeholder="tarif" name="tarif" required="required"
                                    oninput="this.value = this.value.rupiah()" @error('tarif')is-invalid @enderror
                                    class="form-control">
                                @error('tarif')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="required form-label">Diskon :</label>
                            <input type="text" placeholder="diskon" name="diskon" @error('diskon')is-invalid @enderror
                                class="form-control" value="0 ">
                            @error('diskon')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label class="required form-label">Deskripsi :</label>
                            <textarea type="textarea" placeholder="deskripsi" name="deskripsi" id="deskripsi"
                                @error('deskripsi')is-invalid @enderror class="form-control" value="0 "></textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                    <div class="kt-form__actions mt-5">
                        <button type="submit" class="btn btn-primary btn-sm mb-2 me-2">
                            <i class="las la-save fs-2 me-2"></i> SAVE</button>
                        <a href="/dashboard/pembelajaran/" type="button" class="btn btn-danger btn-sm mb-2 me-2">
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
            .create(document.querySelector('#deskripsi'))
    </script>
@endsection
