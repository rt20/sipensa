@extends('lte.master')

@section('content')
@include ('shared.errors')
<form action="/iku" method="POST">
     @csrf
     <div class="col-md-6">
          <label>Kode Indikator</label>
          <input type="text" name="kode" placeholder="eg: 121837182" class="form-control" value="{{old('kode')}}">
     </div>
     <div class="col-md-6">
          <label>Sasaran Kinerja</label>
          <input type="text" name="sasaran" class="form-control" value="{{old('sasaran')}}">
     </div>
     <div class="col-md-6">
          <label>Target</label>
          <input type="number" name="target" class="form-control" value="{{old('target')}}">
     </div>
     <div class="col-md-6">
          <label>Realisasi</label>
          <input type="number" name="realisasi" class="form-control" value="{{old('realisasi')}}" disabled>
     </div>
     
     <div class="col-md-6">
          <label>Keterangan</label>
          <textarea name="keterangan" class="form-control"> {{old('keterangan')}}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
     </div>
</form>
@endsection