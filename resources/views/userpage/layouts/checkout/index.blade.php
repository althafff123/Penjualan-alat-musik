@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Checkout'])
@section('content')
    <form method="POST" action="/checkout" class="book_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center mb-5">
                <h2>
                    Checkout
                </h2>
            </div>
            <div class="body container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card border-0">
                            <div class="card-header border-bottom-0 bg-white">
                                <h2>Billing Details</h2>
                            </div>
                            <div class="card-body">
                                <div class="accordion" id="accordionExample">
                                    <div class="card mb-3 border">
                                        <div class="card-header Acme-Regular" id="headingOne">
                                            <div class="mb-0">
                                                <button class="btn btn-block text-left fs-4" type="button"
                                                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    Daftar Alamat
                                                </button>
                                            </div>
                                        </div>

                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <a href="/alamat/create?redirect=/checkout" class="btn btn-primary mb-3"> <i
                                                        class="fa fa-plus">
                                                    </i> Tambah</a>
                                                @foreach ($alamats as $alamat)
                                                    <label
                                                        class="form-check py-2 px-4 rounded border d-flex align-items-center">
                                                        <input class="form-check-input ml-0 position-static mr-4"
                                                            type="radio" name="alamat_id" id="alamat-{{ $alamat->id }}"
                                                            value="{{ $alamat->id }}" required>
                                                        <span class="form-check-label" for="alamat-{{ $alamat->id }}">
                                                            <h4 class="font-weight-bold mb-1">{{ $alamat->nama_penerima }}
                                                            </h4>
                                                            <p class="m-0">{{ $alamat->alamat }},
                                                                {{ $alamat->kode_pos }},
                                                                {{ $alamat->kecamatan->nama_kecamatan }},
                                                                Surabaya
                                                            </p>
                                                        </span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 border">
                                        <div class="card-header Acme-Regular" id="headingTwo">
                                            <div class="mb-0">
                                                <button class="btn btn-block text-left collapsed fs-4" type="button"
                                                    data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                    aria-controls="collapseTwo">
                                                    Pengiriman
                                                </button>
                                            </div>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <div class="billing-address-form">
                                                    <div class="mb-3">
                                                        <label for="">Ekspedia</label>
                                                        <select class="form-select" required name="courier" id="courier"
                                                            required>
                                                            <option value="">-- Pilih Ekspedia --</option>
                                                            <option value="jne">JNE</option>
                                                            <option value="tiki">TIKI</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="">Layanan</label>
                                                        <select class="form-select" required name="layanan" id="layanan"
                                                            required>
                                                            <option value="">-- Pilih Layanan --</option>
                                                        </select>

                                                    </div>
                                                    <input type="hidden" name="ongkir" required />
                                                    <input type="hidden" name="estimasi" required />
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card mb-3 border">
                                        <div class="card-header Acme-Regular" id="headingThree">
                                            <div class="mb-0">
                                                <button class="btn btn-block text-left collapsed fs-4" type="button"
                                                    data-toggle="collapse" data-target="#collapseThree"
                                                    aria-expanded="false" aria-controls="collapseThree">
                                                    Pesanan
                                                </button>
                                            </div>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                            data-parent="#accordionExample">
                                            <div class="card-body">
                                                <table
                                                    class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                                    <thead>
                                                        <tr
                                                            class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_ecommerce_category_table" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Category: activate to sort column ascending">
                                                                Foto
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_ecommerce_category_table" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Category: activate to sort column ascending">
                                                                Barang
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_ecommerce_category_table" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Category: activate to sort column ascending">
                                                                Kuantitas
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_ecommerce_category_table" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Category: activate to sort column ascending">
                                                                Harga
                                                            </th>
                                                        </tr>
                                                    <tbody class="fw-bold text-gray-600">
                                                        @foreach ($keranjangs as $keranjang)
                                                            <tr class="odd">
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="symbol symbol-50px">
                                                                        </div>
                                                                        <div class="ms-5">
                                                                            <div
                                                                                class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                                                <img src="{{ asset('storage/' . $keranjang->barang->foto) }}"
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
                                                                            <div
                                                                                class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                                                {{ $keranjang->barang->nama_barang }}</div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="symbol symbol-50px">
                                                                        </div>
                                                                        <div class="ms-5">
                                                                            <div
                                                                                class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                                                {{ $keranjang->kuantitas }}</div>
                                                                        </div>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <div class="d-flex">
                                                                        <div class="symbol symbol-50px">
                                                                        </div>
                                                                        <div class="ms-5">
                                                                            <div
                                                                                class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                                                Rp
                                                                                {{ number_format($keranjang->barang->harga - ($keranjang->barang->harga * $keranjang->barang->diskon) / 100, 0, ',', '.') }}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 ">
                        <h2 class="mt-3">Detail Pesanan</h2>
                        <div class="card-body">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                <thead>
                                    <th class="sorting text-center fs-4" tabindex="0"
                                        aria-controls="kt_ecommerce_category_table" rowspan="1" colspan="1"
                                        aria-label="Category: activate to sort column ascending">Barang
                                    </th>
                                    <th class="sorting text-center fs-4" tabindex="0"
                                        aria-controls="kt_ecommerce_category_table" rowspan="1" colspan="1"
                                        aria-label="Category: activate to sort column ascending">Harga
                                    </th>
                                    <th class="sorting text-center fs-4" tabindex="0"
                                        aria-controls="kt_ecommerce_category_table" rowspan="1" colspan="1"
                                        aria-label="Category: activate to sort column ascending">
                                        Kuantitas </th>
                                    </tr>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($keranjangs as $keranjang)
                                        <tr class="odd">
                                            <td>
                                                <div class="d-flex">
                                                    <div class="symbol symbol-50px">
                                                    </div>
                                                    <div class="ms-5">
                                                        <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                            {{ $keranjang->barang->nama_barang }}</div>
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
                                                            {{ number_format($keranjang->barang->harga - ($keranjang->barang->harga * $keranjang->barang->diskon) / 100, 0, ',', '.') }}
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
                                                            {{ $keranjang->kuantitas }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="background-color: rgb(241, 241, 241)">
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        Ongkir :</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                                                        id="ongkir">
                                                        0
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        Total :</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
                                                        id="total">
                                                        Rp
                                                        {{ number_format($total, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            @csrf
                            @if (count($keranjangs))
                                <div class="user_option w-100 d-flex justify-content-center mt-4 text-white">
                                    <button type="submit" class="order_online" id="pay-button"><i
                                            class="fa fa-credit-card"></i> Bayar</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('script')
    <script>
        let data = [];
        let total = document.querySelector('#total').innerText.replaceAll("Rp ", "").replaceAll(".", "")
        $('#courier').on('change', function(e) {
            const inp = $('#layanan')
            const ongkir = $('#ongkir')
            inp.prop("disabled", true);
            $.ajax({
                url: "/checkout/cek_ongkir",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    alamat_id: $('[name="alamat_id"]').val(),
                    courier: $('[name="courier"]').val(),
                },
                dataType: 'json',
                success: function(
                    results
                ) {
                    const data = results;
                    inp.empty()
                    inp.append(new Option('-- Pilih Layanan --', ''))
                    data.forEach(cost => {
                        inp.append(new Option(cost.service + ' | ' + cost
                            .description + ' | ' + cost.cost, cost.service));

                        // console.log(cost);
                    })
                    inp.on('change', function(e) {
                        // ongkir.html(cost);
                        const selected = data.find(cost => cost.service == $('#layanan').val());
                        ongkir.html('Rp ' + selected.cost);
                        document.querySelector('[name="ongkir"]').value = selected.cost;
                        document.querySelector('[name="estimasi"]').value = selected
                            .etd;
                        document.querySelector('#total').innerText =
                            'Rp ' + (parseInt(total) + parseInt(selected.cost))
                            .toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    })
                    inp.prop("disabled", false);
                }
            })
        });
    </script>
@endsection
