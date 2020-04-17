@extends('lte.master')
@section('content')

<div class="col-sm-8">
<h2>Data Sarana Produksi dan Distribusi Pangan</h2>
          </div>

<div class="card">
  <div class="card-header">
<a href="{{ route('sarana.create') }}" class="btn btn-primary mb-3">Tambah Sarana</a>
<!-- <a href="{{ route('audit.export') }}" class="btn btn-success mb-3 ml-4">Ekspor</a>
-->
<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">No</th>
               <th scope="col">Nama</th>
               <th scope="col">Jenis</th>
               <th scope="col">Telepon</th>
              
             
               
               <th scope="col">Merk</th>
              
               <th scope="col" colspan="2">Action</th>
          </tr>
     </thead>
     <tbody>
        
          @forelse($data as $row)
          <tr>
          <th>{{ $loop->index +1 }}</th>
               <td>{{ $row->nama }}</td>
               <td>{{ $row->jenis }}</td>
               <td>{{ $row->telepon }}</td>
              
              
              
               <td>{{ $row->merk }}</td>
              
           
               <td>
                    <a href="{{ route('sarana.edit', $row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('sarana.destroy', $row->id)}}" 
                                method="post" 
                                class="d-inline">
                                @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                    
                    
               </td> 
          </tr>
          @empty
          <tr>
               <td colspan="8">Data tidak ditemukan</td>
          </tr>
          @endforelse
         
     </tbody>
</table>
</div>
</div>
{!! $data->render() !!}

@endsection

