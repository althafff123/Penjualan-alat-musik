@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Alamat'])
@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Alamat
                </h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table" rowspan="1"
                                    colspan="1" aria-label="Category: activate to sort column ascending">Nama Penerima
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Alamat</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Kode Pos</th>
                                <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                    rowspan="1" colspan="1" aria-label="Category: activate to sort column ascending">
                                    Kecamatan</th>
                                <th class="text-end sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($alamats as $alamat)
                                <tr class="odd">

                                    <td>
                                        <div class="d-flex">
                                            <div class="symbol symbol-50px">
                                            </div>
                                            <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                {{ $alamat->nama_penerima }}</div>

                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <div class="symbol symbol-50px">
                                            </div>
                                            <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                {{ $alamat->alamat }}</div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <div class="symbol symbol-50px">
                                            </div>
                                            <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                {{ $alamat->kode_pos }}</div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-flex">
                                            <div class="symbol symbol-50px">
                                            </div>
                                            <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                {{ $alamat->kecamatan->nama_kecamatan }}</div>
                                        </div>
                                    </td>


                                    <td class="text-end">
                                        <a class="btn btn-sm btn-icon btn-light-primary mb-2 edit"
                                            href="{{ url('alamat/' . $alamat->id . '/edit') }}" title="Edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a class="btn btn-sm btn-icon btn-light-primary mb-2 hapus" type="submit"
                                            title="Hapus" data-id="{{ $alamat->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            <a href="{{ url('/alamat/create ') }}" class="btn btn-primary mb-3"> <i class="fa fa-plus">
                                </i> Tambah</a>

                        </tbody>
                    </table>
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
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                preConfirm: () => {
                    return $.ajax({
                        url: '{{ url('alamat') }}/' + id,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                        },
                        data: {
                            _method: 'DELETE'
                        },
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
