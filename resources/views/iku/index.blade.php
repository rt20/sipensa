@extends('lte.master')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Indikator Kinerja Unit Kerja</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kinerja</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
<!-- Default box -->
<div class="card">
    <div class="card-header">
        @if(Auth::user()->roles == '["ADMIN"]')
        <a href="{{ route('iku.create') }}" class="btn btn-primary mb-3">Tambah Indikator Kinerja</a>
        @endif
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <!-- <th scope="col">Kode</th> -->
                    <th scope="col">Sasaran Strategis</th>
                    <th scope="col">Indikator Kinerja</th>
                    <th scope="col">Target</th>
                    <th scope="col">Realisasi</th>
                    @if(Auth::user()->roles == '["ADMIN"]')
                    <th scope="col" colspan="2">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <th>{{ ($data->currentPage()-1) * $data->perPage()+$loop->index+1 }}</th>
                    <td>{{ $row->sasaran }}</td>
                    <td>{{ $row->indikator}}</td>
                    <td>{{ $row->target }}</td>
                    <td>{{ $row->realisasi }}</td>
                    @if(Auth::user()->roles == '["ADMIN"]')
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
                    @endif
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>

    <!-- /.card-body -->

    <!-- /.card-footer-->
</div>
{!! $data->render() !!}
    
</section>
@endsection
