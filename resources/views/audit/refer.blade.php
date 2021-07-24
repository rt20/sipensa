<table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Surat Tugas</th>
                    <th scope="col">Nama Sarana</th>
                    <th scope="col">Tgl Audit</th>
                    <th scope="col">Lokasi</th>
                   
                    
                </tr>
            </thead>
            <tbody>
                @forelse($data as $row)
                <tr>
                    <th>{{ ($data->currentPage()-1) * $data->perPage()+$loop->index+1 }}</th>
                    <td>{{ $row->stugas_id }}</td>
                    <td>{{ $row->sarana_id }}</td>
                    <td>{{ date('d-M-y', strtotime($row->tgl_audit)) }}</td>
                    <td>{{ $row->alamat }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">Data tidak ditemukan</td>
                </tr>
                @endforelse

            </tbody>
        </table>

        {!! $data->render() !!}