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
                        <form action="/alamat" method="POST" autocomplete="off">
                            @csrf
                            <div class="d-flex mt-4">
                                <label class="col-lg-4">
                                    <h4>Nama Penerima</h4>
                                </label>
                                <input required type="text" class="form-control col-lg-8 mb-0" name="nama_penerima"
                                    placeholder="Pilih Nama Penerima" />
                            </div>
                            @error('nama_penerima')
                                <div class="invalid-feedback d-block mt-0">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="d-flex mt-4">
                                <label class="col-lg-4">
                                    <h4>Alamat</h4>
                                </label>
                                <input required type="text" class="form-control col-lg-8 mb-0" name="alamat"
                                    placeholder="Pilih Alamat" />
                            </div>
                            @error('alamat')
                                <div class="invalid-feedback d-block mt-0">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="hidden" name="redirect" value="{{ request()->redirect }}">
                            <div class="d-flex mt-4">
                                <label class="col-lg-4">
                                    <h4>Kode Pos</h4>
                                </label>
                                <input required type="number" class="form-control col-lg-8 mb-0" name="kode_pos"
                                    placeholder="Pilih Kode Pos" />
                            </div>
                            @error('kode_pos')
                                <div class="invalid-feedback d-block mt-0 offset-lg-4">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="d-flex mt-4">
                                <label class="col-lg-4">
                                    <h4>Kecamatan</h4>
                                </label>
                                <select required class="form-control wide col-lg-8" placeholder="Pilih Kecamatan"
                                    name="kecamatan_id" data-control="select2">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach ($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama_kecamatan }}</option>
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
