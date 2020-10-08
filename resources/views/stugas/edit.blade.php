@extends('lte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Ubah Data Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('stugas.index')}}">Surat Tugas</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section> 
<section class="content">
    <div class="card">
        <div class="card-header">
            <form action="{{ route('stugas.update', $stugas->id) }}" method="POST">
                @csrf
                {{ method_field("PATCH") }}
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            Surat Tugas *
                        </div>
                        <div class="col-sm-2">
                            <input type="text" name="no_st" class="form-control form-control-sm"
                                value="{{old('no_st',$stugas->no_st)}} " required>
                        </div>
                        <div class="col-sm-auto">
                            Tanggal Surat Tugas *
                        </div>
                        <div class="col-sm-auto">
                            <input type="date" name="tgl_st" class="form-control form-control-sm"
                                value="{{ $stugas->tgl_st }}" >
                        </div>
                        <div class="col-sm-auto">
                        Kota/Kabupaten *
                        </div>
                        <div class="col-sm-auto">
                            <input type="text" name="lokasi" placeholder="Kota / Kabupaten"
                                class="form-control form-control-sm" value="{{old('lokasi',$stugas->lokasi)}}" 
                                required>
                        </div>
                    </div>
                    <!-- nggak tau nutup div mana tapi bikin geser bawahnya-->
                    <div class="row">
                        <div class="col-sm-2"> <br>
                            Kode Anggaran *</br>
                        </div>
                        <div class="col-sm-10">
                            <br>
                            <select name="budget_id" class="form-control form-control-sm" disabled required>
                                <option value="">- Pilih Anggaran</option>
                                @foreach($budget as $budget)
                                <option value="{{ $budget->id }}"
                                    {{ $stugas->budget_id == $budget->id ? 'selected' : null }}>{{ $budget->sisa }} -
                                    {{ $budget->uraian }} </option>

                                @endforeach
                            </select> </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            Subdit Pengampu *
                        </div>
                        <div class="col-sm-4">
                            <select name="subdit_id" class="form-control form-control-sm" disabled required>
                                <option value="">- Pilih Subdit</option>
                                @foreach($subdit as $subdit)
                                <option value="{{ $subdit->id }}"
                                    {{ $stugas->subdit_id == $subdit->id ? 'selected' : null }}>{{ $subdit->subdit }}
                                </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="col-sm-auto">
                            Tanggal Pemeriksaan *
                        </div>
                        <div class="col-sm-auto">
                            <input type="date" name="tgl_audit" class="form-control form-control-sm"
                                value="{{ $stugas->tgl_audit }}" >
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-2">
                            Auditor*
                        </div>
                        <div class="col-sm-4">
                        @foreach($users as $user)
                            <select name="user_id[]" class="form-control form-control-sm" disabled required>
                                <option value="">- Pilih Nama Pemeriksa 1</option>
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : null }}>
                                    {{ $user->name }} </option>  
                            </select><br>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            Auditor Tambahan
                        </div>
                        <div class="col-sm-4">

                            <input type="text" name="tambahan" placeholder="Nama Pemeriksa"
                                class="form-control form-control-sm" value="{{old('tambahan',$stugas->tambahan)}}">
                        </div>
                    </div></br>
                    <div class="row">
                        <div class="col-sm-2"> 
                            Biaya 
                        </div>
                        <div class="col-sm-4">
                            <input type="number" name="biaya" class="form-control" value="{{$stugas->biaya}}">
                        </div>
                    </div>
                 
                    <!-- nanti taruh sini -->
                    <div class="col-md-6 mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>

                    </div>
            </form>
        </div>
    </div>
</section>
@endsection