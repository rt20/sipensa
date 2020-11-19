@extends('layouts.calendar')

@section('content')
@include ('shared.errors')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Tambah Audit</h1>
                * harus diisi
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('audit.index')}}">Audit</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <form action="{{ asset("/audit") }}" method="POST">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            Surat Tugas *
                        </div>
                        <div class="col-sm-4">
                            <select name="stugas_id" class="form-control select2" style="width: 100%;">
                                <option value="">- Pilih Surat Tugas</option>
                                @foreach($stugas as $stugas)
                                <option value="{{ $stugas->id }}"
                                    {{ old('stugas_id') == $stugas->id ? 'selected' : null }}>
                                    {{ $stugas->no_st }} | {{ date('d-M-y', strtotime($stugas->tgl_st))}} |
                                    {{ $stugas->lokasi }} </option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('audit.create') }}" class="btn btn-primary" title="Tambah surat tugas"><i
                                    class="nav-icon fas fa-plus-circle"></i> </a>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-2">
                            Jenis Sarana *
                        </div>
                        <div class="col-sm-4">
                            <select name="jenis_sarana" class="form-control select2" style="width: 100%;" required>
                                <option value="">- Pilih Jenis Sarana</option>
                                <option value="Produksi">Sarana Produksi IRTP</option>
                                <option value="Produksi">Sarana Produksi MD</option>
                                <option value="Produksi">Sarana Produksi ML</option>
                                <option value="Distribusi">Sarana Distribusi Importir</option>
                                <option value="Distribusi">Sarana Distribusi Retail</option>
                                <option value="Distribusi">Gudang Distribusi</option>
                                <option value="Produksi & Distribusi">Produksi & Distribusi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><br>
                            Tanggal Audit*
                        </div></br>
                        <div class="col-sm-4"><br>
                            <input type="date" name="tgl_audit" class="form-control form-control-sm"
                                style="width: 100%;" value="{{old('tgl_audit')}}">
                        </div></br>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-2">
                            Nama Perusahaan*
                        </div>
                        <div class="col-sm-4">
                            <select name="sarana_id" class="form-control select2bs4" style="width: 100%;">
                                <option value="">- Pilih Perusahaan</option>
                                @foreach($saranas as $sarana)
                                <option value="{{ $sarana->id }}"
                                    {{ old('sarana_id') == $sarana->id ? 'selected' : null }}>
                                    {{ $sarana->nama }} </option>
                                @endforeach
                            </select>
                        </div>
                        <a href="#mymodal" class="btn btn-primary" title="Tambah Sarana"
                                  data-remote="{{ route('sarana.addsarana' ) }}"
                                  data-toggle="modal"
                                  data-target="#mymodal">
                                  <!-- data-title="Tambah Sarana"> -->
                                  <i class="nav-icon fas fa-plus-circle"></i>
                                </a>
                    </div></br>
                    <div class="row">
                        <div class="col-sm-2">
                            Alamat Sarana
                        </div>
                        <div class="col-sm-4">
                            <textarea name="alamat" class="form-control" required> {{old('alamat')}}</textarea>
                        </div>
                    </div>
                    <div class="card-header">
                    </div>
                    <div class="row">
                        <div class="col-sm-2"> <br>
                            Jenis Kegiatan *</br>
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <input type="hidden" name="jenis_keg[]" value=" ">
                            <input type="checkbox" name="jenis_keg[]" value="Pemeriksaan Sarana (Verifikasi/Rutin)">
                            Pemeriksaan Sarana (Verifikasi/Rutin)
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pengamanan">
                            Pengamanan
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pemusnahan">
                            Pemusnahan
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pengambilan Sampel">
                            Pengambilan Sampel
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Penelusuran Kasus">
                            Penelusuran Kasus
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Sertifikasi CPPOB">
                            Sertifikasi CPPOB
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pemeriksaan Sarana Baru (PSB)">
                            Pemeriksaan Sarana Baru (PSB)
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pembukaan Segel">
                            Pembukaan Segel
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Sertifikasi HS">
                            Sertifikasi HS
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Izin Produsen BTP">
                            Izin Produsen BTP
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Audit dalam Rangka Ekspor">
                            Audit dalam Rangka Ekspor
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Surveillan Sertifikasi CPPOB">
                            Surveillan Sertifikasi CPPOB
                            <br>
                            <!-- <input type="checkbox" name="jenis_keg[]" value="{{old('jenis_keg[]')}}" >
               Lainnya:<input type="text" name="jenis_keg[]" class="form-control form-control-sm"> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><br>
                            Hasil Pemeriksaan / Temuan
                        </div>
                        <div class="col-sm-8"><br>
                            <textarea name="hasil" class="form-control" required> {{old('hasil')}}</textarea></br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            Kesimpulan
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" name="kesimpulan[]" value=" ">
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="TMK Label">
                            TMK Label
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tanpa Izin Edar">
                            Tanpa Izin Edar
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="TMS Produk">
                            TMS Produk
                        </div>
                        <div class="col-sm-2">
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak Memiliki SKI">
                            Tidak Memiliki SKI
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Mayor">
                            Mayor
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Minor">
                            Minor
                            <br>
                        </div>
                        <div class="col-sm-2">
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Kritis Serius">
                            Kritis Serius
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak Ada Temuan">
                            Tidak Ada Temuan
                            <br>
                            <!-- <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="{{old('isikesimpulan')}}" >
          Lainnya:<input type="text" name="isikesimpulan" class="form-control form-control-sm"> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"> <br>
                            Rating Sarana Produksi
                        </div>

                        <div class="col-sm-2"><br>
                            <input type="hidden" name="rating_produksi[]" value=" ">
                            <input type="checkbox" name="rating_produksi[]" value="A"> A
                            <input type="checkbox" name="rating_produksi[]" value="B"> B
                            <input type="checkbox" name="rating_produksi[]" value="C"> C
                            <input type="checkbox" name="rating_produksi[]" value="D"> D
                        </div>
                        <div class="col-sm-4 checkbox"><br>
                            <input type="checkbox" name="rating_produksi[]" value="Level I"> Level I
                            <input type="checkbox" name="rating_produksi[]" value="Level II"> Level II
                            <input type="checkbox" name="rating_produksi[]" value="Level III"> Level III
                            <input type="checkbox" name="rating_produksi[]" value="Level IV"> Level IV
                        </div>
                        <div class="col-sm-2 checkbox"><br>
                            <input type="checkbox" name="rating_produksi[]" value="TDP"> TDP
                            <input type="checkbox" name="rating_produksi[]" value="TTP"> TTP
                        </div>
                        </br>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"> <br>
                            Rating Sarana Distribusi
                        </div>
                        <div class="col-sm-8 radio"><br>
                            <input type="hidden" name="rating_distribusi[]" value=" ">
                            <input type="checkbox" name="rating_distribusi[]" value="Baik"> Baik
                            <input type="checkbox" name="rating_distribusi[]" value="Cukup"> Cukup
                            <input type="checkbox" name="rating_distribusi[]" value="Kurang"> Kurang
                            <input type="checkbox" name="rating_distribusi[]" value="TDP"> TDP
                            <input type="checkbox" name="rating_distribusi[]" value="TTP"> TTP
                        </div>
                        </br>
                    </div>

                    <!-- <input type="hidden" name="status_capa" 
                        class="form-control form-control-sm" value="Ditugaskan melakukan audit" required> -->
                    <div class="row">
                        <div class="col-sm-2">
                            Status
                        </div>
                        <div class="col-sm-4">
                            <select name="status_capa" class="form-control form-control-sm" required>
                                <option value="">- Pilih Status Audit</option>
                                <option value="Ditugaskan melakukan audit">Ditugaskan melakukan audit</option>
                                <option value="Telah melaksanakan audit">Telah melaksanakan audit</option>
                                <option value="Mengirimkan hasil audit ke sarana">Mengirimkan hasil audit ke sarana
                                </option>
                                <option value="Menerima laporan TL CAPA">Menerima laporan TL CAPA </option>
                                <option value="Melakukan evaluasi CAPA">Melakukan evaluasi CAPA</option>
                                <option value="Menyelesaikan audit sarana">Menyelesaikan audit sarana</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</section>
@endsection