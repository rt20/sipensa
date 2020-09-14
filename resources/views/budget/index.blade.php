@extends('lte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Anggaran</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('budget.index')}}">Anggaran</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('budget.create') }}" class="btn btn-primary mb-3">Tambah Anggaran</a>

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
                        <td>{{ number_format($row->pagu) }}</td>
                        <td>{{ number_format($row->realisasi) }}</td>
                        <td>{{ number_format($row->sisa) }}</td>
                        <td>{{ $row->keterangan }}</td>

                        <td>
                            <a href="{{ route('budget.edit', $row->id) }}" class="btn btn-success btn-sm"><i
                                    class="fa fa-edit"></i></a>
                            <form action="{{ route('budget.destroy', $row->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ?')">
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
