@extends('lte.master')

@section('content')
@include ('shared.errors')
<div class="col-sm-8">
            <h2>Data Sarana Produksi dan Distribusi Pangan</h2>
          </div>
          <div class="card">
  <div class="card-header">
<form action="{{ asset("/sarana") }}" method="POST">
     @csrf
     
     <div class="col-md-6">
          <label>Nama Sarana</label>
          <input type="text" name="nama" class="form-control" value="{{old('nama')}}">
     </div>
     <div class="col-md-6">
          <label>Jenis Sarana</label>
          <input type="text" name="jenis" class="form-control" value="{{old('jenis')}}">
     </div>
     <div class="col-md-6">
          <label>Telepon</label>
          <input type="number" name="telepon" class="form-control" value="{{old('telepon')}}" >
     </div>
     
     <div class="col-md-6">
          <label>Alamat Kantor</label>
          <textarea name="alamat_kantor" class="form-control"> {{old('alamat_kantor')}} </textarea>
     </div>
     <div class="col-md-6">
          <label>Alamat Sarana</label>
          <textarea name="alamat_sarana" class="form-control"> {{old('alamat_sarana')}} </textarea>
     </div>
     <div class="col-md-6">
          <label>Nama Pangan</label>
          <input type="text" name="nama_pangan" class="form-control" value="{{old('nama_pangan')}}" >
     </div>
     <div class="col-md-6">
          <label>Merk</label>
          <input type="text" name="merk" class="form-control" value="{{old('merk')}}" >
     </div>
     <div class="col-md-6">
          <label>Penanggungjawab</label>
          <input type="text" name="penanggungjawab" class="form-control" value="{{old('penanggungjawab')}}" >
     </div>


     <div class="col-md-6">
          <label>Keterangan</label>
          <textarea name="keterangan" class="form-control"> {{old('keterangan')}}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
     </div>
</form>
</div>
</div>
@endsection