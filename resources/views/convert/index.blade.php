@extends('layouts.calendar')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-0">
            <div class="col-sm-6">
                <h1>Konversi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('convert.index')}}">Konversi</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <form action="{{ route('convert.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-2">Unggah SKI e-BPOM*</div>
                    <div class="col-sm-3"><input type="file" name="ebpom" required></div><br></br>
                </div>
                <div class="row">
                    <div class="col-sm-2">Unggah File INSW*</div>
                    <div class="col-sm-3"><input type="file" name="insw" required></div>
                    <button type="submit" class="btn bg-purple">Unggah</button>
                    <a href="{{ route('convert.export') }}" class="btn btn-success">Unduh</a>
                    <form action="{{ route('convert.destroy', all)}}" method="post" class="d-inline" title="Hapus">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm " onclick="return confirm('Apakah anda yakin ?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                </div>
            </form>
        </div>
    </div>
    <!-- <div class="card">
        <div class="card-header">
        <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Perusahaan</th>
                    <th scope="col">No PIB</th>
                    <th scope="col">Tgl PIB</th>
                    <th scope="col">Tgl SPPB</th>
                    <th scope="col">No Invoice</th>
                    <th scope="col">Tgl Invoice</th>
                    <th scope="col">No SKI</th>
                    <th scope="col">Tgl SKI</th>
                </tr>
            </thead>
            <tbody>
          
            <tr>
           
            <th>0</th>
            <td>1</td>
            <td>2</td>
            <td>3</td>
            <td>4</td>
            <td>5</td>
            <td>6</td>
            <td>7</td>
            <td>8</td>
            </tr>
                
          
                <tr>
                    <td colspan="8">Data tidak ditemukan</td>
                </tr>
               
            </tbody>
        </table>
    </div> -->
        <!-- </div> -->
    <!-- </div> -->
  
</section>

@endsection
