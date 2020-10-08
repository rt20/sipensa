@extends('lte.master')

@section('content')
@include ('shared.errors')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Tambah Data Anggaran</h1>
                * harus diisi
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('budget.index')}}">Anggaran</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <form action="{{ asset("/budget") }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label>Kode Anggaran</label>
                    <input type="text" name="kode" placeholder="eg: 121837182" class="form-control"
                        value="{{old('kode')}}">
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
        </div>
    </div>
</section>
@endsection