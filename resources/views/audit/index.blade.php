@extends('lte.master')
@section('content')

<a href="{{ route('audit.create') }}" class="btn btn-primary mb-3">Tambah Audit</a>
<a href="{{ route('audit.export') }}" class="btn btn-success mb-3 ml-4">Ekspor</a>

<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">No</th>
               <th scope="col">Anggaran</th>
               <th scope="col">Surat Tugas</th>
               <th scope="col">Nama Sarana</th>
               <th scope="col">Biaya</th>
               <th scope="col">Keterangan</th>
               <th scope="col" colspan="2">Action</th>
          </tr>
     </thead>
     <tbody>
        
          @forelse($data as $row)
          <tr>
          <th>{{ $loop->index +1 }}</th>
               <td>{{ $row->budget->kode }}</td>
               <td>{{ $row->surat_tugas }}</td>
               <td>{{ $row->nm_sarana }}</td>
               <td>{{ $row->biaya }}</td>
               <td>{{ $row->keterangan }}</td>
            
               <td>
                    <a href="{{ route('audit.edit', $row->id) }}" class="btn btn-success">Edit</a>
               </td>
               <td>
                    <form action="{{ route('audit.destroy', $row->id) }}" method="POST">
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

