@extends('lte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-9">
                <h1>Surat Tugas</h1>
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Surat Tugas</li>
                </ol>
            </div>  
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
<div class="card">
    <div class="card-header">
    <a href="{{ route('stugas.create') }}" class="btn btn-primary" title="Tambah Surat Tugas"><i class="nav-icon fas fa-plus-circle"></i> </a>
       
        </div>
        <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Surat Tugas</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Biaya</th>
                    
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $row)
                <tr>
                    <th>{{ ($data->currentPage()-1) * $data->perPage()+$loop->index+1 }}</th>
                    <td>{{ $row->no_st }}</td>
                    <td>{{ date('d-M-y', strtotime($row->tgl_st)) }}</td>
                    <td>{{ $row->lokasi }}</td>
                    <td> Rp{{number_format($row->biaya)}}</td>
                    <td>
                    <a href="{{ route('stugas.edit', $row->id) }}" class="btn btn-success btn-sm" title="Ubah">
                            <i class="fa fa-edit"></i></a>
                            <form action="{{ route('stugas.destroy', $row->id)}}" method="post" class="d-inline" title="Hapus">
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
</section>
@endsection
