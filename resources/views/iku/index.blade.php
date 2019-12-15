@extends('lte.master')
@section('content')


<a href="{{ route('iku.create') }}" class="btn btn-primary mb-3">Tambah Indikator Kinerja</a>

<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">No</th>
               <th scope="col">Kode</th>
               <th scope="col">Sasaran Kegiatan</th>
               <th scope="col">Target</th>
               <th scope="col">Realisasi</th>
               <th scope="col">Keterangan</th>
               <th scope="col" colspan="2">Action</th>
          </tr>
     </thead>
     <tbody>
     @foreach($data as $row)
          <tr>
          <th>{{ $loop->index +1 }}</th>
               
               <td>{{ $row->kode }}</td>
               <td>{{ $row->sasaran }}</td>
               <td>{{ $row->target }}</td>
               <td>{{ $row->realisasi }}</td>
               <td>{{ $row->keterangan }}</td>
            
               <td>
               
                    <a href="{{ route('iku.edit', $row->id) }}" class="btn btn-success">Ubah</a>
               
               </td>
               <td>
                    <form action="{{ route('iku.destroy', $row->id) }}" method="POST">
                         @csrf
                         {{ method_field('DELETE') }}
                         <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                    
               </td>
          </tr>
          
          @endforeach
     </tbody>
</table>
{!! $data->render() !!}

@endsection

