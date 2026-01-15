@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Keranjang'])
@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center mb-5">
                <h2>
                    Keranjang
                </h2>
            </div>
            <div class="body container">
                @if (session('error'))
                    <div class="alert alert-danger">
                        <h6>{{ session('error') }}</h6>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-9">
                        <div class="heading_container" style="overflow-x:auto;">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending">Foto</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending">Barang</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending">Stock</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending">Harga</th>
                                        <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending">Kuantitas</th>

                                        <th class="text-end sorting_disabled" rowspan="1" colspan="1"
                                            aria-label="Actions">Aksi
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="fw-bold text-gray-600">
                                    @if (count($keranjangs))
                                        <form class="d-flex" action="/keranjang/update" method="post">
                                            @foreach ($keranjangs as $keranjang)
                                                <tr class="odd">
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="symbol symbol-50px">
                                                            </div>
                                                            <div
                                                                class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                                <img src="{{ asset('storage/' . $keranjang->barang->foto) }}"
                                                                    alt="" width="100px">
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="symbol symbol-50px">
                                                            </div>
                                                            <div
                                                                class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                                {{ $keranjang->barang->nama_barang }}</div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="symbol symbol-50px">
                                                            </div>
                                                            <div
                                                                class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                                {{ $keranjang->barang->stock }}</div>
                                                        </div>
                                                    </td>


                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="symbol symbol-50px">
                                                            </div>
                                                            <div
                                                                class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                                Rp
                                                                {{ number_format($keranjang->barang->harga - ($keranjang->barang->harga * $keranjang->barang->diskon) / 100, 0, ',', '.') }}
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        @csrf
                                                        <input type="number" class="form-control px-1" name="kuantitas[]"
                                                            id="kuantitas" value="{{ $keranjang->kuantitas }}"
                                                            min="1" max="{{ $keranjang->barang->stock }}"
                                                            style="width:80px;">
                                                    </td>
                                                    <input type="hidden" value="{{ $keranjang->id }}"
                                                        class="form-control px-1" name="keranjang_id[]">
                                                    <td class="text-end">
                                                        <div class="d-flex">

                                                            <a class="btn btn-sm btn-icon btn-light-primary mb-2 hapus"
                                                                type="submit" title="Hapus"
                                                                data-id="{{ $keranjang->id }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <h5>Belum Memasukan Produk </h5>
                                                </td>
                                            </tr>
                                    @endif
                                </tbody>
                            </table>
                            <button class="btn btn-primary ml-2 text-white" type="submit">Update</button>
                            </form>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <h5>Ringkasan Belanja</h5>
                            </div>
                            <div class="card-body">
                                <table class="w-100">
                                    <tbody>
                                        <tr>
                                            <td>Total</td>
                                            <td class="text-right font-weight-bold">
                                                Rp
                                                {{ number_format($total, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="user_option w-100 d-flex justify-content-center mt-4">
                                    @if (count($keranjangs))
                                        <a href="/checkout" class="order_online"><i class="fa fa-money"></i> checkout</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
@section('script')
    <script>
        $('table').on('click', '.hapus', function() {
            var id = $(this).data('id')
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
                        url: "{{ url('/keranjang') }}/" + id + '/delete',
                        error: function() {
                            Swal.showValidationMessage('Gagal menghapus data')
                            window.location.reload()
                        }
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.', 'success')
                    window.location.reload()

                }
            })
        });
    </script>
@endsection
