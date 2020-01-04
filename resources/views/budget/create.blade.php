@extends('lte.master')

@section('content')
@include ('shared.errors')
<form action="{{ asset("/budget") }}" method="POST">
     @csrf
     <div class="col-md-6">
          <label>Kode Anggaran</label>
          <input type="text" name="kode" placeholder="eg: 121837182" class="form-control" value="{{old('kode')}}">
     </div>
     <div class="col-md-6">
          <label>Name</label>
          <input type="text" name="uraian" class="form-control" value="{{old('uraian')}}">
     </div>
     <div class="col-md-6">
          <label>Pagu</label>
          <input type="number" name="pagu" class="form-control" value="{{old('pagu')}}">
     </div>
     <div class="col-md-6">
          <label>Realisasi</label>
          <input type="number" name="realisasi" class="form-control" value="{{old('realisasi')}}" disabled>
     </div>
     <div class="col-md-6">
          <label>Sisa</label>
          <input type="number" name="sisa" class="form-control" value="{{old('sisa')}}" disabled>
     </div>
     <div class="col-md-6">
          <label>Keterangan</label>
          <textarea name="keterangan" class="form-control"> {{old('keterangan')}}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
     </div>
</form>
@endsection