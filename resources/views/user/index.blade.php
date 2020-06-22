@extends('lte.master')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-9">
                <h1>Data Pegawai</h1>
            </div>
            <div class="col-sm-3">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">

    <div class="card">
        <div class="card-header">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIP/NIK</th>
                        <th scope="col">Jabatan</th>
                        <th scope="col">Email</th>

                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($data as $row)
                    <tr>
                        <th>{{ ($data->currentPage()-1) * $data->perPage()+$loop->index+1 }}</th>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->jabatan }}</td>
                        <td>{{ $row->email }}</td>
                        <td>
                            <a href="{{ route('user.edit', $row->id) }}" class="btn btn-success btn-sm"><i
                                    class="fa fa-edit"></i></a>

                            <form action="{{ route('user.destroy', $row->id)}}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">
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
