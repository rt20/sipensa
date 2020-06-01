@extends('lte.master')
@section('content')

<div class="col-sm-8">
            <h3>Data Audit Sarana Produksi dan Distribusi Pangan</h3>
          </div>
            
<div class="card">
  <div class="card-header">
<a href="{{ route('audit.create') }}" class="btn btn-primary mb-3">Tambah Audit</a>
<a href="{{ route('export') }}" class="btn btn-success mb-3 ml-4">Ekspor</a>

<table class="table">
     <thead class="thead-light">
          <tr>
               <th scope="col">No</th>
               
               <th scope="col">Surat Tugas</th>
               <th scope="col">Nama Sarana</th>
               <th scope="col">Tgl Audit</th>
               <th scope="col">Lokasi</th>
               <th scope="col" colspan="2">Aksi</th>
          </tr>
     </thead>
     <tbody>
     
          @forelse($data as $row)
          <tr>
          <th>{{ ($data->currentPage()-1) * $data->perPage()+$loop->index+1 }}</th>
               
               <td>{{ $row->surat_tugas }}</td>
               <td>{{ $row->sarana->nama }}</td>
               <td>{{ date('d-M-y', strtotime($row->tgl_audit)) }}</td>
               
               <td>{{ $row->lokasi }}</td>
               <td>
               <a href="{{ route('audit.edit', $row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
               <a href="{{ route('audit.show', $row->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
               <form action="{{ route('audit.destroy', $row->id)}}" 
                                method="post" 
                                class="d-inline">
                                @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm " onclick="return confirm('Apakah anda yakin ?')">
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

