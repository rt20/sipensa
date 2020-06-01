@extends('lte.master')

@section('content')
@include ('shared.errors')
<div class="col-sm-8">
            <h3>Detail Audit</h3>
          </div>

<div class="card">
  <div class="card-header">


     <div class="container">
  <div class="row">
    <div class="col-sm-2">
    Surat Tugas 
    </div>
     <div class="col-sm-4">
     {{ $audit->surat_tugas }}
    </div>
    </div>
    <div class="row">
     <div class="col-sm-2">
          Tanggal Surat Tugas 
    </div>
     <div class="col-sm-2">
     {{ date('d-M-y', strtotime ($audit->tgl_st)) }}
    </div>
    
  </div>
  <div class="row">
    <div class="col-sm-2"> 
    Kode Anggaran 
    </div>
    <div class="col-sm-10">
   
    {{$audit->budget->kode}} - {{$audit->budget->uraian}}
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2"> 
    Subdit Pengampu 
    </div>
    <div class="col-sm-6">
    {{$audit->subdit->subdit}}
    </div>
    </div>
    
    <div class="row">
    <div class="col-sm-2">  <br>
    Nama Sarana </br>
    </div>
    <div class="col-sm-4">
    <br>
    {{$audit->sarana->nama}}   
   </br>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2"> 
    Jenis Sarana 
    </div>
    <div class="col-sm-2">
    {{$audit->jenis_sarana}}   
          </br>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2">
          Lokasi
    </div>
     <div class="col-sm-4">
     {{ $audit->lokasi }}
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
    Auditor 
    </div>
    <div class="col-sm-4">
    {{$audit->user->name}}  
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2"> 
     
    </div>
    <div class="col-sm-4">
      @foreach($auditor as $a) 
      {{$a}}<br>
      @endforeach  
    </div>
    </div><br>
    <div class="row">
      <div class="col-sm-2"> 
        Jenis Kegiatan
      </div>
      <div class="col-sm-4">
               <input type="hidden"  name="jenis_keg[]" value=" ">
                         <input type="checkbox"  name="jenis_keg[]" value="Pemeriksaan Sarana (Verifikasi/Rutin)" 
                         {{ in_array("Pemeriksaan Sarana (Verifikasi/Rutin)",$audit->jenis_keg)?"checked":""}} 
                         disabled>
                         Pemeriksaan Sarana (Verifikasi/Rutin)
                         <br>
                         <input type="checkbox"  name="jenis_keg[]" value="Pengamanan" 
                         {{ in_array("Pengamanan",$audit->jenis_keg)?"checked":""}}
                         disabled>
                              Pengamanan
                         <br>
                         <input type="checkbox"  name="jenis_keg[]" value="Pemusnahan" 
                         {{ in_array("Pemusnahan",$audit->jenis_keg)?"checked":""}}
                         disabled>
                         Pemusnahan
                         <br>
                         <input type="checkbox" name="jenis_keg[]" value="Pengambilan Sampel" 
                         {{ in_array("Pengambilan Sampel",$audit->jenis_keg)?"checked":""}}
                         disabled>
                         Pengambilan Sampel
                         <br>
                         <input type="checkbox"  name="jenis_keg[]" value="Penelusuran Kasus" 
                         {{ in_array("Penelusuran Kasus",$audit->jenis_keg)?"checked":""}}
                         disabled>
                         Penelusuran Kasus
                         <br>
                         <input type="checkbox" name="jenis_keg[]" value="Sertifikasi CPPOB" 
                         {{ in_array("Sertifikasi CPPOB",$audit->jenis_keg)?"checked":""}}
                         disabled>
                         Sertifikasi CPPOB
                         </div>
                         <div class="col-sm-4">
                         <br>
                         <input type="checkbox"  name="jenis_keg[]" value="Sertifikasi HS" 
                         {{ in_array("Sertifikasi HS",$audit->jenis_keg)?"checked":""}}
                         disabled>
                         Sertifikasi HS
                         <br>
                         <input type="checkbox"  name="jenis_keg[]" value="Izin Produsen BTP"
                         {{ in_array("Izin Produsen BTP",$audit->jenis_keg)?"checked":""}}
                         disabled>
                         Izin Produsen BTP
                         <br>
                         <input type="checkbox"  name="jenis_keg[]" value="Audit dalam Rangka Ekspor" 
                         {{ in_array("Audit dalam Rangka Ekspor",$audit->jenis_keg)?"checked":""}}
                         disabled>
                         Audit dalam Rangka Ekspor
                         <br>
                         <input type="checkbox"  name="jenis_keg[]" value="Surveillan Sertifikasi CPPOB" 
                         {{ in_array("Surveillan Sertifikasi CPPOB",$audit->jenis_keg)?"checked":""}}
                         disabled>
                         Surveillan Sertifikasi CPPOB
                         <br>
                         <!-- <input type="checkbox" name="jenis_keg[]" value="{{old('jenis_kegi')}}" >
                         Lainnya:<input type="text" name="jenis_kegi" class="form-control form-control-sm"> -->
               </div>
               </div>
               <div class="row">
          <div class="col-sm-2"><br>
          Hasil Pemeriksaan 
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
               <input type="hidden"  name="kesimpulan[]" value=" ">
               <input type="checkbox" name="kesimpulan[]" value="TMK Label" 
               {{ in_array("TMK Label",$audit->kesimpulan)?"checked":""}}
               disabled>
               TMK Label
               <br>
               <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tanpa Izin Edar"
               {{ in_array("Tanpa Izin Edar",$audit->kesimpulan)?"checked":""}}
               disabled>
               Tanpa Izin Edar
               <br>
               <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="TMS Produk" 
               {{ in_array("TMS Produk",$audit->kesimpulan)?"checked":""}}
               disabled>
               TMS Produk
               
               </div>
               <div class="col-sm-4">
               
               <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak memiliki SKI" 
               {{ in_array("Tidak memiliki SKI",$audit->kesimpulan)?"checked":""}}
               disabled>
               Tidak memiliki SKI
               <br>
               <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak ada Temuan" 
               {{ in_array("Tidak ada Temuan",$audit->kesimpulan)?"checked":""}}
               disabled>
               Tidak ada Temuan
               <br>
               <!-- <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="{{old('kesi')}}" >
               Lainnya:<input type="text" name="kesi" class="form-control form-control-sm"> -->
          </div>
          </div>
          <div class="row">
          <div class="col-sm-2"> <br>
          Rating Sarana Produksi
          </div>
          <div class="col-sm-8 radio"><br>
          <input type="radio" name="rating_produksi" value="A" @if(old('rating_produksi',$audit->rating_produksi)=="A") checked @endif disabled> A
          <input type="radio" name="rating_produksi" value="B" @if(old('rating_produksi',$audit->rating_produksi)=="B") checked @endif disabled>  B
          <input type="radio" name="rating_produksi" value="C" @if(old('rating_produksi',$audit->rating_produksi)=="C") checked @endif disabled>  C
          <input type="radio" name="rating_produksi" value="D" @if(old('rating_produksi',$audit->rating_produksi)=="D") checked @endif disabled>  D
          </div>
          
          </div>

          <div class="row">
          <div class="col-sm-2"> 
          Rating Sarana Distribusi
          </div>
          <div class="col-sm-8 radio">
          <input type="radio" name="rating_distribusi" value="Baik" @if(old('rating_distribusi',$audit->rating_distribusi)=="Baik") checked @endif disabled> Baik
          <input type="radio" name="rating_distribusi" value="Cukup" @if(old('rating_distribusi',$audit->rating_distribusi)=="Cukup") checked @endif disabled>  Cukup
          <input type="radio" name="rating_distribusi" value="Kurang" @if(old('rating_distribusi',$audit->rating_distribusi)=="Kurang") checked @endif disabled>  Kurang 
    </div>
  </div>
  <div class="row">
          <div class="col-sm-2"> 
          Biaya 
          </div>
          <div class="col-sm-4">
         Rp{{$audit->biaya}},00
          
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
@endsection