@extends('dashboard.layouts.main')


@section('container')
    <div class="container">

        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

            <div class="toolbar" id="kt_toolbar">
                <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                    <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                        data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                        class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                        <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Setting</h1>
                        <span class="h-20px border-gray-300 border-start mx-4"></span>
                    </div>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                    </div>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <div
                            class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                            <img class="mw-50px mw-lg-75px" src="{{ asset('storage/' . $setting->logo_utama) }}"
                                alt="image">
                        </div>

                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-1">
                                        <a class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">Rock N'
                                            Roll Store
                                            Dashboard</a>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-start">
                                <div class="d-flex flex-wrap">
                                    <div
                                        class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold">21 Nov, 2022</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-400">Dibuat Pada</div>
                                    </div>
                                </div>
                                <div class="symbol-group symbol-hover mb-3">
                                    @for ($i = 0; $i < 2; $i++)
                                        @if ($i < $users->count())
                                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip"
                                                data-bs-original-title="{{ $users[$i]->name }}" data-kt-initialized="1">
                                                <img class="card-img-top rounded-circle"
                                                    src="{{ isset($users[$i]->foto) ? asset('storage/' . $users[$i]->foto) : asset('assets/media/avatars/blank.png') }}"
                                                    alt="avatar"
                                                    style="aspect-ratio: 1/1; object-fit: cover; max-width: 240px">
                                            </div>
                                        @endif
                                    @endfor

                                    @if ($users->count() > 3)
                                        <a class="symbol symbol-35px symbol-circle" data-bs-toggle="modal"
                                            data-bs-target="#kt_modal_view_users">
                                            <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bold"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                data-bs-original-title="View more users"
                                                data-kt-initialized="1">+{{ $users->count() - 2 }}</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-5 active" data-bs-toggle="tab"
                                href="#informasi_perusahaan" aria-selected="false" role="tab" tabindex="-1">
                                Informasi Perusahaan </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#sosial_media"
                                aria-selected="false" role="tab" tabindex="-1">
                                Sosial Media
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-5" data-bs-toggle="tab" href="#background_logo"
                                aria-selected="false" role="tab" tabindex="-1">
                                Background & Logo </a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-modal="true" role="dialog">
                <div class="modal-dialog mw-650px">
                    <div class="modal-content">
                        <div class="modal-header pb-0 border-0 justify-content-end">
                            <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                <span class="svg-icon svg-icon-1"><svg width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                            rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                            transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                                    </svg>

                                </span>
                            </div>
                        </div>
                        <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                            <div class="text-center mb-13">
                                <h1 class="mb-3">User</h1>
                                <div class="text-muted fw-semibold fs-5">
                                    Jika ingin info user lebih lanjut, bisa klik
                                    <a href="/dashboard" class="link-primary fw-bold">Disini</a>.
                                </div>
                            </div>
                            <div class="mb-15">
                                <div class="mh-375px scroll-y me-n7 pe-7">
                                    @foreach ($users as $user)
                                        <div
                                            class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic"
                                                        src="{{ isset($user->foto) ? asset('storage/' . $user->foto) : asset('assets/media/avatars/blank.png') }}"
                                                        style="width: 60px; height:60px">
                                                </div>
                                                <div class="ms-6">
                                                    <a
                                                        class="d-flex align-items-center fs-5 fw-bold text-dark text-hover-primary">
                                                        {{ $user->name }}
                                                    </a>
                                                    <div class="fw-semibold text-muted">{{ $user->email }}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="text-end">
                                                    <div class="fs-5 fw-bold text-dark">Rp
                                                        {{ number_format($user->nominal_pembelian, 0, ',', '.') }}</div>
                                                    <div class="fs-7 text-muted">Pembelian</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active bg-white" id="informasi_perusahaan" role="tabpanel">
                    <form action="{{ url('dashboard/setting/perusahaan') }}" method="POST">
                        @csrf
                        <div class="row mb-7">
                            <div class="col-md-9 offset-md-3">
                                <h2>Informasi Perusahaan</h2>
                            </div>
                        </div>
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>Email Perusahaan</span>

                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" name="email" placeholder="Masukan Email" id="email"
                                    class="form-control" value="{{ @$setting->email }}">

                                </input>
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span>No Whatsapp</span>

                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" placeholder="Nomor Whatsapp" name="no_whatsapp"
                                    value="{{ @$setting->no_whatsapp }}" @error('no_whatsapp')is-invalid @enderror
                                    class="form-control">
                                @error('no_whatsapp')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row py-5">
                            <div class="col-md-9 offset-md-3">
                                <div class="d-flex">
                                    <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                        class="btn btn-danger me-3">Cancel</button>
                                    <button type="submit" data-kt-ecommerce-settings-type="submit"
                                        class="btn btn-primary">
                                        <span class="indicator-label">Save</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade bg-white" id="sosial_media" role="tabpanel">
                    <form action="{{ url('dashboard/setting/sosial_media') }}" method="POST">
                        @csrf
                        <div class="row mb-7">
                            <div class="col-md-9 offset-md-3">
                                <h2>Sosial Media</h2>
                            </div>
                        </div>
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Facebook</span>
                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" placeholder="Facebook" name="facebook" required="required"
                                    value="{{ @$setting->facebook }}" @error('facebook')is-invalid @enderror
                                    class="form-control">
                                @error('facebook')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Instagram</span>
                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" placeholder="Instagram" name="instagram"
                                    value="{{ @$setting->instagram }}" required="required"
                                    @error('instagram')is-invalid @enderror class="form-control">
                                @error('instagram')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">YouTube</span>
                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" placeholder="YouTube" name="youtube"
                                    value="{{ @$setting->youtube }}" required="required"
                                    @error('youtub')is-invalid @enderror class="form-control">
                                @error('youtub')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row fv-row mb-7 fv-plugins-icon-container">
                            <div class="col-md-3 text-md-end">
                                <label class="fs-6 fw-semibold form-label mt-3">
                                    <span class="required">Twitter</span>
                                </label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" placeholder="Twitter" name="twitter"
                                    value="{{ @$setting->twitter }}" required="required"
                                    @error('twitter')is-invalid @enderror class="form-control">
                                @error('twitter')
                                    <div class="invalid-feedback d-block">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="row py-5">
                            <div class="col-md-9 offset-md-3">
                                <div class="d-flex">
                                    <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                        class="btn btn-danger me-3">Cancel</button>
                                    <button type="submit" data-kt-ecommerce-settings-type="submit"
                                        class="btn btn-primary">
                                        <span class="indicator-label">Save</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade bg-white" id="background_logo" role="tabpanel">
                    <form action="{{ url('dashboard/setting/background') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <h2>Logo Utama</h2>
                                <div class="image-input image-input-empty mx-auto" data-kt-image-input="true"
                                    style="{{ isset($setting->logo_utama) ? 'background-image: url("' . asset('storage/' . $setting->logo_utama) . '")' : 'background-image: url(/assets/media/svg/avatars/blank.svg)' }}">
                                    <div class="image-input-wrapper w-475px h-265px" style="width: 220px!important">
                                    </div>
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>

                                        <input type="file" name="logo_utama" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="logo_utama_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h2>Logo Navbar</h2>
                                <div class="image-input image-input-empty mx-auto" data-kt-image-input="true"
                                    style="{{ isset($setting->logo_navbar) ? 'background-image: url("' . asset('storage/' . $setting->logo_navbar) . '")' : 'background-image: url(/assets/media/svg/avatars/blank.svg)' }}">
                                    <div class="image-input-wrapper w-475px h-265px" style="width: 220px!important">
                                    </div>
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>

                                        <input type="file" name="logo_navbar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="logo_navbar_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h2>Banner Utama</h2>
                                <div class="image-input image-input-empty mx-auto" data-kt-image-input="true"
                                    style="{{ isset($setting->banner_utama) ? 'background-image: url("' . asset('storage/' . $setting->banner_utama) . '")' : 'background-image: url(/assets/media/svg/avatars/blank.svg)' }}">
                                    <div class="image-input-wrapper
                                                w-475px h-265px"
                                        style="width: 220px!important">
                                    </div>
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="banner_utama" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="banner_utama_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <h2>Logo Footer</h2>
                                <div class="image-input image-input-empty mx-auto" data-kt-image-input="true"
                                    style="{{ isset($setting->logo_footer) ? 'background-image: url("' . asset('storage/' . $setting->logo_footer) . '")' : 'background-image: url(/assets/media/svg/avatars/blank.svg)' }}">
                                    <div class="image-input-wrapper w-475px h-265px" style="width: 220px!important">
                                    </div>
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="logo_footer" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="logo_footer_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <h2>logo Register</h2>
                                <div class="image-input image-input-empty mx-auto" data-kt-image-input="true"
                                    style="{{ isset($setting->logo_register) ? 'background-image: url("' . asset('storage/' . $setting->logo_register) . '")' : 'background-image: url(/assets/media/svg/avatars/blank.svg)' }}">
                                    <div class="image-input-wrapper
                                                w-475px h-265px"
                                        style="width: 220px!important">
                                    </div>
                                    <label
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <input type="file" name="logo_register" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="logo_register_remove" />
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>

                                    <span
                                        class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        data-bs-dismiss="click" title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row py-5">
                            <div class="col-md-9 offset-md-3">
                                <div class="d-flex">
                                    <button type="reset" data-kt-ecommerce-settings-type="cancel"
                                        class="btn btn-danger me-3">Cancel</button>
                                    <button type="submit" data-kt-ecommerce-settings-type="submit"
                                        class="btn btn-primary">
                                        <span class="indicator-label">Save</span>
                                        <span class="indicator-progress">Please wait...
                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
