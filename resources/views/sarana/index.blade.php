@extends('lte.master')
@section('content')

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
               <th scope="col">Alamat Kantor</th>
               <th scope="col">Alamat Sarana</th>
               <th scope="col">Nama Pangan</th>
               <th scope="col">Merk</th>
               <th scope="col">Penanggungjawab</th>
               <th scope="col">Keterangan</th>
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
               <td>{{ $row->alamat_kantor }}</td>
               <td>{{ $row->alamat_sarana }}</td>
               <td>{{ $row->nama_pangan }}</td>
               <td>{{ $row->merk }}</td>
               <td>{{ $row->penanggungjawab }}</td>
               <td>{{ $row->keterangan }}</td>
           
               <td>
                    <a href="{{ route('sarana.edit', $row->id) }}" class="btn btn-success">Edit</a>
               </td>
                
               <td>
                    <form action="{{ route('sarana.destroy', $row->id) }}" method="POST">
                         @csrf
                         {{ method_field('DELETE') }}
                         <button type="submit" class="btn btn-danger">Hapus</button>
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

