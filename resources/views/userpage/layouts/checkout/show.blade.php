@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Show | Barang'])
@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="body"></div>
            <div class="row">
                <div class="col-md-6">
                    <h2>{{ $checkout->alamat->nama_penerima }}</h2>
                    <h2> {{ auth()->user()->no_hp }}</h2>
                    <h6>{{ $checkout->alamat->alamat }},
                        {{ $checkout->alamat->kode_pos }}, {{ $checkout->alamat->kecamatan->nama_kecamatan }}, Surabaya</h6>
                    <h6 class="fw-bold">Estimasi : {{ $checkout->pengiriman->estimasi }} Hari
                    </h6>

                </div>
                <div class="col-md-6 mt-2">
                    Ongkos Kirim
                    <h2> Rp {{ number_format($checkout->pengiriman->ongkir, 0, ',', '.') }}</h2>
                    <div>
                        <div>Status</div>
                        @if ($checkout->status == 1)
                            <span class="text-optional text-primary">
                                <h2>Menunggu Pembayaran</h2>
                            </span>
                        @elseif ($checkout->status == 2)
                            <span class="text-optional text-secondary">
                                <h2>Menunggu Konfirmasi</h2>
                            </span>
                        @elseif ($checkout->status == 3)
                            <span class="text-optional text-warning">
                                <h2>Sedang Diproses</h2>
                            </span>
                        @elseif ($checkout->status == 4)
                            <span class="text-optional text-info">
                                <h2>Dikirim</h2>
                            </span>
                        @elseif ($checkout->status == 5)
                            <span class="text-optional text-success">
                                <h2>Selesai</h2>
                            </span>
                        @elseif ($checkout->status == 6)
                            <span class="text-optional text-danger">
                                <h2>Gagal</h2>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Foto</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Barang</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Kuantitas</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Harga</th>
                                @if ($checkout->status == 4 || $checkout->status == 5)
                                    <th class="text-end sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions">
                                        Aksi</th>
                                @endif
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

                                    @if ($checkout->status == 4)
                                        <td class="text-end">
                                            <a class="btn btn-sm btn-icon btn-danger mb-2"
                                                href="/checkout/{{ $checkout->id }}/cetak_pdf" title="pdf"> Download PDF
                                            </a>
                                        @elseif($checkout->status == 5)
                                        <td class="text-end">
                                            <a class="btn btn-sm btn-icon btn-primary mb-2"
                                                href="/barang/rating/{{ $pesanan->barang->id }}" title="Rating">
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($checkout->status == 1)
                        <button class="btn btn-sm btn-danger mb-2 batal" type="button">
                            Batal
                        </button>
                    @endif
                    <h2 class="text-right">
                        Total :
                        {{ number_format($checkout->total_harga, 0, ',', '.') }}
                    </h2>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection

@if ($checkout->status == 1)
    @section('script')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
        </script>
        <script>
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    // window.location.reload();
                },
            });
        </script>
        <script>
            $('.batal').on('click', function() {
                var id = '{{ $checkout->id }}'
                Swal.fire({
                    title: 'Apakah Anda yakin ingin menghapus?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return $.ajax({
                            url: `/checkout/${id}/batal`,
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                            },
                            data: {
                                status: '6'
                            },
                            error: function() {
                                Swal.showValidationMessage('Gagal menghapus data')
                            }
                        });
                    }
                }).then(result => {
                    if (result.isConfirmed) {
                        Swal.fire('Berhasil menghapus data', '', 'success')
                        window.location.reload()
                    }
                })
            });
        </script>
    @endsection
@endif
