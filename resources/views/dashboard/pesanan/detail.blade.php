@extends('dashboard.layouts.main')
@section('container')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{ $checkout->alamat->nama_penerima }}</h1>
                        <h2> {{ auth()->user()->no_hp }}</h2>
                        <h6>{{ $checkout->alamat->alamat }},
                            {{ $checkout->alamat->kode_pos }}, {{ $checkout->alamat->kecamatan->nama_kecamatan }}, Surabaya
                        </h6>
                    </div>
                    <div class="col-md-6 mt-2">
                        Ongkos Kirim
                        <h1> Rp {{ number_format($checkout->pengiriman->ongkir, 0, ',', '.') }}</h1>
                        <div>
                            <div>Status</div>
                            @if ($checkout->status == 1)
                                <h1>Menunggu Pembayaran</h1>
                            @elseif ($checkout->status == 2)
                                <h1>Menunggu Konfirmasi</h1>
                            @elseif ($checkout->status == 3)
                                <h1>Perjalanan</h1>
                            @elseif ($checkout->status == 4)
                                <h1>Pembelajaran</h1>
                            @elseif ($checkout->status == 5)
                                <h1>Selesai</h1>
                            @elseif ($checkout->status == 6)
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
                                    @foreach ($checkout->pesanans as $pesanan)
                                        <tr class="odd">
                                            <td>
                                                <div class="d-flex">
                                                    <div class="symbol symbol-50px">
                                                    </div>
                                                    <div class="ms-5">
                                                        <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                            <img src="{{ asset('storage/' . $pesanan->barang->foto) }}"
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
                                                            {{ $pesanan->barang->nama_barang }}</div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex">
                                                    <div class="symbol symbol-50px">
                                                    </div>
                                                    <div class="ms-5">
                                                        <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                            {{ $pesanan->kuantitas }}</div>
                                                    </div>
                                                </div>
                                            </td>


                                            <td>
                                                <div class="d-flex">
                                                    <div class="symbol symbol-50px">
                                                    </div>
                                                    <div class="ms-5">
                                                        <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                            Rp
                                                            {{ number_format($pesanan->barang->harga - ($pesanan->barang->harga * $pesanan->barang->diskon) / 100, 0, ',', '.') }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/dashboard/pesanan/{{ $checkout->status }}" type="button"
                                        class="btn btn-danger btn-sm mb-2 me-2 text-tart">
                                        <i class="fas fa-arrow-left fs-2 me-2"> </i> KEMBALI
                                    </a>

                                </div>
                                <div class="col-md-6">
                                    <h1 class="text-end">
                                        Total :
                                        {{ number_format($checkout->total_harga, 0, ',', '.') }}</h1>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
