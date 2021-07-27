@extends('lte.master')
@section('content')
@include ('shared.errors')
<!-- Content Header (Page header) -->
<section class="content-header" id="header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Detail Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('audit.index')}}">Audit</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content" id="atas">
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        Surat Tugas
                    </div>
                    <div class="col-sm-8">
                        {{$audit->stugas->no_st}} tanggal {{ date('d M y', strtotime($audit->stugas->tgl_st))}} tujuan
                        {{ $audit->stugas->lokasi }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Audit Sebelumnya
                    </div>
                    <div class="col-sm-8">
                        {{$audit->auditref_id }}
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Nama Sarana
                    </div>
                    <div class="col-sm-4">

                        {{$audit->sarana->nama}}

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Jenis Sarana
                    </div>
                    <div class="col-sm-4">
                        {{$audit->jenis_sarana}}
                        </br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Alamat
                    </div>
                    <div class="col-sm-4">
                        {{ $audit->alamat }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Tanggal Pemeriksaan
                    </div>
                    <div class="col-sm-auto">
                        {{date('d-M-y', strtotime($audit->tgl_audit))}}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2">
                        Jenis Kegiatan
                    </div>
                    <div class="col-sm-4">
                        <input type="hidden" name="jenis_keg[]" value=" ">
                        <input type="checkbox" name="jenis_keg[]" value="Pemeriksaan Sarana (Verifikasi/Rutin)"
                            {{ in_array("Pemeriksaan Sarana (Verifikasi/Rutin)",$audit->jenis_keg)?"checked":""}}
                            disabled>
                        Pemeriksaan Sarana (Verifikasi/Rutin)
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Pengamanan"
                            {{ in_array("Pengamanan",$audit->jenis_keg)?"checked":""}} disabled>
                        Pengamanan
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Pemusnahan"
                            {{ in_array("Pemusnahan",$audit->jenis_keg)?"checked":""}} disabled>
                        Pemusnahan
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Pengambilan Sampel"
                            {{ in_array("Pengambilan Sampel",$audit->jenis_keg)?"checked":""}} disabled>
                        Pengambilan Sampel
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Penelusuran Kasus"
                            {{ in_array("Penelusuran Kasus",$audit->jenis_keg)?"checked":""}} disabled>
                        Penelusuran Kasus
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Sertifikasi CPPOB"
                            {{ in_array("Sertifikasi CPPOB",$audit->jenis_keg)?"checked":""}} disabled>
                        Sertifikasi CPPOB
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Pemeriksaan Sarana Baru (PSB)"
                            {{ in_array("Pemeriksaan Sarana Baru (PSB)",$audit->jenis_keg)?"checked":""}} disabled>
                        Pemeriksaan Sarana Baru (PSB)
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Pembukaan Segel"
                            {{ in_array("Pembukaan Segel",$audit->jenis_keg)?"checked":""}} disabled>
                        Pembukaan Segel
                    </div>
                    <div class="col-sm-4">
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Sertifikasi HS"
                            {{ in_array("Sertifikasi HS",$audit->jenis_keg)?"checked":""}} disabled>
                        Sertifikasi HS
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Izin Produsen BTP"
                            {{ in_array("Izin Produsen BTP",$audit->jenis_keg)?"checked":""}} disabled>
                        Izin Produsen BTP
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Audit dalam Rangka Ekspor"
                            {{ in_array("Audit dalam Rangka Ekspor",$audit->jenis_keg)?"checked":""}} disabled>
                        Audit dalam Rangka Ekspor
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Surveillan Sertifikasi CPPOB"
                            {{ in_array("Surveillan Sertifikasi CPPOB",$audit->jenis_keg)?"checked":""}} disabled>
                        Surveillan Sertifikasi CPPOB
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Uji Coba Tool"
                            {{ in_array("Uji Coba Tool",$audit->jenis_keg)?"checked":""}} disabled>
                        Uji Coba Tool
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Intensifikasi Pengawasan"
                            {{ in_array("Intensifikasi Pengawasan",$audit->jenis_keg)?"checked":""}} disabled>
                        Intensifikasi Pengawasan
                        <br>
                        <input type="checkbox" name="jenis_keg[]" value="Post Border"
                            {{ in_array("Post Border",$audit->jenis_keg)?"checked":""}} disabled>
                        Post Border
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"><br>
                        Hasil Pemeriksaan / Temuan
                    </div>
                    <div class="col-sm-8"><br>
                        {{old('hasil', $audit->hasil)}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Kesimpulan
                    </div>
                    <div class="col-sm-2">
                        <input type="hidden" name="kesimpulan[]" value=" ">
                        <input type="checkbox" name="kesimpulan[]" value="TMK Label"
                            {{ in_array("TMK Label",$audit->kesimpulan)?"checked":""}} disabled>
                        TMK Label
                        <br>
                        <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tanpa Izin Edar"
                            {{ in_array("Tanpa Izin Edar",$audit->kesimpulan)?"checked":""}} disabled>
                        Tanpa Izin Edar
                        <br>
                        <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="TMS Produk"
                            {{ in_array("TMS Produk",$audit->kesimpulan)?"checked":""}} disabled>
                        TMS Produk

                    </div>
                    <div class="col-sm-2">

                        <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak Memiliki SKI"
                            {{ in_array("Tidak Memiliki SKI",$audit->kesimpulan)?"checked":""}} disabled>
                        Tidak Memiliki SKI
                        <br>
                        <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Mayor"
                            {{ in_array("Mayor",$audit->kesimpulan)?"checked":""}} disabled>
                        Mayor
                        <br>
                        <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Minor"
                            {{ in_array("Minor",$audit->kesimpulan)?"checked":""}} disabled>
                        Minor
                        <br>
                        <!-- <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="{{old('kesi')}}" >
               Lainnya:<input type="text" name="kesi" class="form-control form-control-sm"> -->
                    </div>
                    <div class="col-sm-2">
                        <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Kritis Serius"
                            {{ in_array("Kritis Serius",$audit->kesimpulan)?"checked":""}} disabled>
                        Kritis Serius
                        <br>
                        <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak Ada Temuan"
                            {{ in_array("Tidak Ada Temuan",$audit->kesimpulan)?"checked":""}} disabled>
                        Tidak Ada Temuan
                        <br>
                        <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="MK Sarana"
                            {{ in_array("MK Sarana",$audit->kesimpulan)?"checked":""}} disabled>
                        MK Sarana
                        <br>
                    </div>
                    <div class="col-sm-2">
                        <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="TMK Sarana"
                            {{ in_array("TMK Sarana",$audit->kesimpulan)?"checked":""}} disabled>
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
                        <input type="hidden" name="rating_produksi[]" value="">
                        <input type="checkbox" name="rating_produksi[]" value="A"
                            {{ in_array("A",$audit->rating_produksi)?"checked":""}} disabled> A
                        <input type="checkbox" name="rating_produksi[]" value="B"
                            {{ in_array("B",$audit->rating_produksi)?"checked":""}} disabled> B
                        <input type="checkbox" name="rating_produksi[]" value="C"
                            {{ in_array("C",$audit->rating_produksi)?"checked":""}} disabled> C
                        <input type="checkbox" name="rating_produksi[]" value="D"
                            {{ in_array("D",$audit->rating_produksi)?"checked":""}} disabled> D
                    </div>
                    <div class="col-sm-3">
                        <input type="checkbox" name="rating_produksi[]" value="Level I"
                            {{ in_array("Level I",$audit->rating_produksi)?"checked":""}} disabled> Level I
                        <input type="checkbox" name="rating_produksi[]" value="Level II"
                            {{ in_array("Level II",$audit->rating_produksi)?"checked":""}} disabled> Level II
                        <input type="checkbox" name="rating_produksi[]" value="Level III"
                            {{ in_array("Level III",$audit->rating_produksi)?"checked":""}} disabled> Level III
                        <input type="checkbox" name="rating_produksi[]" value="Level IV"
                            {{ in_array("Level IV",$audit->rating_produksi)?"checked":""}} disabled> Level IV
                    </div>
                    <div class="col-sm-2">
                        <input type="checkbox" name="rating_produksi[]" value="TDP"
                            {{ in_array("TDP",$audit->rating_produksi)?"checked":""}} disabled> TDP
                        <input type="checkbox" name="rating_produksi[]" value="TTP"
                            {{ in_array("TTP",$audit->rating_produksi)?"checked":""}} disabled> TTP
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Rating Sarana Distribusi
                    </div>
                    <div class="col-sm-8">
                        <input type="hidden" name="rating_distribusi[]" value="">
                        <input type="checkbox" name="rating_distribusi[]" value="Baik"
                            {{ in_array("Baik",$audit->rating_distribusi)?"checked":""}} disabled> Baik
                        <input type="checkbox" name="rating_distribusi[]" value="Cukup"
                            {{ in_array("Cukup",$audit->rating_distribusi)?"checked":""}} disabled> Cukup
                        <input type="checkbox" name="rating_distribusi[]" value="Kurang"
                            {{ in_array("Kurang",$audit->rating_distribusi)?"checked":""}} disabled> Kurang
                        <input type="checkbox" name="rating_distribusi[]" value="Kurang"
                            {{ in_array("TDP",$audit->rating_distribusi)?"checked":""}} disabled> TDP
                        <input type="checkbox" name="rating_distribusi[]" value="Kurang"
                            {{ in_array("TTP",$audit->rating_distribusi)?"checked":""}} disabled> TTP
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        Keterangan
                    </div>
                    <div class="col-sm-8">
                        {{$audit->keterangan}}
                    </div>
                </div>
            </div>
        </div>

</section>
@if($audit->status_capa !== 'Ditugaskan melakukan audit')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h3>Proses Setelah Audit</h3>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <form action="{{ route('audit.status', $audit->id) }}?status='$status'" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-2">
                        Proses *
                    </div>
                    <div class="col-md-6">

                        <select name="status_capa" class="form-control form-control-sm" required>
                            <option value="">- Pilih Status</option>
                            <option value="Ditugaskan melakukan audit">Ditugaskan melakukan audit</option>
                            <option value="Telah melaksanakan audit">Telah melaksanakan audit</option>
                            <option value="Mengirimkan hasil audit ke sarana">Mengirimkan hasil audit ke sarana</option>
                            <option value="Menerima laporan TL CAPA">Menerima laporan TL CAPA </option>
                            <option value="Melakukan evaluasi CAPA">Melakukan evaluasi CAPA</option>
                            <option value="Menyelesaikan audit sarana">Menyelesaikan audit sarana</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2"> <br>
                        Catatan *
                    </div>
                    <div class="col-md-6">
                        </br>
                        <textarea name="deskripsi" class="form-control" required>{{old('deskripsi')}}</textarea>
                    </div>
                </div>
                <div class="col-md-15 mt-3">
                    <button type="submit" class="btn btn-primary">Proses</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h3>Log Audit</h3>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <!-- Timelime example  -->

    <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            <div class="timeline">
                <!-- timeline time label -->
                @foreach ($capa as $object)
                <div class="time-label">
                    <span class="bg-cyan">{{date('d-M-y', strtotime ($object->created_at))}}</span>
                </div>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <div>
                    <i class="fas fa-user bg-green"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i>
                            {{date('d-M-y H:i:s', strtotime ($object->created_at))}}</span>
                        <h3 class="timeline-header"><b>{{$object->user->name}}</b> {{$object->status_capa}}</h3>
                        <div class="timeline-body">
                            {{$object->deskripsi}}
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- END timeline item -->
                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>

    <!-- /.timeline -->
</section>
@else
@endif



@endsection
