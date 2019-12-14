@extends('lte.master')

@section('content')
@include ('shared.errors')
<form action="/audit" method="POST">
     @csrf
     <div class="col-md-6">
          <label>Anggaran</label>
          <select name="budget_id" class="form-control">
               <option value="">Pilih Anggaran</option>
               @foreach($budgets as $budget) 
                    <option value="{{ $budget->id }}" {{ old('budget_id') == $budget->id ? 'selected' : null }}>{{ $budget->sisa }}         - {{ $budget->uraian }}</option>
               @endforeach
          </select>
     </div>
     <div class="col-md-6">
          <label>Surat Tugas</label>
          <input type="text" name="surat_tugas" class="form-control" value="{{old('surat_tugas')}}">
     </div>
     <div class="col-md-6">
          <label>Nama Sarana</label>
          <select name="sarana_id" class="form-control">
               <option value="">Pilih Sarana</option>
               @foreach($saranas as $sarana) 
                    <option value="{{ $sarana->id }}" {{ old('sarana_id') == $sarana->id ? 'selected' : null }}>{{ $sarana->nama }} </option>
               @endforeach
          </select>
     </div>
     <div class="col-md-6">
          <label>Biaya</label>
          <input type="number" name="biaya" class="form-control" value="{{old('biaya')}}" >
     </div>
     <div class="col-md-6">
          <label>Keterangan</label>
          <textarea name="keterangan" class="form-control"> {{old('keterangan')}}</textarea>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
     </div>
</form>
@endsection