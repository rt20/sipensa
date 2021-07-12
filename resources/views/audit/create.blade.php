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
                            </select>
                        </div>
                        <a href="#modalsurat" class="btn btn-primary" title="Tambah Surat Tugas"
                            data-remote="{{ route('stugas.addstugas' ) }}" data-toggle="modal"
                            data-target="#modalsurat">
                            <i class="nav-icon fas fa-plus-circle"></i>
                        </a>
                        <!-- <div class="col-sm-auto">
                            Referensi
                        </div> -->

                        <!-- <div class="col-sm-4">
                            <select name="audit_id" class="select2ref" multiple="multiple" data-placeholder="Pilih referensi audit sebelumnya" style="width: 100%;">
                            </select>
                        </div>
                        <a href="#modalref" class="btn btn-primary" title="Tambah Referensi"
                            data-remote="{{ route('audit.refer' ) }}" data-toggle="modal"
                            data-target="#modalref">
                            <i class="nav-icon fas fa-plus-circle"></i>
                        </a> -->
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            Jenis Sarana *
                        </div>
                        <div class="col-sm-6">
                            <select class="js-example-basic-single" name="jenissarana">
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
                                <!-- <option value="">- Pilih Perusahaan</option> -->
                            </select>
                        </div>
                        <a href="#mymodal" class="btn btn-primary" title="Tambah Sarana"
                            data-remote="{{ route('sarana.addsarana' ) }}" data-toggle="modal" data-target="#mymodal">
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
                            <input type="checkbox" name="jenis_keg[]" value="Uji Coba Tool">
                            Uji Coba Tool
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
                            <input type="checkbox" id="TMK Label" name="kesimpulan[]" value="TMK Label">
                            TMK Label
                            <br>
                            <input type="checkbox" id="Tanpa Izin Edar" name="kesimpulan[]" value="Tanpa Izin Edar">
                            Tanpa Izin Edar
                            <br>
                            <input type="checkbox" id="TMS Produk" name="kesimpulan[]" value="TMS Produk">
                            TMS Produk
                        </div>
                        <div class="col-sm-2">
                            <input type="checkbox" id="Tidak Memiliki SKI" name="kesimpulan[]"
                                value="Tidak Memiliki SKI">
                            Tidak Memiliki SKI
                            <br>
                            <input type="checkbox" id="Mayor" name="kesimpulan[]" value="Mayor">
                            Mayor
                            <br>
                            <input type="checkbox" id="Minor" name="kesimpulan[]" value="Minor">
                            Minor
                            <br>
                        </div>
                        <div class="col-sm-2">
                            <input type="checkbox" id="Kritis Serius" name="kesimpulan[]" value="Kritis Serius">
                            Kritis Serius
                            <br>
                            <input type="checkbox" id="Tidak Ada Temuan" name="kesimpulan[]" value="Tidak Ada Temuan">
                            Tidak Ada Temuan
                            <br>
                            <input type="checkbox" id="MK Sarana" name="kesimpulan[]" value="MK Sarana">
                            MK Sarana
                            <br>
                        </div>
                        <div class="col-sm-2">
                            <input type="checkbox" id="TMK Sarana" name="kesimpulan[]" value="TMK Sarana">
                            TMK Sarana
                            <br>
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
                            <input type="hidden" name="rating_produksi[]" value=" ">
                            <input type="checkbox" name="rating_produksi[]" value="A"> A
                            <input type="checkbox" name="rating_produksi[]" value="B"> B
                            <input type="checkbox" name="rating_produksi[]" value="C"> C
                            <input type="checkbox" name="rating_produksi[]" value="D"> D
                        </div>
                        <div class="col-sm-4 checkbox">
                            <input type="checkbox" name="rating_produksi[]" value="Level I"> Level I
                            <input type="checkbox" name="rating_produksi[]" value="Level II"> Level II
                            <input type="checkbox" name="rating_produksi[]" value="Level III"> Level III
                            <input type="checkbox" name="rating_produksi[]" value="Level IV"> Level IV
                        </div>
                        <div class="col-sm-2 checkbox">
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
                                <option value="Menerima laporan TL CAPA">Menerima laporan TL CAPA </option>
                                <option value="Melakukan evaluasi CAPA">Melakukan evaluasi CAPA</option>
                                <option value="Menyelesaikan audit sarana">Menyelesaikan audit sarana</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="addaudit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</section>
<!-- <div class="modal" id="modalsurat" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->



@endsection
@push('after-script')
<!-- modal di add surat tugas -->
<script>
    jQuery(document).ready(function ($) {
        $('#modalsurat').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
        $('#mymodal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });

</script>

<!-- modal untuk menambah surat tugas -->
<div class="modal" id="modalsurat" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Surat Tugas</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>


<!-- add sarana -->
<div class="modal" id="mymodal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Data Sarana</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
@endpush
