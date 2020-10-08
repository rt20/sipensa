@extends('lte.master')

@section('content')
@include ('shared.errors')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Tambah Surat Tugas</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('stugas.index')}}">Surat Tugas</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content"> 
    <div class="card">
        <div class="card-header">
            <!-- <form action="{{ asset("/stugas") }}" method="POST"> -->
            <form action="{{ route('stugas.store')}}" method="post">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            Surat Tugas *
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="no_st" placeholder="Surat Tugas"
                                class="form-control form-control-sm" value="{{old('no_st')}} " required>
                        </div>
                        <div class="col-sm-auto">
                            Tanggal Surat Tugas *
                        </div>
                        <div class="col-sm-auto">
                            <input type="date" name="tgl_st" class="form-control form-control-sm"
                                value="{{old('tgl_st')}} " required>
                        </div>
                        <div class="col-sm-auto">
                            Kota/Kabupaten *
                        </div>
                        <div class="col-sm-auto">
                            <input type="text" name="lokasi" placeholder="Kota / Kabupaten"
                                class="form-control form-control-sm" value="{{old('lokasi')}}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"> <br>
                            Kode Anggaran *</br>
                        </div>
                        <div class="col-sm-10">
                            <br>
                            <select name="budget_id" class="form-control form-control-sm" required>
                                <option value="">- Pilih Anggaran</option>
                                @foreach($budgets as $budget)
                                <option value="{{ $budget->id }}"
                                    {{ old('budget_id') == $budget->id ? 'selected' : null }}>
                                    {{ $budget->sisa }} - {{ $budget->uraian }}</option>
                                @endforeach
                            </select> </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            Subdit Pengampu *
                        </div>
                        <div class="col-sm-4">
                            <select name="subdit_id" class="form-control form-control-sm" required>
                                <option value="">- Pilih Subdit</option>
                                @foreach($subdits as $subdit)
                                <option value="{{ $subdit->id }}"
                                    {{ old('subdit_id') == $subdit->id ? 'selected' : null }}>
                                    {{ $subdit->subdit }} </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-auto">
                            Tanggal Pemeriksaan *
                        </div>
                        <div class="col-sm-auto">
                            <input type="date" name="tgl_audit" class="form-control form-control-sm"
                                value="{{old('tgl_audit')}}">
                        </div>
                    </div>
                   <br>
                    <div class="row">
                        <div class="col-sm-2">
                            Auditor*
                        </div>
                        <div class="col-sm-4">
                            <select name="user_id[]" class="form-control form-control-sm" required>
                                <option value="">- Pilih Nama Pemeriksa 1</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id[]') == $user->id ? 'selected' : null }}>
                                    {{ $user->name }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <select name="user_id[]" class="form-control form-control-sm" >
                                <option value="">- Pilih Nama Pemeriksa 2</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id[]') == $user->id ? 'selected' : null }}>
                                    {{ $user->name }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            Auditor Tambahan
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="tambahan" placeholder="Nama Pemeriksa Tambahan"
                                class="form-control form-control-sm" value="{{old('tambahan')}}">
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-sm-2">                             Biaya 
                        </div>
                        <div class="col-sm-4">
    
                            <input type="number" name="biaya" class="form-control form-control-sm"
                                value="{{old('biaya')}}">
                        </div>
                    </div>
                    
                   
                    <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </form>
        </div>
    </div>
</section>
@endsection