@extends('lte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-9">
                <h1>Audit Sarana oleh {{ Auth::user()->name }}</h1>
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Audit</li>
                </ol>
            </div>  
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
<div class="card">
    <div class="card-header">
        <a href="{{ route('audit.create') }}" class="btn btn-primary mb-3">Tambah Audit</a>
        <a href="{{ route('export') }}" class="btn btn-success mb-3 ml-4">Ekspor</a>
        </div>
        <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Sarana</th>
                    <th scope="col">Tgl Audit</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Status</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $row)
                <tr>
                    <th>{{ ($data->currentPage()-1) * $data->perPage()+$loop->index+1 }}</th>
                    <td>{{ $row->sarana->nama }}</td>
                    <td>{{ date('d-M-y', strtotime($row->tgl_audit)) }}</td>
                    <td>{{ $row->lokasi }}</td>
                    <td>
                        @if($row->status_capa == 'Ditugaskan melakukan audit')
                        <span class="badge badge-dark">
                            @elseif($row->status_capa == 'Telah melaksanakan audit')
                            <span class="badge badge-primary">
                                @elseif($row->status_capa == 'Mengirimkan hasil audit ke sarana')
                                <span class="badge badge-danger">
                                    @elseif($row->status_capa == 'Menerima laporan TL CAPA')
                                    <span class="badge badge-warning">
                                        @elseif($row->status_capa == 'Melakukan evaluasi CAPA')
                                        <span class="badge badge-info">
                                            @elseif($row->status_capa == 'Menyelesaikan audit sarana')
                                            <span class="badge badge-success">
                                                @else
                                                <span>
                                                    @endif
                                                    {{ $row->status_capa }}
                                                </span>
                    </td>
                    <td align=right>
                        @if($row->status_capa == 'Ditugaskan melakukan audit')
                        <a href="{{ route('audit.edit', $row->id) }}" class="btn btn-success btn-sm" title="Ubah">
                            <i class="fa fa-edit"></i></a>
                        @endif
                        <a href="{{ route('audit.show', $row->id) }}" class="btn btn-info btn-sm" title="Detail">
                            <i class="fa fa-eye"></i></a>
                        <form action="{{ route('audit.destroy', $row->id)}}" method="post" class="d-inline" title="Hapus">
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
