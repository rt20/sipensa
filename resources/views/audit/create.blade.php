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
            <form action="{{ route('audit.store') }}" method="POST">
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
                        <div class="col-sm-auto">
                        <a href="#modalsurat" class="btn btn-primary" title="Tambah Surat Tugas"
                            data-remote="{{ route('stugas.addstugas' ) }}" data-toggle="modal"
                            data-target="#modalsurat">
                            <i class="nav-icon fas fa-plus-circle"></i>
                        </a>
                        </div>
                       
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-sm-2">
                            Referensi
                        </div>
                        <div class="col-sm-4">
                            <select name="auditref[]" class="form-control select2ref" multiple="multiple" style="width: 100%;">
                            <option value="">- Pilih Referensi Audit</option>
                                @foreach($audits as $audit)
                                <option value="{{ $audit->id }}"
                                    {{ old('auditref[]') == $audit->id ? 'selected' : null }}>
                                    {{ $audit->sarana->nama ?? ''}} - {{ date('d M y', strtotime($audit->tgl_audit)) }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            Jenis Sarana *
                        </div>
                        <div class="col-sm-4">
                            <select class="form-control jenissarana" name="jenis_sarana">
                                <option value="">- Pilih Jenis Sarana</option>
                                <option value="Sarana Produksi IRTP">Sarana Produksi IRTP</option>
                                <option value="Sarana Produksi MD">Sarana Produksi MD</option>
                                <option value="Sarana Produksi ML">Sarana Produksi ML</option>
                                <option value="Sarana Distribusi Importir">Sarana Distribusi Importir</option>
                                <option value="Sarana Distribusi Retail">Sarana Distribusi Retail</option>
                                <option value="Gudang Distribusi">Gudang Distribusi</option>
                                <option value="Produksi & Distribusi">Produksi & Distribusi</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"><br>
                            Tanggal Audit*
                        </div></br>
                        <div class="col-sm-4"><br>
                            <input type="date" name="tgl_audit" class="form-control"
                                style="width: 100%;" value="{{old('tgl_audit')}}">
                        </div></br>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-2">
                            Nama Perusahaan*
                        </div>
                        <div class="col-sm-4">
                            <select name="sarana_id" class="form-control select2bs4" style="width: 100%;">
                            </select>
                        </div>
                        <div class="col-sm-auto">
                        <a href="#mymodal" class="btn btn-primary" title="Tambah Sarana"
                            data-remote="{{ route('sarana.addsarana' ) }}" data-toggle="modal" data-target="#mymodal">
                            <i class="nav-icon fas fa-plus-circle"></i>
                        </a>
                        </div>
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
                            <input type="checkbox" name="jenis_keg[]" value="Intensifikasi Pengawasan">
                            Intensifikasi Pengawasan
                            <br>
                            <input type="checkbox" name="jenis_keg[]" value="Post Border">
                            Post Border
                            <br>
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
                            Status*
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




@endsection
@push('after-script')


<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2(
            {
            theme: 'bootstrap4',
            placeholder: 'Pilih Surat Tugas',
            minimumInputLength: 1,
            allowClear: true,
            ajax: {
                    url: '/cari',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                        results:  $.map(data, function (item) {
                            return {
                            text: item.no_st,
                            id: item.id
                            }
                        })
                        };
                    },
                    cache: true
                    }
        }
        )
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Perusahaan',
            minimumInputLength: 1,
            allowClear: true,
            ajax: {
                    url: '/carisarana',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                        results:  $.map(data, function (item) {
                            return {
                            text: item.nama,
                            id: item.id
                            }
                        })
                        };
                    },
                    cache: true
                    }
        })
       

        $('.select2ref').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Referensi Audit',
            allowClear: true,
            minimumInputLength: 1,
        })
        $('.jenissarana').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Jenis Sarana',
            allowClear: true,
         });
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>

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
        // $('#modalref').on('show.bs.modal', function (e) {
        //     var button = $(e.relatedTarget);
        //     var modal = $(this);
        //     modal.find('.modal-body').load(button.data("remote"));
        //     modal.find('.modal-title').html(button.data("title"));
        // });
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

<!-- <div class="modal" id="modalref" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Audit Sebelumnya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <i class="fa fa-spinner fa-spin"></i>
      </div>
     
    </div>
  </div>
</div> -->
@endpush
