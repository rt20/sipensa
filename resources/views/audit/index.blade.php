@extends('lte.master')
@section('content')

<a href="{{ route('audit.create') }}" class="btn btn-primary mb-3">Tambah Audit</a>
<!--<a href="{{ route('audit.export') }}" class="btn btn-success mb-3 ml-4">Ekspor</a>
-->
<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">No</th>
               
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
          <th>{{ ($data->currentPage()-1) * $data->perPage()+$loop->index+1 }}</th>
               
               <td>{{ $row->surat_tugas }}</td>
               <td>{{ $row->sarana->nama }}</td>
               <td>{{ $row->biaya }}</td>
               <td>{{ $row->keterangan }}</td>
            
               <td>
               <div class="d-flex justify-content-start">
               <small><a class="fa fa-edit px-2 text-dark" href="{{ route('audit.edit', $row->id) }}">
               </a></small>

               <small><a class="fa fa-eye px-2 text-dark" href="{{ route('audit.show', $row->id) }}">
              </a></small>
                    
                   
                    <form action="{{ route('audit.destroy', $row->id) }}" class="p-0" method="POST">
                         @csrf
                         {{ method_field('DELETE') }}
                         <small
                              ><button class="text-dark fa fa-trash p-0 " type="submit"></button>
                        </small>
                    </form>

                    </div>
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

