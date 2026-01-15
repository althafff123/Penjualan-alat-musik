@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Checkout Pembelajaran'])
@section('content')
    <form method="POST" action="/checkout-pembelajaran/{{ $pembelajaran->id }}" class="book_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center mb-5">
                <h2>
                    Checkout Pembelajaran
                </h2>
            </div>
            <div class="body container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card border-0">
                            <div class="card-header border-bottom-0 bg-white">
                                <h2>Booking Details</h2>
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
                                                <a href="/alamat/create?redirect=/checkout_pembelajaran/{{ $id }}"
                                                    class="btn btn-primary mb-3"> <i class="fa fa-plus">
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
                                                    Tanggal dan Jam
                                                </button>
                                            </div>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                            data-parent="#accordionExample">
                                            <div class="card-body">

                                                <div class="col-md-6 form-group"><label>Tanggal Pembelajaran</label>
                                                    <div>
                                                        <input placeholder="Pilih Tanggal" type="text" name="tanggal"
                                                            required class="form-control flatpickr-input tanggal">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group"><label>Jam Mulai Pembelajaran</label>
                                                    <div>
                                                        <select class="form-select" data-placeholder="Pilih Waktu"
                                                            name="jam_mulai" required disabled>
                                                            <option value="">-- Pilih Jam --</option>
                                                            <option value="05:00:00">Jam 5 Pagi</option>
                                                            <option value="06:00:00">Jam 6 Pagi</option>
                                                            <option value="07:00:00">Jam 7 Pagi</option>
                                                            <option value="08:00:00">Jam 8 Pagi</option>
                                                            <option value="09:00:00">Jam 9 Pagi</option>
                                                            <option value="10:00:00">Jam 10 Pagi</option>
                                                            <option value="11:00:00">Jam 11 Pagi</option>
                                                            <option value="12:00:00">Jam 12 Siang</option>
                                                            <option value="13:00:00">Jam 13 Siang</option>
                                                            <option value="14:00:00">Jam 14 Siang</option>
                                                            <option value="15:00:00">Jam 15 Siang</option>
                                                            <option value="16:00:00">Jam 16 Sore</option>
                                                            <option value="17:00:00">Jam 17 Sore</option>
                                                            <option value="18:00:00">Jam 18 Sore</option>
                                                            <option value="19:00:00">Jam 19 Malam</option>
                                                            <option value="20:00:00">Jam 20 Malam</option>
                                                            <option value="21:00:00">Jam 21 Malam</option>
                                                            <option value="22:00:00">Jam 22 Malam</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6 form-group"><label>Jam Selesai Pembelajaran</label>
                                                    <div>
                                                        <select class="form-select" data-placeholder="Pilih Waktu"
                                                            name="jam_selesai" required disabled>
                                                            <option value="">-- Pilih Jam --</option>
                                                            <option value="05:00:00">Jam 5 Pagi</option>
                                                            <option value="06:00:00">Jam 6 Pagi</option>
                                                            <option value="07:00:00">Jam 7 Pagi</option>
                                                            <option value="08:00:00">Jam 8 Pagi</option>
                                                            <option value="09:00:00">Jam 9 Pagi</option>
                                                            <option value="10:00:00">Jam 10 Pagi</option>
                                                            <option value="11:00:00">Jam 11 Pagi</option>
                                                            <option value="12:00:00">Jam 12 Siang</option>
                                                            <option value="13:00:00">Jam 13 Siang</option>
                                                            <option value="14:00:00">Jam 14 Siang</option>
                                                            <option value="15:00:00">Jam 15 Siang</option>
                                                            <option value="16:00:00">Jam 16 Sore</option>
                                                            <option value="17:00:00">Jam 17 Sore</option>
                                                            <option value="18:00:00">Jam 18 Sore</option>
                                                            <option value="19:00:00">Jam 19 Malam</option>
                                                            <option value="20:00:00">Jam 20 Malam</option>
                                                            <option value="21:00:00">Jam 21 Malam</option>
                                                            <option value="22:00:00">Jam 22 Malam</option>

                                                        </select>
                                                    </div>
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
                                                                Pelatih</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_ecommerce_category_table" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Category: activate to sort column ascending">
                                                                Nama
                                                                Pelatih</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_ecommerce_category_table" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Category: activate to sort column ascending">
                                                                Kategori</th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_ecommerce_category_table" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Category: activate to sort column ascending">
                                                                Diskon
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="kt_ecommerce_category_table" rowspan="1"
                                                                colspan="1"
                                                                aria-label="Category: activate to sort column ascending">
                                                                Tarif
                                                            </th>
                                                        </tr>
                                                    <tbody class="fw-bold text-gray-600">
                                                        <tr class="odd">
                                                            <td>
                                                                <div class="d-flex">
                                                                    <div class="symbol symbol-50px">
                                                                    </div>
                                                                    <div class="ms-5">
                                                                        <img src="{{ asset('storage/' . $pembelajaran->pelatih->foto) }}"
                                                                            alt="" width="100px">
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
                                                                            {{ $pembelajaran->pelatih->nama_pelatih }}
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
                                                                            {{ $pembelajaran->kategori->nama_kategori }}
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
                                                                            @if (!!$pembelajaran->diskon)
                                                                                {{ $pembelajaran->diskon }}%
                                                                            @else
                                                                                <span class="badge badge-danger">Tidak
                                                                                    ada</span>
                                                                            @endif
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
                                                                            {{ number_format($pembelajaran->tarif, 0, ',', '.') }}
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </td>

                                                            </td>
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

                    <div class="col-md-4">
                        <h2 class="mt-3">Detail Pesanan</h2>
                        <div class="card-body">
                            <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                <thead>
                                    <th class="sorting text-center fs-4" tabindex="0"
                                        aria-controls="kt_ecommerce_category_table" rowspan="1" colspan="1"
                                        aria-label="Category: activate to sort column ascending">Pembelajaran
                                    </th>
                                    <th class="sorting text-center fs-4" tabindex="0"
                                        aria-controls="kt_ecommerce_category_table" rowspan="1" colspan="1"
                                        aria-label="Category: activate to sort column ascending">Harga
                                    </th>
                                    </tr>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr class="odd">
                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        {{ $pembelajaran->nama_pembelajaran }}</div>
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
                                                        @php
                                                            $harga = $pembelajaran->tarif - ($pembelajaran->tarif * $pembelajaran->diskon) / 100;
                                                        @endphp
                                                        {{ number_format($harga, 0, ',', '.') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot style="background-color: rgb(241, 241, 241)">
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1">
                                                        Tanggal & Jam :</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td colspan="2">
                                            <div class="d-flex">
                                                <div class="symbol symbol-50px">
                                                </div>
                                                <div class="ms-5">
                                                    <div
                                                        class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1 text-time">
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
                                                    <div class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1 text-total"
                                                        id="total">
                                                        Rp
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            @csrf
                            <div class="user_option w-100 d-flex justify-content-center mt-4 text-white">
                                <button type="submit" class="order_online" id="pay-button"><i
                                        class="fa fa-credit-card"></i> Bayar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('script')
    <script>
        // $('.flatpickr-input.jam').flatpickr({
        //     enableTime: true,
        //     noCalendar: true,
        //     dateFormat: "H",
        //     time_24hr: true,
        // });

        $('.flatpickr-input.tanggal').flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            minDate: "today",
            onChange: function(selectedDates, dateStr, instance) {
                document.querySelector('[name="jam_mulai"]').disabled = false;
                document.querySelector('[name="jam_selesai"]').disabled = false;
                const jam_mulai = parseInt(document.querySelector('[name="jam_mulai"]').value.split(':')[0]);
                const jam_selesai = parseInt(document.querySelector('[name="jam_selesai"]').value.split(':')[
                    0]);

                document.querySelector('.text-time').innerText = `${dateStr} | ${jam_selesai - jam_mulai} jam`;

                if (selectedDates[0].toDateString() == new Date().toDateString()) {
                    const now = new Date().getHours() + 1;
                    document.querySelectorAll('[name="jam_mulai"] option').forEach((opt, index) => {
                        const value = parseInt(opt.value.split(':')[0])
                        if (value <= now) {
                            opt.disabled = true;
                        }
                    })
                } else {
                    document.querySelectorAll('[name="jam_mulai"] option').forEach((opt, index) => {
                        const value = parseInt(opt.value.split(':')[0])
                        opt.disabled = false;
                    })
                }
            },
        });

        document.querySelector('[name="jam_mulai"]').addEventListener('change', function() {
            const jam_mulai = parseInt(this.value.split(':')[0]);
            document.querySelector('[name="jam_selesai"]').value = '';
            document.querySelectorAll('[name="jam_selesai"] option').forEach((opt, index) => {
                const value = parseInt(opt.value.split(':')[0])
                if (value <= jam_mulai) {
                    opt.disabled = true;
                }
            })
            // const tanggal = document.querySelector('[name="tanggal"]').value;
            // const jam_selesai = parseInt(document.querySelector('[name="jam_selesai"]').value.split(':')[0]);
            // const jam_mulai = parseInt(this.value.split(':')[0]);

            // document.querySelector('.text-time').innerText = `${tanggal} | ${jam_selesai - jam_mulai} jam`;
            // document.querySelector('.text-total').innerText =
            //     `Rp ${(jam_selesai - jam_mulai) * '{{ $harga }}'}`;
        });
        document.querySelector('[name="jam_selesai"]').addEventListener('change', function() {
            const tanggal = document.querySelector('[name="tanggal"]').value;
            const jam_mulai = parseInt(document.querySelector('[name="jam_mulai"]').value.split(':')[0]);
            const jam_selesai = parseInt(this.value.split(':')[0]);

            document.querySelector('.text-time').innerText = `${tanggal} | ${jam_selesai - jam_mulai} jam`;
            let total = (jam_selesai - jam_mulai) * '{{ $harga }}';
            total = Intl.NumberFormat('id-ID').format(total);
            document.querySelector('.text-total').innerText =
                `Rp ${total}`;
        });
    </script>
@endsection
