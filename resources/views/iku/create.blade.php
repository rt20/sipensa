@extends('lte.master')

@section('content')
@include ('shared.errors')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Tambah Data Sasaran Kinerja</h1>
                * harus diisi
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('iku.index')}}">Kinerja</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <form action="/iku" method="POST">
                @csrf
                <!-- <div class="col-md-6">
          <label>Kode Indikator</label>
          <input type="text" name="kode" placeholder="eg: 121837182" class="form-control" value="{{old('kode')}}">
     </div> -->
                <div class="col-md-6">
                    <label>Sasaran Strategis</label>
                    <input type="text" name="sasaran" class="form-control" value="{{old('sasaran')}}">
                </div>
                <div class="col-md-6">
                    <label>Indikator Kinerja</label>
                    <input type="text" name="indikator" class="form-control" value="{{old('indikator')}}">
                </div>
                <div class="col-md-3">
                    <label>Target</label>
                    <input type="text" name="target" class="form-control" value="{{old('target')}}">
                </div>
                <div class="col-md-6">
                    <label>Realisasi</label>
                    <input type="text" name="realisasi" class="form-control" value="{{old('realisasi')}}" disabled>
                </div>
                <div class="col-md-6 mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection