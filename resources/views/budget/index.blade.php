@extends('lte.master')
@section('content')

<a href="{{ route('budget.create') }}" class="btn btn-primary mb-3">Tambah anggaran</a>
<!-- <a href="{{ route('budget.export') }}" class="btn btn-success mb-3 ml-4">Export</a> 
<form action="{{ route('budget.import') }}" method="POST" enctype="multipart/form-data">
     @csrf
     <input type="file" name="file">
     <button type="submit" class="btn btn-info">Upload</button>
</form>
-->
<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">No</th>
               <th scope="col">Kode</th>
               <th scope="col">Uraian</th>
               <th scope="col">Pagu</th>
               <th scope="col">Realisasi</th>
               <th scope="col">Sisa</th>
               <th scope="col">Keterangan</th>
               <th scope="col" colspan="2">Action</th>
          </tr>
     </thead>
     <tbody>
     @forelse($data as $row)
          <tr>
          <th>{{ $loop->index +1 }}</th>
               
               <td>{{ $row->kode }}</td>
               <td>{{ $row->uraian }}</td>
               <td>{{ $row->pagu }}</td>
               <td>{{ $row->realisasi }}</td>
               <td>{{ $row->sisa }}</td>
               <td>{{ $row->keterangan }}</td>
            
               <td>
                    <a href="{{ route('budget.edit', $row->id) }}" class="btn btn-success">Edit</a>
               </td>
               <td>
                    <form action="{{ route('budget.destroy', $row->id) }}" method="POST">
                         @csrf
                         {{ method_field('DELETE') }}
                         <button type="submit" class="btn btn-danger">Delete</button>
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
{!! $data->render() !!}

@endsection

