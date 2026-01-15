@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Show | Pembelajaran'])
@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="body"></div>
            <div class="row">
                <div class="col-md-6">
                    <h2>{{ $checkout_pembelajaran->alamat->nama_penerima }}</h2>
                    <h2> {{ auth()->user()->no_hp }}</h2>
                    <h6>{{ $checkout_pembelajaran->alamat->alamat }},
                        {{ $checkout_pembelajaran->alamat->kode_pos }},
                        {{ $checkout_pembelajaran->alamat->kecamatan->nama_kecamatan }}, Surabaya</h6>
                </div>
                <div class="col-md-6 mt-2">
                    Total Harga
                    <h2> Rp {{ number_format($checkout_pembelajaran->total_harga, 0, ',', '.') }}</h2>
                    <div>
                        <div>Status</div>
                        @if ($checkout_pembelajaran->status == 1)
                            <span class="text-optional text-primary">
                                <h2>Menunggu Pembayaran</h2>
                            </span>
                        @elseif ($checkout_pembelajaran->status == 2)
                            <span class="text-optional text-secondary">
                                <h2>Menunggu Konfirmasi</h2>
                            </span>
                        @elseif ($checkout_pembelajaran->status == 3)
                            <span class="text-optional text-warning">
                                <h2>Perjalanan</h2>
                            </span>
                        @elseif ($checkout_pembelajaran->status == 4)
                            <span class="text-optional text-info">
                                <h2>Pembelajaran</h2>
                            </span>
                        @elseif ($checkout_pembelajaran->status == 5)
                            <span class="text-optional text-success">
                                <h2>Selesai</h2>
                            </span>
                        @elseif ($checkout_pembelajaran->status == 6)
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
                                    Foto Pleatih</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Nama Pleatih</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Pembelajaran</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Tanggal</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Jam Mulai</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Jam Selesai</th>
                                @if ($checkout_pembelajaran->status == 4 || $checkout_pembelajaran->status == 5)
                                    <th class="text-end sorting_disabled" rowspan="1" colspan="1"
                                        aria-label="Actions">
                                        Aksi</th>
                                @endif
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
                                                {{ $checkout_pembelajaran->pembelajaran->pelatih->nama_pelatih }}</div>
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
                                @if ($checkout_pembelajaran->status == 4)
                                    <td class="text-end">
                                        <a class="btn btn-sm btn-icon btn-danger mb-2"
                                            href="/checkout_pembelajaran/{{ $checkout_pembelajaran->id }}/cetak_pdf_detail"
                                            title="pdf">
                                            Download PDF
                                        </a>
                                    @elseif ($checkout_pembelajaran->status == 5)
                                    <td class="text-end">
                                        <a class="btn btn-sm btn-icon btn-primary mb-2"
                                            href="/pembelajaran/rating/{{ $checkout_pembelajaran->pembelajaran->id }}"
                                            title="Rating">
                                            <i class="fa fa-star"></i>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                    @if ($checkout_pembelajaran->status == 1)
                        <button class="btn btn-sm btn-danger mb-2 batal" type="button">
                            Batal
                        </button>
                    @endif
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection

@if ($checkout_pembelajaran->status == 1)
    @section('script')
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
        </script>
        <script>
            snap.pay('{{ $snapToken }}', {
                // Optional
                onSuccess: function(result) {
                    window.location.reload();
                },
            });
        </script>
        <script>
            $('.batal').on('click', function() {
                var id = '{{ $checkout_pembelajaran->id }}'
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
                            url: `/checkout_pembelajaran/${id}/batal`,
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
