@php
    $title = '';
    if ($status == 1) {
        $title = 'Menunggu Pembayaran | Pesanan -';
    } elseif ($status == 2) {
        $title = 'Meunuggu Konfirmasi | Pesanan -';
    } elseif ($status == 3) {
        $title = 'Sedang Diproses | Pesanan -';
    } elseif ($status == 4) {
        $title = 'Dikirim | Pesanan -';
    } elseif ($status == 5) {
        $title = 'Selesai | Pesanan -';
    } elseif ($status == 6) {
        $title = 'Gagal | Pesanan -';
    }
@endphp
@extends('dashboard.layouts.main', [
    'title' => $title,
])
@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">
                        @if ($status == 1)
                            <h1>Menunggu Pembayaran</h1>
                        @elseif ($status == 2)
                            <h1>Menunggu Konfirmasi</h1>
                        @elseif ($status == 3)
                            <h1>Sedang Diproses</h1>
                        @elseif ($status == 4)
                            <h1>Dikirim</h1>
                        @elseif ($status == 5)
                            <h1>Selesai</h1>
                        @elseif ($status == 6)
                            <h1>Gagal</h1>
                        @endif
                    </h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>

                <div class="d-flex align-items-center gap-2 gap-lg-3">


                </div>
            </div>
        </div>

        <div class="post d-flex flex-column-fluid" id="kt_post">

            <div id="kt_content_container" class="container-xxl">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('successupdate'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('successupdate') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('successdelete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('successdelete') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card card-flush">
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        @if (count($checkouts))
                            <a href="/dashboard/cetakSeluruh/{{ $status }}/cetak" class="btn btn-danger mb-3"
                                type="button" title="PDF">
                                <i class="fa fa-file-pdf">
                                </i> REPORT</a>
                        @endif
                        <div class="card-title">
                            <form method="GET">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="black"></rect>
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                    <input type="text" name="keyword" autocomplete="off"
                                        data-kt-ecommerce-category-filter="search"
                                        class="form-control form-control-solid w-250px ps-14" placeholder="Search Pesanan"
                                        autocomplete="off" value="{{ $keyword }}">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div id="kt_ecommerce_category_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    id="kt_ecommerce_category_table">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="
                                                style="width:
                                                29.25px;">
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    NO
                                                </div>
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                                rowspan="1" colspan="1"
                                                aria-label="Category: activate to sort column ascending">User</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                                rowspan="1" colspan="1"
                                                aria-label="Category: activate to sort column ascending">Nama Penerima</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                                rowspan="1" colspan="1"
                                                aria-label="Category: activate to sort column ascending">Alamat</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                                rowspan="1" colspan="1"
                                                aria-label="Category: activate to sort column ascending">Total Harga</th>

                                            <th class="text-end sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Actions">Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">
                                        @foreach ($checkouts as $key => $checkout)
                                            <tr class="odd">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        {{ $checkouts->firstItem() + $key }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="symbol symbol-50px">
                                                        </div>
                                                        <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                            {{ $checkout->user->name }}</div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <div class="symbol symbol-50px">
                                                        </div>
                                                        <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                            {{ $checkout->alamat->nama_penerima }}</div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <div class="d-flex">
                                                        <div class="symbol symbol-50px">
                                                        </div>
                                                        <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                            {{ $checkout->alamat->alamat }}</div>
                                                    </div>
                                                </td>


                                                <td>
                                                    <div class="d-flex">
                                                        <div class="symbol symbol-50px">
                                                        </div>
                                                        <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                            {{ number_format($checkout->total_harga, 0, ',', '.') }}
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-end d-flex justify-content-end" style="gap: 1rem">
                                                    <a class="btn btn-sm btn-icon btn-light-warning mb-2"
                                                        href="{{ url('dashboard/pesanan/detail/' . $checkout->id) }}"
                                                        title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="/dashboard/pesanan/detail/{{ $checkout->id }}/cetak_pdf"class="btn btn-sm btn-icon btn-light-danger mb-2"
                                                        type="button" title="PDF">
                                                        <i class="fa fa-file-pdf"></i>
                                                    </a>
                                                    @if ($checkout->status != 1)
                                                        <form
                                                            action="/dashboard/pesanan/update-status/{{ $checkout->id }}"
                                                            method="POST">
                                                            @csrf
                                                            @if ($checkout->status == 2)
                                                                <input type="hidden" name="status" value="3">
                                                                <button class="btn btn-sm btn-light-warning mb-2"
                                                                    type="submit">
                                                                    Proses
                                                                </button>
                                                            @elseif ($checkout->status == 3)
                                                                <input type="hidden" name="status" value="4">
                                                                <button class="btn btn-sm btn-light-info mb-2"
                                                                    type="submit">
                                                                    Kirim
                                                                </button>
                                                            @elseif ($checkout->status == 4)
                                                                <input type="hidden" name="status" value="5">
                                                                <button class="btn btn-sm btn-light-success mb-2"
                                                                    type="submit">
                                                                    Selesai
                                                                </button>
                                                            @endif
                                                        </form>
                                                    @endif
                                                </td>
                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="pull-right">

                                    {{ $checkouts->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
