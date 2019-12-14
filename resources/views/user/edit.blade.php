@extends('lte.master')
@section('content')

<form action="{{ route('user.update', $user->id) }}" method="POST">
     @csrf
     {{ method_field("PATCH") }}
     
     <div class="col-md-6">
          <label>Nama</label>
          <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
     </div>
     <div class="col-md-6">
          <label>NIP/NIK</label>
          <input type="number" name="nip" class="form-control" value="{{$user->nip}}"required>
     </div>
     <div class="col-md-6">
          <label>Jabatan</label>
          <input type="text" name="jabatan" class="form-control" value="{{$user->jabatan}}" required>
     </div>
     <div class="col-md-6">
          <label>Email</label>
          <input type="text" name="email" class="form-control" value="{{$user->email}}" required>
     </div>
     <div class="col-md-6 mt-3">
          <button type="submit" class="btn btn-primary">Save</button>
     </div>
</form>
@endsection