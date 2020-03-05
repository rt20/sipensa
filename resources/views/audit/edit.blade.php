@extends('lte.master')
@section('content')

<form action="{{ route('audit.update', $audit->id) }}" method="POST">
     @csrf
     {{ method_field("PATCH") }}
     <div class="col-md-6">
          <label>Kode Anggaran</label>
          <select name="budget_id" class="form-control" disabled>
               <option value="">Pilih Anggaran</option>
               @foreach($budget as $budget) 
                    <option value="{{ $budget->id }}" {{ $audit->budget_id == $budget->id ? 'selected' : null }}>{{ $budget->sisa }} - {{ $budget->uraian }} </option>
               @endforeach
          </select>     
     </div>
     <div class="col-md-6">
          <label>Surat Tugas</label>
          <input type="text" name="surat_tugas" class="form-control" value="{{$audit->surat_tugas}}" required>
     </div>
     <div class="col-md-6">
          <label>Nama Sarana</label>
          <select name="sarana_id" class="form-control" disabled>
               <option value="">Pilih Sarana</option>
               @foreach($sarana as $sarana) 
                    <option value="{{ $sarana->id }}" {{ $audit->sarana_id == $sarana->id ? 'selected' : null }}>{{ $sarana->nama }} </option>
               @endforeach
          </select>     
     </div>

    

     
     <div class="col-md-6">
          <label>Biaya</label>
          <input type="number" name="biaya" class="form-control" value="{{$audit->biaya}}" disabled>
     </div>
     
     <div class="col-md-6">
          <label>Keterangan</label>
          <textarea name="keterangan" class="form-control"> {{$audit->keterangan}}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
     </div>
</form>
@endsection