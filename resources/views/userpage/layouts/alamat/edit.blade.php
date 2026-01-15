@extends('userpage.layouts.main', ['sub' => true], ['title' => 'Tambah | Alamat'])
@section('content')
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Tambah Alamat
                </h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="form_container">
                        <form action="/alamat/{{ $alamat->id }}" method="POST" autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="d-flex">
                                <label class="col-lg-4">
                                    <h4>Nama Penerima</h4>
                                </label>
                                <input type="text" class="form-control col-lg-8" name="nama_penerima"
                                    placeholder="Pilih Nama Penerima" value="{{ $alamat->nama_penerima }}" />
                            </div>
                            <div class="d-flex">
                                <label class="col-lg-4">
                                    <h4>Alamat</h4>
                                </label>
                                <input type="text" class="form-control col-lg-8" name="alamat"
                                    placeholder="Pilih Alamat" value="{{ $alamat->alamat }}" />
                            </div>
                            <div class="d-flex">
                                <label class="col-lg-4">
                                    <h4>Kode Pos</h4>
                                </label>
                                <input type="number" class="form-control col-lg-8" name="kode_pos"
                                    placeholder="Pilih Kode Pos" value="{{ $alamat->kode_pos }}" />
                            </div>
                            <div class="d-flex">
                                <label class="col-lg-4">
                                    <h4>Kecamatan</h4>
                                </label>
                                <select class="form-control wide col-lg-8" placeholder="Pilih Kecamatan" name="kecamatan_id"
                                    data-control="select2">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}"
                                            {{ $alamat->kecamatan_id == $kecamatan->id ? 'selected' : '' }}>
                                            {{ $kecamatan->nama_kecamatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mb-2 me-2">
                                <i class="fa fa-save fs-2 me-2"></i> SAVE</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
