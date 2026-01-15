@extends('dashboard.layouts.main', ['title' => 'Create | Barang -'])


@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Barang</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                </div>
            </div>
        </div>
        <div class="card card-custom card-create">
            <div class="card-body">
                <form action="{{ url('dashboard/barang') }}" method="POST" enctype="multipart/form-data"
                    autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="required form-label">Barang :</label>
                                <input type="text" placeholder="barang" name="nama_barang" required="required"
                                    @error('nama_barang')is-invalid @enderror class="form-control">
                                @error('nama_barang')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="required form-label">Stock :</label>
                                <input type="number" placeholder="stock" name="stock" required="required" min="0"
                                    @error('stock')is-invalid @enderror class="form-control">
                                @error('stock')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="separator my-4"></div>

                        <div class="col-md-4">
                            <div class="mb-4">
                                <label class="required form-label d-block">Foto :</label>
                                <!--begin::Image input-->
                                <div class="image-input image-input-empty" data-kt-image-input="true"
                                    style="background-image: url(/assets/media/svg/avatars/blank.svg)">
                                    <!--begin::Image preview wrapper-->
                                    <div class="image-input-wrapper w-200px h-200px"></div>
                                    <!--end::Image preview wrapper-->

                                    <!--begin::Edit button-->
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>

                                        <!--begin::Inputs-->
                                        <input type="file" name="foto" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Edit button-->

                                    <!--begin::Cancel button-->
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel button-->

                                    <!--begin::Remove button-->
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                        title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove button-->
                                </div>
                                <!--end::Image input-->
                                @error('foto')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
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

                                <div class="col-md-6">
                                    <label class="required form-label">Diskon :</label>
                                    <input type="text" placeholder="diskon" name="diskon"
                                        @error('diskon')is-invalid @enderror class="form-control" value="0 ">
                                    @error('diskon')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-5 justify-center">
                                    <label class="required form-label">Berat <span
                                            class="text-optional text-info">(Gram)</span> :</label>
                                    <input type="text" placeholder="berat" name="berat"
                                        @error('berat')is-invalid @enderror class="form-control">
                                    @error('berat')
                                        <div class="invalid-feedback d-block">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
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


                    <div class="form-group col-md-12">
                        <label class="required form-label">Harga</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text">Rp</span></div>
                            <input type="integer" placeholder="harga" name="harga" required="required"
                                oninput="this.value = this.value.rupiah()" @error('harga')is-invalid @enderror
                                class="form-control">
                            @error('harga')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="kt-form__actions mt-5">
                        <button type="submit" class="btn btn-primary btn-sm mb-2 me-2">
                            <i class="las la-save fs-2 me-2"></i> SAVE</button>
                        <a href="/dashboard/barang/" type="button" class="btn btn-danger btn-sm mb-2 me-2">
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
