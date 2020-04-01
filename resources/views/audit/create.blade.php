@extends('lte.master')

@section('content')
@include ('shared.errors')
<form action="{{ asset("/audit") }}" method="POST">
     @csrf

    

     <div class="container">
  <div class="row">
    <div class="col-sm-2">
    Surat Tugas *
    </div>
     <div class="col-sm-2">
          <input type="text" name="surat_tugas" class="form-control form-control-sm" value="{{old('surat_tugas')}} " required>
    </div>
     <div class="col-sm-auto">
          Tanggal Surat Tugas *
    </div>
     <div class="col-sm-auto">
          <input type="date" name="tgl_st" class="form-control form-control-sm" value="{{old('tgl_st')}} " required>
    </div>
    <div class="col-sm-auto">
          Tujuan *
    </div>
     <div class="col-sm-auto">
         <input type="text" name="lokasi" placeholder="Lokasi Audit" class="form-control form-control-sm" value="{{old('lokasi')}}" required>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2"> <br>
    Kode Anggaran *</br>
    </div>
    <div class="col-sm-10">
    <br>
    <select name="budget_id" class="form-control form-control-sm" required>
               <option value="">- Pilih Anggaran</option>
               @foreach($budgets as $budget) 
                    <option value="{{ $budget->id }}" {{ old('budget_id') == $budget->id ? 'selected' : null }}>{{ $budget->sisa }} - {{ $budget->uraian }}</option>
               @endforeach
          </select> </br>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2"> 
    Subdit Pengampu *
    </div>
    <div class="col-sm-4">
    <select name="subdit_id" class="form-control form-control-sm" required>
               <option value="">- Pilih Subdit</option>
               @foreach($subdits as $subdit) 
                    <option value="{{ $subdit->id }}" {{ old('subdit_id') == $subdit->id ? 'selected' : null }}>{{ $subdit->subdit }} </option>
               @endforeach
          </select>     
    
    </div>
    <div class="col-sm-auto">
          Tanggal Pemeriksaan *
    </div>
     <div class="col-sm-auto">
          <input type="date" name="tgl_audit" class="form-control form-control-sm" value="{{old('tgl_audit')}}" >
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2">  <br>
    Nama Sarana *</br>
    </div>
    <div class="col-sm-4">
    <br>
    <select name="sarana_id" class="form-control form-control-sm" required>
               <option value="">- Pilih Sarana</option>
               @foreach($saranas as $sarana) 
                    <option value="{{ $sarana->id }}" {{ old('sarana_id') == $sarana->id ? 'selected' : null }}>{{ $sarana->nama }} </option>
               @endforeach
          </select></br>
    </div>
    <div class="col-sm-2"> <br>
    Jenis Sarana *</br>
    </div>
    <div class="col-sm-2"><br>
    <select name="jenis_sarana" class="form-control form-control-sm" required>
               <option value="">- Pilih Jenis Sarana</option>
               <option value="Produksi">Produksi</option>
               <option value="Distribusi">Distribusi</option>
          </select>     
          </br>
    </div>
   
    </div>
    <div class="row">
    <div class="col-sm-2"> 
    Auditor 1 *
    </div>
    <div class="col-sm-4">
    <select name="auditor1" class="form-control form-control-sm" required>
               <option value="">- Pilih Nama Pemeriksa</option>
               @foreach($users as $user) 
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : null }}>{{ $user->name }} </option>
               @endforeach
          </select>     
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2"> <br>
    Auditor 2 </br>
    </div>
    <div class="col-sm-4">
    <br>
    <select name="auditor2" class="form-control form-control-sm" >
               <option value="">- Pilih Nama Pemeriksa</option>
               @foreach($users as $user) 
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : null }}>{{ $user->name }} </option>
               @endforeach
          </select>     </br>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2"> 
    Auditor 3
    </div>
    <div class="col-sm-4">
   
    <input type="text" name="auditor3" placeholder="Nama Pemeriksa" class="form-control form-control-sm" value="{{old('auditor3')}}" >
    </div>
    </div>
               <div class="row">
               <div class="col-sm-2"> <br>
               Jenis Kegiatan *</br>
               </div>
               <div class="col-sm-4">
               <br>
               <input type="checkbox"  name="jenis_keg[]" value="Pemeriksaan Sarana (Verifikasi/Rutin)" >
               Pemeriksaan Sarana (Verifikasi/Rutin)
               <br>
               <input type="checkbox"  name="jenis_keg[]" value="Pengamanan" >
                    Pengamanan
               <br>
               <input type="checkbox"  name="jenis_keg[]" value="Pemusnahan" >
               Pemusnahan
               <br>
               <input type="checkbox" name="jenis_keg[]" value="Pengambilan Sampel" >
               Pengambilan Sampel
               <br>
               <input type="checkbox"  name="jenis_keg[]" value="Penelusuran Kasus" >
               Penelusuran Kasus
               <br>
               <input type="checkbox" name="jenis_keg[]" value="Sertifikasi CPPOB" >
               Sertifikasi CPPOB
               </div>
               <div class="col-sm-4">
               <br>
               <input type="checkbox"  name="jenis_keg[]" value="Sertifikasi HS" >
               Sertifikasi HS
               <br>
               <input type="checkbox"  name="jenis_keg[]" value="Izin Produsen BTP" >
               Izin Produsen BTP
               <br>
               <input type="checkbox"  name="jenis_keg[]" value="Audit dalam Rangka Ekspor" >
               Audit dalam Rangka Ekspor
               <br>
               <input type="checkbox"  name="jenis_keg[]" value="Surveillan Sertifikasi CPPOB" >
               Surveillan Sertifikasi CPPOB
               <br>
               <input type="checkbox" name="jenis_keg[]" value="{{old('jenis_kegi')}}" >
               Lainnya:<input type="text" name="jenis_kegi" class="form-control form-control-sm">
               </div>
               </div>
    <div class="row">
    <div class="col-sm-2"><br>
    Hasil Pemeriksaan 
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
    
    <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="TMK Label" >
    TMK Label
   <br>
    <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tanpa Izin Edar" >
    Tanpa Izin Edar
    <br>
    <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="TMS Produk" >
    TMS Produk
   
    </div>
    <div class="col-sm-4">
    
    <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak memiliki SKI" >
    Tidak memiliki SKI
    <br>
    <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="Tidak ada Temuan" >
    Tidak ada Temuan
    <br>
    <input type="checkbox" id="kesimpulan" name="kesimpulan[]" value="{{old('kesi')}}" >
    Lainnya:<input type="text" name="kesi" class="form-control form-control-sm">
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2"> <br>
    Rating Sarana Produksi
    </div>
    <div class="col-sm-8 radio"><br>
  <input type="radio" name="rating_produksi" value="A" > A
  <input type="radio" name="rating_produksi" value="B">  B
  <input type="radio" name="rating_produksi" value="C">  C
  <input type="radio" name="rating_produksi" value="D">  D
</div>
    </br>
    </div>
    <div class="row">
    <div class="col-sm-2"> <br>
    Rating Sarana Distribusi
    </div>
    <div class="col-sm-8 radio"><br>
  <input type="radio" name="rating_distribusi" value="Baik" > Baik
  <input type="radio" name="rating_distribusi" value="Cukup">  Cukup
  <input type="radio" name="rating_distribusi" value="Kurang">  Kurang
  
</div>
    </br>
    </div>
    <div class="row">
    <div class="col-sm-2"> <br>
    Biaya </br>
    </div>
    <div class="col-sm-4">
    <br>
    <input type="number" name="biaya" class="form-control form-control-sm" value="{{old('biaya')}}" ></br>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-2">
    Keterangan 
    </div>
    <div class="col-sm-8">
   
    <textarea name="keterangan" class="form-control"> {{old('keterangan')}}</textarea>
    </div>
    </div>
    
   
     <div class="col-sm-8">
          <button type="submit" class="btn btn-primary">Simpan</button>
     </div>
</form>
<br>
@endsection