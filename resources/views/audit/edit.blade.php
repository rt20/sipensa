@extends('lte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Ubah Data Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('audit.index')}}">Audit</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <form action="{{ route('audit.update', $audit->id) }}" method="POST">
                @csrf
                {{ method_field("PATCH") }}
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            Surat Tugas *
                        </div>

                        <div class="col-sm-4">
                            <select name="stugas_id" class="form-control form-control-sm" disabled required>
                                <option value="">- Pilih Surat Tugas</option>
                                @foreach($stugas as $stugas)
                                <option value="{{ $stugas->no_st | $stugas->lokasi}}" {{$stugas->id ? 'selected':null}}>
                                    {{$stugas->no_st}} | {{ date('d-M-y', strtotime($stugas->tgl_st))}} |
                                    {{ $stugas->lokasi }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            Tanggal Pemeriksaan *
                        </div>
                        <div class="col-sm-2">
                            <input type="date" name="tgl_audit" class="form-control form-control-sm"
                                value="{{ $audit->tgl_audit }}" disabled>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-2"> <br>
                            Nama Sarana *</br>
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <select name="sarana_id" class="form-control form-control-sm" disabled required>
                                <option value="">- Pilih Sarana</option>
                                @foreach($sarana as $sarana)
                                <option value="{{ $sarana->id }}"
                                    {{ $audit->sarana_id == $sarana->id ? 'selected' : null }}>{{ $sarana->nama }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-2"> <br>
                            Jenis Sarana *</br>
                        </div>
                        <div class="col-sm-3"><br>
                            <select name="jenis_sarana" class="form-control form-control-sm" disabled required>
                                <!-- <option value="">- Pilih Jenis Sarana</option> -->
                                <option value="{{ $audit->jenis_sarana }}" {{$audit->jenis_sarana ? 'selected':null}}>
                                    {{$audit->jenis_sarana}} </option>
                                <option value="Produksi">Produksi</option>
                                <option value="Distribusi">Distribusi</option>
                            </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-2">
                            Alamat Sarana
                        </div>
                        <div class="col-sm-4">
                            <textarea name="alamat" class="form-control" required> {{old('alamat',$audit->alamat)}}</textarea>
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
                            <input type="checkbox" name="jenis_keg[]" value="Pemeriksaan Sarana (Verifikasi/Rutin)"
                                {{ in_array("Pemeriksaan Sarana (Verifikasi/Rutin)",$audit->jenis_keg)?"checked":""}}>
                            Pemeriksaan Sarana (Verifikasi/Rutin)
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pengamanan"
                                {{ in_array("Pengamanan",$audit->jenis_keg)?"checked":""}}>
                            Pengamanan
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pemusnahan"
                                {{ in_array("Pemusnahan",$audit->jenis_keg)?"checked":""}}>
                            Pemusnahan
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pengambilan Sampel"
                                {{ in_array("Pengambilan Sampel",$audit->jenis_keg)?"checked":""}}>
                            Pengambilan Sampel
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Penelusuran Kasus"
                                {{ in_array("Penelusuran Kasus",$audit->jenis_keg)?"checked":""}}>
                            Penelusuran Kasus
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Sertifikasi CPPOB"
                                {{ in_array("Sertifikasi CPPOB",$audit->jenis_keg)?"checked":""}}>
                            Sertifikasi CPPOB
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pemeriksaan Sarana Baru (PSB)"
                                {{ in_array("Pemeriksaan Sarana Baru (PSB)",$audit->jenis_keg)?"checked":""}}>
                            Pemeriksaan Sarana Baru (PSB)
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Pembukaan Segel"
                                {{ in_array("Pembukaan Segel",$audit->jenis_keg)?"checked":""}}>
                            Pembukaan Segel
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Sertifikasi HS"
                                {{ in_array("Sertifikasi HS",$audit->jenis_keg)?"checked":""}}>
                            Sertifikasi HS
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Izin Produsen BTP"
                                {{ in_array("Izin Produsen BTP",$audit->jenis_keg)?"checked":""}}>
                            Izin Produsen BTP
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Audit dalam Rangka Ekspor"
                                {{ in_array("Audit dalam Rangka Ekspor",$audit->jenis_keg)?"checked":""}}>
                            Audit dalam Rangka Ekspor
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Surveillan Sertifikasi CPPOB"
                                {{ in_array("Surveillan Sertifikasi CPPOB",$audit->jenis_keg)?"checked":""}}>
                            Surveillan Sertifikasi CPPOB
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Uji Coba Tool"
                                {{ in_array("Uji Coba Tool",$audit->jenis_keg)?"checked":""}}>
                                Uji Coba Tool
                            <br>
                            <!-- <input type="checkbox" name="jenis_keg[]" value="{{old('jenis_kegi')}}" >
                         Lainnya:<input type="text" name="jenis_kegi" class="form-control form-control-sm"> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2"><br>
                            Hasil Pemeriksaan / Temuan
                        </div>
                        <div class="col-sm-8"><br>
                            <textarea name="hasil" class="form-control"
                                required> {{old('hasil', $audit->hasil)}}</textarea></br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            Kesimpulan
                        </div>
                        <div class="col-sm-2">
                            <input type="hidden" name="kesimpulan[]" value=" ">
                            <input type="checkbox" name="kesimpulan[]" value="TMK Label"
                                {{ in_array("TMK Label",$audit->kesimpulan)?"checked":""}}>
                            TMK Label
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tanpa Izin Edar"
                                {{ in_array("Tanpa Izin Edar",$audit->kesimpulan)?"checked":""}}>
                            Tanpa Izin Edar
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="TMS Produk"
                                {{ in_array("TMS Produk",$audit->kesimpulan)?"checked":""}}>
                            TMS Produk

                        </div>
                        <div class="col-sm-2">

                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak Memiliki SKI"
                                {{ in_array("Tidak Memiliki SKI",$audit->kesimpulan)?"checked":""}}>
                            Tidak Memiliki SKI
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Mayor"
                                {{ in_array("Mayor",$audit->kesimpulan)?"checked":""}}>
                            Mayor
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Minor"
                                {{ in_array("Minor",$audit->kesimpulan)?"checked":""}}>
                            Minor
                            <br>
                        </div>
                        <div class="col-sm-2">

                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Kritis Serius"
                                {{ in_array("Kritis Serius",$audit->kesimpulan)?"checked":""}}>
                            Kritis Serius
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak Ada Temuan"
                                {{ in_array("Tidak Ada Temuan",$audit->kesimpulan)?"checked":""}}>
                            Tidak Ada Temuan
                            <br>
                            <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="MK Sarana"
                            {{ in_array("MK Sarana",$audit->kesimpulan)?"checked":""}} >
                        MK Sarana
                        <br>
                    </div>
                    <div class="col-sm-2">
                    <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="TMK Sarana"
                            {{ in_array("TMK Sarana",$audit->kesimpulan)?"checked":""}} >
                        TMK Sarana
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"> <br>
                        </div>
                        <div class="col-sm-2"> <br>
                        <b>MD/ML</b>
                        </div>
                        <div class="col-sm-2"> <br>
                            <b>PIRT</b>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            Rating Sarana Produksi
                        </div>
                      <div class="col-sm-2">
                            <input type="checkbox" name="rating_produksi[]" value="A"
                                {{ in_array("A",$audit->rating_produksi)?"checked":""}}> A
                            <input type="checkbox" name="rating_produksi[]" value="B"
                                {{ in_array("B",$audit->rating_produksi)?"checked":""}}> B
                            <input type="checkbox" name="rating_produksi[]" value="C"
                                {{ in_array("C",$audit->rating_produksi)?"checked":""}}> C
                            <input type="checkbox" name="rating_produksi[]" value="D"
                                {{ in_array("D",$audit->rating_produksi)?"checked":""}}> D
                        </div>

                        <div class="col-sm-4">
                            <input type="checkbox" name="rating_produksi[]" value="Level I"
                                {{ in_array("Level I",$audit->rating_produksi)?"checked":""}}> Level I
                            <input type="checkbox" name="rating_produksi[]" value="Level II"
                                {{ in_array("Level II",$audit->rating_produksi)?"checked":""}}> Level II
                            <input type="checkbox" name="rating_produksi[]" value="Level III"
                                {{ in_array("Level III",$audit->rating_produksi)?"checked":""}}> Level III
                            <input type="checkbox" name="rating_produksi[]" value="Level IV"
                                {{ in_array("Level IV",$audit->rating_produksi)?"checked":""}}> Level IV
                        </div>
                        <div class="col-sm-2 checkbox">
                            <input type="checkbox" name="rating_produksi[]" value="TDP"
                                {{ in_array("TDP",$audit->rating_produksi)?"checked":""}}> TDP
                            <input type="checkbox" name="rating_produksi[]" value="TTP"
                                {{ in_array("TTP",$audit->rating_produksi)?"checked":""}}> TTP
                        </div>
                        </br>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"> <br>
                            Rating Sarana Distribusi
                        </div>
                        <div class="col-sm-8 checkbox"><br>
                            <input type="checkbox" name="rating_distribusi[]" value="Baik"
                                {{ in_array("Baik",$audit->rating_distribusi)?"checked":""}}> Baik
                            <input type="checkbox" name="rating_distribusi[]" value="Cukup"
                                {{ in_array("Cukup",$audit->rating_distribusi)?"checked":""}}> Cukup
                            <input type="checkbox" name="rating_distribusi[]" value="Kurang"
                                {{ in_array("Kurang",$audit->rating_distribusi)?"checked":""}}> Kurang
                            <input type="checkbox" name="rating_distribusi[]" value="TDP"
                                {{ in_array("TDP",$audit->rating_distribusi)?"checked":""}}> TDP
                            <input type="checkbox" name="rating_distribusi[]" value="TTP"
                                {{ in_array("TTP",$audit->rating_distribusi)?"checked":""}}> TTP
                        </div>
                        </br>
                    </div>
<br>

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
                            </select>
                        </div>
                    </div>
                    <!-- nanti taruh sini -->
                    <div class="col-md-6 mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </div>
            </form>
        </div>
    </div>
</section>
@endsection