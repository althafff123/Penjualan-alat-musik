@extends('dashboard.layouts.main')


@section('container')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="toolbar" id="kt_toolbar">
            <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
                <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
                    data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
                    class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                    <h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Home</h1>
                    <span class="h-20px border-gray-300 border-start mx-4"></span>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                </div>
            </div>
        </div>
        <div class="container mt-5 mb-20">
            <h2 class="mb-4 text-center" style="font-weight: bold">Total Barang & Pembelajaran
            </h2>
            <canvas id="myChart" class="mb-5" height="100px"></canvas>
        </div>

        <div class="container mb-20">
            <h2 class="fw-bolder mb-5" style="font-weight: bold">Master Data
                <i class="fas fa-database fa-1x"></i>
            </h2>
            <div class="row mt-3">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid blue">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/kategori">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: blue">
                                            Total Kategori
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kategori }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tags fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid purple">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/barang">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: purple">
                                            Total Barang
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barang }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-guitar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-5">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid red">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pelatih">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: red">
                                            Total Pelatih
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pelatih }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid orange">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pembelajaran">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: orange">
                                            Total Pembelajaran
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pembelajaran }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tv fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container mb-20">
            <h2 class="fw-bolder mb-5" style="font-weight: bold">Data Pesanan Barang
                <i class="fas fa-money-check-alt fa-1x"></i>
            </h2>
            <div class="row mt-3">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid blue">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan/1">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: blue">
                                            Menunggu Pembayaran
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barangPembayaran }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hourglass-start fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid gray">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan/2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: gray">
                                            Menunggu Konfirmasi
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barangKonfirmasi }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid orange">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan/3">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: orange">
                                            Sedang Di Proses
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barangDiproses }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-undo fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid purple">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan/4">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: purple">
                                            Dikirim
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barangDikirim }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-truck-moving fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid green">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan/5">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: green">
                                            Selesai
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barangSelesai }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid red">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan/6">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: red">
                                            Gagal
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $barangGagal }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-times fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid rgb(36, 208, 231)">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1"
                                        style="color: rgb(36, 208, 231)">
                                        Total Pesanan Barang
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                        {{ number_format($totalpesananbarang, 0, ',', '.') }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-bag fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="container mb-20">
            <h2 class="fw-bolder mb-5" style="font-weight: bold">Data Pesanan Pembelajaran
                <i class="fas fa-tv fa-1x"></i>
            </h2>
            <div class="row mt-3">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid blue">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan_pembelajaran/1">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: blue">
                                            Menunggu Pembayaran
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pembelajaranPembayaran }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hourglass-start fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid gray">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan_pembelajaran/2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: gray">
                                            Menunggu Konfirmasi
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pembelajaranKonfirmasi }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-hourglass-half fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid orange">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan_pembelajaran/3">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: orange">
                                            Perjalanan
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pembelajaranPerjalanan }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-biking fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid purple">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan_pembelajaran/4">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: purple">
                                            Pembelajaran
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pembelajaranPembelajaran }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-tv fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid green">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan_pembelajaran/5">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: green">
                                            Selesai
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pembelajaranSelesai }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-check fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid red">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan_pembelajaran/6">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: red">
                                            Gagal
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pembelajaranGagal }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-times fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid rgb(173, 36, 231)">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1"
                                        style="color: rgb(173, 36, 231)">
                                        Total Pesanan Pembelajaran
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                                        {{ number_format($totalpesananpembelajaran, 0, ',', '.') }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

        <div class="container mb-20">
            <h2 class="fw-bolder mb-5" style="font-weight: bold">Data Rating
                <i class="fas fa-star fa-1x"></i>
            </h2>
            <div class="row mt-3">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid orange">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan_pembelajaran/1">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1" style="color: orange">
                                            Rating
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $rating }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-star fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card shadow h-100 py-2" style="border-left: 4px solid rgb(119, 255, 0)">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <a href="/dashboard/pesanan_pembelajaran/2">
                                        <div class="text-xs font-weight-bold text-uppercase mb-1"
                                            style="color: rgb(119, 255, 0)">
                                            Rating Pembelajaran
                                        </div>
                                    </a>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $ratingPembelajaran }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-star fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="card card-flush">
            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                    <div class="form-group row" style="margin-bottom: 0px;"><label
                            class="col-md-4 col-form-label">Display
                        </label>
                        <div class="col-md-7"><select class="form-control">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select></div>
                    </div>
                </div>

                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                    rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="black"></path>
                            </svg>
                        </span>
                        <input type="text" name="keyword" data-kt-ecommerce-category-filter="search"
                            autocomplete="off" class="form-control form-control-solid w-250px ps-14"
                            placeholder="Search Kategori">
                    </div>
                    </>

                </div>



            </div>
            <div class="card-body pt-0">
                <div id="kt_ecommerce_category_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                            id="kt_ecommerce_category_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            NO
                                        </div>
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Category: activate to sort column ascending">
                                        Nama</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Category Type: activate to sort column ascending">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="kt_ecommerce_category_table"
                                        rowspan="1" colspan="1"
                                        aria-label="Category Type: activate to sort column ascending">No telepon</th>

                                </tr>
                            </thead>
                            <tbody class="fw-bold text-gray-600">
                                @foreach ($users as $key => $user)
                                    <tr class="odd">
                                        <td>
                                            <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                {{ $key + 1 }}
                                            </div>

                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                    {{ $user->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                    <a href="mailto:{{ $user->email }}">
                                                        {{ $user->email }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                    @if (!!$user->no_hp)
                                                        <a href="https://wa.me/+62{{ $user->no_hp }}">
                                                            {{ $user->no_hp }}
                                                        </a>
                                                    @else
                                                        <span class="badge badge-danger">Tidak ada</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                        <div class="pull-right">
                            {{ $users->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        var labelpesanan = {{ Js::from($labelpesanan) }};
        var labelpesanan_pembelajaran = {{ Js::from($labelpesanan_pembelajaran) }};
        var datapesanan = {{ Js::from($datapesanan) }};
        var datapesanan_pembelajaran = {{ Js::from($datapesanan_pembelajaran) }};

        const data = {
            labels: labelpesanan,
            datasets: [{
                    label: 'Total Pesanan Barang',
                    backgroundColor: 'rgb(36, 208, 231)',
                    borderColor: 'rgb(36, 208, 231) ',
                    data: datapesanan,
                },
                {
                    label: 'Total Pesanan Pembelajaran',
                    backgroundColor: 'rgb(173, 36, 231)',
                    borderColor: 'rgb(173, 36, 231)',
                    data: datapesanan_pembelajaran,
                }
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                scale: {
                    ticks: {
                        precision: 0
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config,
        );
    </script>
@endsection
