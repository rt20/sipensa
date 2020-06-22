@extends('lte.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Ubah Data Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('iku.index')}}">Kinerja</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
<div class="card">
    <div class="card-header">
<form action="{{ route('iku.update', $iku->id) }}" method="POST">
     @csrf
     {{ method_field("PATCH") }}
     <!-- <div class="col-md-6">
          <label>Kode Indikator Kinerja</label>
          <input type="text" name="kode" placeholder="eg: 121837182" class="form-control" value="{{ $iku->kode }}" required>
     </div> -->
     <div class="col-md-6">
          <label>Sasaran Kegiatan</label>
          <input type="text" name="sasaran" class="form-control" value="{{$iku->sasaran}}" required>
     </div>
     <div class="col-md-6">
          <label>Indikator Kinerja</label>
          <input type="text" name="indikator" class="form-control" value="{{$iku->indikator}}">         
     </div>
     <div class="col-md-6">
          <label>Target</label>
          <input type="text" name="target" class="form-control" value="{{$iku->target}}"required>
     </div>
     <div class="col-md-6">
          <label>Realisasi</label>
          <input type="number" name="realisasi" class="form-control" value="{{$iku->realisasi}}" disabled>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Simpan</button>
     </div>
</form>
</div>
</div>
</section>
@endsection