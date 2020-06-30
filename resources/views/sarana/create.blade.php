@extends('lte.master')

@section('content')
@include ('shared.errors')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Tambah Sarana</h1>
                * harus diisi
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('sarana.index')}}">Sarana</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content"> 
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
</section>
@endsection