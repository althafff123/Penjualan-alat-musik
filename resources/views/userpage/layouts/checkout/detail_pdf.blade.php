<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pesanan PDF</title>

    <style>
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: sans-serif;
            padding: 1rem 1.5rem;
        }

        .container {
            border: 1px solid black;
            padding: 1rem;
        }

        table {
            width: 100%
        }

        .w-50 {
            width: 50%;
        }

        .w-100 {
            width: 100%;
        }

        table.main {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table.main th,
        table.main td {
            padding: 10zpx;
            background: #EEEEEE;
            text-align: center;
            border-bottom: 1px solid #FFFFFF;
        }

        table.main th {
            white-space: nowrap;
            font-weight: normal;
        }

        table.main td {
            text-align: center;
        }

        table.main td h3 {
            color: #57B223;
            font-size: 1.2em;
            font-weight: normal;
            margin: 0 0 0.2em 0;
        }

        table.main .no {
            color: #FFFFFF;
            font-size: 1.6em;
            background: #57B223;
        }

        table.main .desc {
            text-align: left;
        }

        table.main .unit {
            background: #DDDDDD;
        }

        table.main .total {
            background: #57B223;
            color: #FFFFFF;
        }

        table.main td.unit,
        table.main td.qty,
        table.main td.total {
            font-size: 1.2em;
        }

        table.main tbody tr:last-child td {
            border: none;
        }

        table.main tfoot td {
            padding: 10px 20px;
            background: #FFFFFF;
            border-bottom: none;
            font-size: 1.2em;
            white-space: nowrap;
            border-top: 1px solid #AAAAAA;
        }

        table.main tfoot tr:first-child td {
            border-top: none;
        }

        table.main tfoot tr:last-child td {
            color: #57B223;
            font-size: 1.4em;
            border-top: 1px solid #57B223;

        }

        table.main tfoot tr td:first-child {
            border: none;
        }

        .main,
        .th,
        .tr,
        .td {
            border: 1px solid black
        }

        .tr .td {
            border: 1px solid black
        }

        .tr .th {
            border: 1px solid black
        }
    </style>
    {{-- <link rel="stylesheet" href="{{ public_path('assets/css/style.bundle.css') }}"> --}}
</head>

<body>
    <div class="container">
        <div style="text-align: center; width:100%">
            <img src="assets2/images/Logo.png" width="250">
        </div>
        <table border="0" style="margin-top:1rem">
            <tr>
                <td class="w-50">
                    Di pesan Oleh :
                    <h4>{{ $checkout->alamat->nama_penerima }}</h4>
                    <h4> {{ auth()->user()->no_hp }}</h4>

                </td>
                <td class="w-50">
                    Alamat :
                    <h4>{{ $checkout->alamat->alamat }}, </h4>
                    <h4> {{ $checkout->alamat->kode_pos }}, {{ $checkout->alamat->kecamatan->nama_kecamatan }},
                        Surabaya </h4>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="w-50">
                    <div style="margin: 2rem 0">
                        <div>
                            Ongkos Kirim :
                            <h4> Rp {{ number_format($checkout->pengiriman->ongkir, 0, ',', '.') }}</h4>

                        </div>
                    </div>
                </td>
                <td class="w-50">
                    <div style="margin: 2rem 0">
                        <div>
                            <div>
                                <p style="margin-bottom: 7px">Status :</p>
                                @if ($checkout->status == 1)
                                    <span
                                        style="background-color: blue;color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                        Menunggu Pembayaran
                                    </span>
                                @elseif ($checkout->status == 2)
                                    <span
                                        style="background-color: gray;color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                        Menunggu Konfirmasi
                                    </span>
                                @elseif ($checkout->status == 3)
                                    <span
                                        style="background-color: orange;color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                        Sedang di proses
                                    </span>
                                @elseif ($checkout->status == 4)
                                    <span
                                        style="background-color: rgb(212, 2, 212);color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                        Dikirim
                                    </span>
                                @elseif ($checkout->status == 5)
                                    <span
                                        style="background-color: rgb(2, 195, 2);color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                        selesai
                                    </span>
                                @elseif ($checkout->status == 6)
                                    <span
                                        style="background-color: red;color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                        Gagal
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </td>
                <td class="w-50">
                    <div style="margin: 2rem 0">
                        <div>
                            <div>
                                No Invoice :
                                <h4>#{{ $checkout->no_invoice }}</h4>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>

        <table border="0" cellspacing="0" class="main">
            <thead>
                <tr class="tr">
                    <th class="th">Foto</th>
                    <th class="th">
                        Barang</th>
                    <th class="th">
                        Kuantitas</th>
                    <th class="th">
                        Harga</th>
                </tr>
            </thead>
            <tbody class="fw-bold text-gray-600">
                @foreach ($checkout->pesanans as $pesanan)
                    <tr class="tr">
                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        <img src="{{ public_path('storage/' . $pesanan->barang->foto) }}" alt=""
                                            width="100px">
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        {{ $pesanan->barang->nama_barang }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        {{ $pesanan->kuantitas }}</div>
                                </div>
                            </div>
                        </td>


                        <td class="td">
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
        <h2 class="text-end">
            Total :
            Rp
            {{ number_format($checkout->total_harga, 0, ',', '.') }}
        </h2>
    </div>
</body>

</html>
