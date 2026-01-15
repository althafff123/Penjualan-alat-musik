@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{ $checkout_pembelajaran->alamat->nama_penerima }}</h1>
                        <h2> {{ auth()->user()->no_hp }}</h2>
                        <h6>{{ $checkout_pembelajaran->alamat->alamat }},
                            {{ $checkout_pembelajaran->alamat->kode_pos }},
                            {{ $checkout_pembelajaran->alamat->kecamatan->nama_kecamatan }}, Surabaya
                        </h6>
                    </div>
                    <div class="col-md-6 mt-2">
                        Total Harga
                        <h1> Rp {{ number_format($checkout_pembelajaran->total_harga, 0, ',', '.') }}</h1>
                        <div>
                            <div>Status</div>
                            @if ($checkout_pembelajaran->status == 1)
                                <h1>Menunggu Pembayaran</h1>
                            @elseif ($checkout_pembelajaran->status == 2)
                                <h1>Menunggu Konfirmasi</h1>
                            @elseif ($checkout_pembelajaran->status == 3)
                                <h1>Perjalanan</h1>
                            @elseif ($checkout_pembelajaran->status == 4)
                                <h1>Pembelajaran</h1>
                            @elseif ($checkout_pembelajaran->status == 5)
                                <h1>Selesai</h1>
                            @elseif ($checkout_pembelajaran->status == 6)
                                <h1>Gagal</h1>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12 mt-5">
                        <div class="table-responsive">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending">Foto</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending">
                                            Barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending">
                                            Kuantitas</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending">
                                            Harga</th>
                                    </tr>
                                </thead>
                                <tbody class="fw-bold text-gray-600">
                                    <tr class="odd">
                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        <img src="{{ asset('storage/' . $checkout_pembelajaran->pembelajaran->pelatih->foto) }}"
                                                            alt="" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        {{ $checkout_pembelajaran->pembelajaran->pelatih->nama_pelatih }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        {{ $checkout_pembelajaran->pembelajaran->nama_pembelajaran }}</div>
                                                </div>
                                            </div>
                                        </td>


                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        {{ $checkout_pembelajaran->tanggal }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        {{ $checkout_pembelajaran->jam_mulai }}</div>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        {{ $checkout_pembelajaran->jam_selesai }}</div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/dashboard/pesanan_pembelajaran/{{ $checkout_pembelajaran->status }}"
                                        type="button" class="btn btn-danger btn-sm mb-2 me-2 text-tart">
                                        <i class="fas fa-arrow-left fs-2 me-2"> </i> KEMBALI

                                    </a>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
