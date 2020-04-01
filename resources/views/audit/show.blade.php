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
    <tr>
    <th scope="row">4</th>
      <td>Nama Auditor 1</td>
      <td>
    <select name="auditor1" class="form-control form-control-sm" disabled>
               
               @foreach($users as $user) 
                    <option value="{{ $user->id }}" {{ $audit->auditor1 == $user->id ? 'selected' : null }}>{{ $user->name }} </option>
               @endforeach
          </select>     
          </td>
    </tr>
    <tr>
    <th scope="row">5</th>
    <td>Nama Auditor 2</td>
    <td>
    <select name="auditor1" class="form-control form-control-sm" disabled>
               
               @foreach($users as $user) 
                    <option value="{{ $user->id }}" {{ $audit->auditor2 == $user->id ? 'selected' : null }}>{{ $user->name }} </option>
               @endforeach
          </select>     
          </td>
          </tr>
    <th scope="row">6</th>
      <td>Nama Auditor 3</td>
      <td>
    <select name="auditor1" class="form-control form-control-sm" disabled>
               
               @foreach($users as $user) 
                    <option value="{{ $user->id }}" {{ $audit->auditor3 == $user->id ? 'selected' : null }}>{{ $user->name }} </option>
               @endforeach
          </select>     
          </td>
    </tr>
    <tr>
    <th scope="row">7</th>
      <td>Lokasi</td>
      <td>   {{ $audit->lokasi }}</td>
    </tr>
    
  
    <tr>
    <th scope="row">8</th>
      <td>Hasil Audit</td>
      <td>   {{ $audit->hasil }}</td>
    </tr>
    
    
    <tr>
    <th scope="row">9</th>
      <td>Biaya</td>
      <td>   {{ $audit->biaya }}</td>
    </tr>
    <th scope="row">10</th>
      <td>Keterangan</td>
      <td> {{ $audit->keterangan }}</td>
    </tr>
  </tbody>

  </table>
</div>







</div>
@endsection