@extends('lte.master')

@section('content')

<form action="{{ route('iku.update', $iku->id) }}" method="POST">
     @csrf
     {{ method_field("PATCH") }}
     <div class="col-md-6">
          <label>Kode Indikator Kinerja</label>
          <input type="text" name="kode" placeholder="eg: 121837182" class="form-control" value="{{ $iku->kode }}" required>
     </div>
     <div class="col-md-6">
          <label>Sasaran Kegiatan</label>
          <input type="text" name="sasaran" class="form-control" value="{{$iku->sasaran}}" required>
     </div>
     <div class="col-md-6">
          <label>Target</label>
          <input type="number" name="target" class="form-control" value="{{$iku->target}}"required>
     </div>
     <div class="col-md-6">
          <label>Realisasi</label>
          <input type="number" name="realisasi" class="form-control" value="{{$iku->realisasi}}" disabled>
     </div>
     
     <div class="col-md-6">
          <label>Keterangan</label>
          <textarea name="keterangan" class="form-control"> {{$iku->keterangan}}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
     </div>
</form>
@endsection