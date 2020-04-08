@extends('lte.master')

@section('content')
<div class="card">
  <div class="card-header">
<form action="{{ route('budget.update', $budget->id) }}" method="POST">
     @csrf
     {{ method_field("PATCH") }}
     <div class="col-md-6">
          <label>Kode Anggaran</label>
          <input type="text" name="kode" placeholder="eg: 121837182" class="form-control" value="{{ $budget->kode }}" required>
     </div>
     <div class="col-md-6">
          <label>Name</label>
          <input type="text" name="uraian" class="form-control" value="{{$budget->uraian}}" required>
     </div>
     <div class="col-md-6">
          <label>Pagu</label>
          <input type="number" name="pagu" class="form-control" value="{{$budget->pagu}}"required>
     </div>
     <div class="col-md-6">
          <label>Realisasi</label>
          <input type="number" name="realisasi" class="form-control" value="{{$budget->realisasi}}" disabled>
     </div>
     <div class="col-md-6">
          <label>Sisa</label>
          <input type="number" name="sisa" class="form-control" value="{{$budget->sisa}}" disabled>
     </div>
     <div class="col-md-6">
          <label>Keterangan</label>
          <textarea name="keterangan" class="form-control"> {{$budget->keterangan}}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
     </div>
</form>

</div>
@endsection