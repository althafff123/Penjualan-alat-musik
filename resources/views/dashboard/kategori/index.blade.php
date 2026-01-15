@extends('dashboard.layouts.main', ['title' => 'Kategori -'])


@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Kategori</h1>
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
                        <div class="card-toolbar">
                            <a href="{{ url('dashboard/kategori/create') }}" class="btn btn-primary"> <i class="fa fa-plus">
                                </i> Tambah</a>

                        </div>

                        <div class="card-title">
                            <form method="GET" action="{{ url('dashboard/kategori/') }}">
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
                                    <input type="text" name="keyword" data-kt-ecommerce-category-filter="search"
                                        autocomplete="off" class="form-control form-control-solid w-250px ps-14"
                                        placeholder="Search Kategori" value="{{ $keyword }}">
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
                                                aria-label="Category: activate to sort column ascending">Kategori</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                                rowspan="1" colspan="1"
                                                aria-label="Category Type: activate to sort column ascending"></th>
                                            <th class="text-end sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="Actions">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-bold text-gray-600">
                                        @foreach ($kategori as $key => $value)
                                            <tr class="odd">
                                                <td>
                                                    <div
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        {{ $kategori->firstItem() + $key }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        <div class="symbol symbol-50px">
                                                        </div>
                                                        <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                            {{ $value->nama_kategori }}</div>
                                                    </div>
                                                </td>
                                                <td>

                                                </td>
                                                <td class="text-end">
                                                    <a class="btn btn-sm btn-icon btn-light-primary mb-2 edit"
                                                        href="{{ url('dashboard/kategori/' . $value->id . '/edit') }}"
                                                        title="Edit">
                                                        <i class="fa fa-pencil-alt"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-icon btn-light-danger mb-2  hapus"
                                                        type="submit" title="Delete" data-id="{{ $value->id }}"><i
                                                            class="fa fa-trash"></i></a>
                                                </td>
                                        @endforeach
                                    </tbody>

                                </table>
                                <div class="pull-right">

                                    {{ $kategori->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
                        url: '{{ url('dashboard/kategori') }}/' + id,
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ @csrf_token() }}'
                        },
                        data: {
                            _method: 'DELETE'
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
