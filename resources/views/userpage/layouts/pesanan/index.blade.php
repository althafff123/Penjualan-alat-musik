@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Pesanan'])
@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center mb-5">
                <h2>
                    Pesanan
                </h2>
            </div>
            <div class="body container">
                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table" rowspan="1"
                                colspan="1" aria-label="Category: activate to sort column ascending">Nama Penerima
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table" rowspan="1"
                                colspan="1" aria-label="Category: activate to sort column ascending">
                                Alamat</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table" rowspan="1"
                                colspan="1" aria-label="Category: activate to sort column ascending">
                                Total harga</th>
                            <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table" rowspan="1"
                                colspan="1" aria-label="Category: activate to sort column ascending">
                                Status</th>

                            <th class="text-right sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="fw-bold text-gray-600">
                        @if (count($checkouts))
                            @foreach ($checkouts as $checkout)
                                <tr class="odd">
                                    <td>
                                        {{ $checkout->alamat->nama_penerima }}
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
                                                Rp
                                                {{ number_format($checkout->total_harga, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <div class="symbol symbol-50px">
                                            </div>

                                            @if ($checkout->status == 1)
                                                <div class="badge badge-primary">
                                                    Menunggu Pembayaran
                                                </div>
                                            @elseif ($checkout->status == 2)
                                                <div class="badge badge-secondary">
                                                    Menunggu Konfirmasi
                                                </div>
                                            @elseif ($checkout->status == 3)
                                                <div class="badge badge-warning">
                                                    Sedang Diproses
                                                </div>
                                            @elseif ($checkout->status == 4)
                                                <div class="badge badge-info">
                                                    Dikirim
                                                </div>
                                            @elseif ($checkout->status == 5)
                                                <div class="badge badge-success">
                                                    Selesai
                                                </div>
                                            @elseif ($checkout->status == 6)
                                                <div class="badge badge-danger">
                                                    Gagal
                                                </div>
                                            @endif

                                        </div>
                                    </td>


                                    <td class="text-right d-flex justify-content-end" style="gap: 1rem">
                                        <a class="btn btn-sm btn-icon btn-light-primary mb-2"
                                            href="/checkout/{{ $checkout->id }}" title="Detail">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        @if ($checkout->status != 1)
                                            <form action="/userpage/layouts/pesanan/update-status-user/{{ $checkout->id }}"
                                                method="POST">
                                                @csrf
                                                @if ($checkout->status == 4)
                                                    <input type="hidden" name="status" value="5">
                                                    <button class="btn btn-sm btn-success mb-2 hapus" type="submit">
                                                        Diterima
                                                    </button>
                                                @endif
                                            </form>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">
                                    <h5>Belum Memesan Produk </h5>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>


        </div>
    </section>
@endsection
