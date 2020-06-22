@extends('lte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-9">
                <h1>Data Pegawai</h1>
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index')}}">Pegawai</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                {{ method_field("PATCH") }}

                <div class="col-md-6">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                </div>
                <div class="col-md-6">
                    <label>NIP/NIK</label>
                    <input type="number" name="nip" class="form-control" value="{{$user->nip}}" required>
                </div>
                <div class="col-md-6">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{$user->jabatan}}" required>
                </div>
                <div class="col-md-6">
                    <label>Subdit</label>
                    <select name="subdit_id" class="form-control">
                        <option value="">Pilih Subdit</option>
                        @foreach($subdit as $subdit)
                        <option value="{{ $subdit->id }}" {{ $user->subdit_id == $subdit->id ? 'selected' : null }}>
                            {{ $subdit->subdit }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{$user->email}}" required>
                </div>
                <div class="col-md-6 mt-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection