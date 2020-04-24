@extends('lte.master')
@section('content')
<div class="col-sm-8">
            <h3>Ubah Data Audit </h3>
          </div>
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
               <div class="col-sm-2">
                    <input type="text" name="surat_tugas" class="form-control form-control-sm" value="{{old('surat_tugas',$audit->surat_tugas)}} "disabled required>
          </div>
          <div class="col-sm-auto">
                    Tanggal Surat Tugas *
          </div>
               <div class="col-sm-auto">
                    <input type="date" name="tgl_st" class="form-control form-control-sm" value="{{ $audit->tgl_st }}"disabled >
               </div>
               <div class="col-sm-auto">
                    Tujuan *
          </div>
               <div class="col-sm-auto">
               <input type="text" name="lokasi" placeholder="Lokasi Audit" class="form-control form-control-sm" value="{{old('lokasi',$audit->lokasi)}}"disabled required>
          </div>
          </div> 
          <!-- nggak tau nutup div mana tapi bikin geser bawahnya-->
          <div class="row">
          <div class="col-sm-2"> <br>
          Kode Anggaran *</br>
          </div>
          <div class="col-sm-10">
          <br>
          <select name="budget_id" class="form-control form-control-sm" disabled required>
                         <option value="">- Pilih Anggaran</option>
                         @foreach($budget as $budget) 
                              <option value="{{ $budget->id }}" {{ $audit->budget_id == $budget->id ? 'selected' : null }}>{{ $budget->sisa }} - {{ $budget->uraian }} </option>
                         
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
                         @foreach($subdit as $subdit) 
                              <option value="{{ $subdit->id }}" {{ $audit->subdit_id == $subdit->id ? 'selected' : null }}>{{ $subdit->subdit }} </option>
                         @endforeach
                    </select>     
          
          </div>
          <div class="col-sm-auto">
                    Tanggal Pemeriksaan *
          </div>
               <div class="col-sm-auto">
                    <input type="date" name="tgl_audit" class="form-control form-control-sm" value="{{ $audit->tgl_audit }}" >
          </div>
          </div>
          <div class="row">
          <div class="col-sm-2">  <br>
          Nama Sarana *</br>
          </div>
          <div class="col-sm-4">
          <br>
          <select name="sarana_id" class="form-control form-control-sm" disabled required>
                         <option value="">- Pilih Sarana</option>
                         @foreach($sarana as $sarana) 
                              <option value="{{ $sarana->id }}" {{ $audit->sarana_id == $sarana->id ? 'selected' : null }}>{{ $sarana->nama }} </option>
                         @endforeach
                    </select>
          </div>
          <div class="col-sm-2"> <br>
          Jenis Sarana *</br>
          </div>
          <div class="col-sm-2"><br>
          <select name="jenis_sarana" class="form-control form-control-sm" disabled required>
                         <!-- <option value="">- Pilih Jenis Sarana</option> -->
                         <option value="{{ $audit->jenis_sarana }}"{{$audit->jenis_sarana ? 'selected':null}}>{{$audit->jenis_sarana}} </option>
                         <option value="Produksi" >Produksi</option>
                         <option value="Distribusi" >Distribusi</option>
                    </select>     
                    </div>
          </div>
          <!-- <div class="row">
          <div class="col-sm-2"> <br>
          Auditor </br>
          </div>
          <div class="col-sm-4">
          <br> 
          @foreach($auditor as $auditor) 
          <div class="form-control form-control-sm">{{ $auditor->name }}</div> 
          <br> 
          @endforeach
          </div>
          </div>
        
          <div class="row">
          <div class="col-sm-2"> 
          Auditor Tambahan
          </div>
          <div class="col-sm-4">
          
          <input type="text" name="auditor3" placeholder="Nama Pemeriksa" class="form-control form-control-sm" value="{{old('auditor3',$audit->auditor3)}}" >
          </div>
          </div> -->

          <!-- nanti taruh sini -->
               <div class="col-md-6 mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
              
  </div>
</form>
</div>
               </div>

@endsection