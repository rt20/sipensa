@extends('lte.master')
@section('content')

<b>Detail Audit</b>
<br><br>
<div class="table-responsive table-hover">
  <table class="table">
  

  
  
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Surat Tugas</td>
      <td> {{ $audit->surat_tugas }}</td>
    </tr>
    <tr>
    <th scope="row">2</th>
      <td>Kode Anggaran</td>
      <td> {{$audit->budget->kode}}</td>
    </tr>
    <tr>
    <th scope="row">3</th>
      <td>Nama Sarana</td>
      <td> {{ $audit->sarana->nama }}</td>
    </tr>
    <th scope="row">4</th>
      <td>Biaya</td>
      <td>   {{ $audit->biaya }}</td>
    </tr>
    <th scope="row">5</th>
      <td>Keterangan</td>
      <td> {{ $audit->keterangan }}</td>
    </tr>
  </tbody>

  </table>
</div>


<div class="container-fluid">
  <div class="row">
<div class="col-sm-3 col-md-2">Surat Tugas</div>
<div class="col-sm-9 col-md-6">{{ $audit->surat_tugas }}</div>
</div>
<div class="row">
<div class="col-sm-3 col-md-2">Kode Anggaran</div>
<div class="col-sm-9 col-md-6">{{$audit->budget->kode}}</div>
</div>
<div class="row">
<div class="col-sm-3 col-md-2">Nama Sarana</div>
<div class="col-sm-9 col-md-6">{{ $audit->sarana->nama }}</div>
</div>




</div>
@endsection