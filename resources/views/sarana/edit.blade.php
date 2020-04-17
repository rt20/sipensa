@extends('lte.master')
@section('content')

<form action="{{ route('sarana.update', $sarana->id) }}" method="POST">
     @csrf
     {{ method_field("PATCH") }}
     
     <div class="col-md-6">
          <label>Nama Sarana</label>
          <input type="text" name="nama" class="form-control" value="{{$sarana->nama}}" required>
     </div>
     <div class="col-md-6">
          <label>Jenis Sarana</label>
          <input type="text" name="jenis" class="form-control" value="{{$sarana->jenis}}"required>
     </div>
     <div class="col-md-6">
          <label>Nomor Telepon</label>
          <input type="number" name="telepon" class="form-control" value="{{$sarana->telepon}}">
     </div>
     <div class="col-md-6">
          <label>Alamat Kantor</label>
          <input type="text" name="alamat_kantor" class="form-control" value="{{$sarana->alamat_kantor}}"required>
     </div>
     <div class="col-md-6">
          <label>Alamat Sarana</label>
          <input type="text" name="alamat_sarana" class="form-control" value="{{$sarana->alamat_sarana}}">
     </div>
     <div class="col-md-6">
          <label>Nama Pangan</label>
          <input type="text" name="nama_pangan" class="form-control" value="{{$sarana->nama_pangan}}">
     </div>
     <div class="col-md-6">
          <label>Merk</label>
          <input type="text" name="merk" class="form-control" value="{{$sarana->merk}}">
     </div>
     <div class="col-md-6">
          <label>Penanggungjawab</label>
          <input type="text" name="penanggungjawab" class="form-control" value="{{$sarana->penanggungjawab}}">
     </div>

     <div class="col-md-6">
          <label>Keterangan</label>
          <textarea name="keterangan" class="form-control"> {{$sarana->keterangan}}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
     </div>
</form>
@endsection