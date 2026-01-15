@extends('dashboard.layouts.main')
@section('container')
    <section class="book_section layout_padding">
        <div class="container">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <strong>{{ $message }}</strong>
                </div>
            @elseif($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="col text-center">
                                <div class="m-t-30">
                                    <img class="card-img-top rounded-circle"
                                        src="{{ isset(auth()->user()->foto) ? asset('storage/' . auth()->user()->foto) : asset('assets/media/avatars/blank.png') }}"
                                        alt="avatar" style="aspect-ratio: 1/1; object-fit: cover">
                                    <h4 class="card-title mt-5">{{ auth()->user()->name }}</h4>
                                </div>
                                @if (isset(auth()->user()->foto))
                                    @csrf
                                    <button type="button" class="btn btn-danger btn-sm hapus">Hapus Avatar</button>
                                @endif
                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="card-body"> <small class="text-muted">Email </small>
                            <h6>{{ auth()->user()->email }}</h6> <small class="text-muted p-t-30 db">Nomor Handphone</small>
                            <h6>{{ auth()->user()->no_hp }}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <label class="control-label">Nama</label>
                                                <input type="text" name="name" value=" {{ auth()->user()->name }} "
                                                    class="form-control">
                                                @error('name')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <label class="control-label">Email</label>
                                                <input type="text" name="email" value=" {{ auth()->user()->email }} "
                                                    class="form-control">
                                                @error('email')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="required form-label d-block">Foto :</label>
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-empty" data-kt-image-input="true"
                                                style="background-image: url('{{ isset(auth()->user()->foto) ? asset('storage/' . auth()->user()->foto) : asset('assets/media/avatars/blank.png') }}')">
                                                <!--begin::Image preview wrapper-->
                                                <div class="image-input-wrapper w-200px h-200px"></div>
                                                <!--end::Image preview wrapper-->

                                                <!--begin::Edit button-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    data-bs-dismiss="click" title="Change avatar">
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
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    data-bs-dismiss="click" title="Cancel avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel button-->

                                                <!--begin::Remove button-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    data-bs-dismiss="click" title="Remove avatar">
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

                                        <div class="col-md-6">
                                            <div class="form-group has-success">
                                                <label class="control-label">Nomor Handphone</label>
                                                <input type="text" id="no_hp" name="no_hp"
                                                    value=" {{ auth()->user()->no_hp }} " class="form-control" />
                                                @error('no_hp')
                                                    <div class="invalid-feedback d-block mt-0">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="/dashboard" class="btn btn-danger">Batal</a>
                            </form>
                        </div>
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
        $('.hapus').on('click', function() {
            var id = $(this).data('id')
            Swal.fire({
                title: 'Apakah Anda yakin ingin menghapus?',
                text: "Anda tidak akan bisa mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus',
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return $.ajax({
                        url: "{{ url('/profile/setting/hapus-avatar') }}",
                        method: 'POST',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        error: function() {
                            Swal.showValidationMessage('Gagal Menghapus')
                            window.location.reload()
                        }
                    });
                }
            }).then(result => {
                if (result.isConfirmed) {
                    Swal.fire('Berhasil Menghapus', '', 'success')
                    window.location.reload()
                }
            })
        });
    </script>
@endsection
