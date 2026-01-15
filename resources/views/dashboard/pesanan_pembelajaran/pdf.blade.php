<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status PDF</title>

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
            padding: 10px;
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

        <table border="0" cellspacing="0" class="main">
            <thead>
                <tr class="tr">
                    <th class="th">User</th>
                    <th class="th">
                        Nama Pemesan</th>
                    <th class="th">
                        Pembelajaran</th>
                    <th class="th">
                        Tanggal</th>
                    <th class="th">
                        Jam Mulai</th>
                    <th class="th">
                        Jam Selesai</th>
                    <th class="th">
                        Alamat</th>
                    <th class="th">
                        Total Harga</th>
                    <th class="th">
                        Status</th>
                </tr>
            </thead>
            <tbody class="fw-bold text-gray-600">
                @foreach ($checkout_pembelajarans as $key => $checkout_pembelajaran)
                    <tr class="tr">
                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        {{ $checkout_pembelajaran->user->name }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        {{ $checkout_pembelajaran->alamat->nama_penerima }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        {{ $checkout_pembelajaran->pembelajaran->nama_pembelajaran }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        {{ $checkout_pembelajaran->tanggal }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        {{ $checkout_pembelajaran->jam_mulai }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        {{ $checkout_pembelajaran->jam_selesai }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        {{ $checkout_pembelajaran->alamat->alamat }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="td">
                            <div class="d-flex">
                                <div class="symbol symbol-50px">
                                </div>
                                <div class="ms-5">
                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                        @if ($checkout_pembelajaran->status == 1)
                                            <span
                                                style="background-color: blue;color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                                Menunggu Pembayaran
                                            </span>
                                        @elseif ($checkout_pembelajaran->status == 2)
                                            <span
                                                style="background-color: gray;color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                                Menunggu Konfirmasi
                                            </span>
                                        @elseif ($checkout_pembelajaran->status == 3)
                                            <span
                                                style="background-color: orange;color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                                Perjalanan
                                            </span>
                                        @elseif ($checkout_pembelajaran->status == 4)
                                            <span
                                                style="background-color: rgb(212, 2, 212);color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                                Pembelajaran
                                            </span>
                                        @elseif ($checkout_pembelajaran->status == 5)
                                            <span
                                                style="background-color: rgb(2, 195, 2);color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                                selesai
                                            </span>
                                        @elseif ($checkout_pembelajaran->status == 6)
                                            <span
                                                style="background-color: red;color:#FFFFFF; padding: 5px; border-radius: 20px;">
                                                Gagal
                                            </span>
                                        @endif
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
                                        Rp {{ number_format($checkout_pembelajaran->total_harga, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                    @php
                        $total += $checkout_pembelajaran->total_harga;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right">
                        Total Pendapatan
                    </td>
                    <td>
                        <strong>Rp {{ number_format($total, 0, ',', '.') }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
