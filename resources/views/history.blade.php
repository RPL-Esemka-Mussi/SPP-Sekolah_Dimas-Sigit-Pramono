@extends('mian.navbar')

@section('content')
<table class="table table-bordered table-striped">
    <div class="text-center my-3">
        <h4><b>History Anda</b></h4>
    </div>
    <ul type="none" >
        <li><b>NIS : {{ $siswa->nis }}</b></li>
        <li><b>Nama : {{ $siswa->user->name }}</b></li>
        <li><b>Kelas : {{ $siswa->kelas->kelas }}</b></li>
    </ul>
    <thead>
        <tr>
            <td><b>No</b></td>
            <td><b>Petugas</b></td>
            <td><b>Tanggal</b></td>
            <td><b>Tahun</b></td>
            <td><b>Jumlah Bayar</b></td>
           @cannot('siswa')
           <td><b>Kelola</b></td>
           @endcannot
        </tr>
    </thead>
    <tbody>
        @if ($pembayaran->count() == 0)
            <tr class="text-center">
                <td colspan="7"><b>KOSONG</b></td>
            </tr>
        @else
            @foreach ($pembayaran as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->tanggal_bayar }}</td>
                    <td>{{ $data->spp->tahun }}</td>
                    <td>{{ 'Rp.' . $data->jumlah_bayar }}</td>
                    @cannot('siswa')
                        <td>
                            <a href='{{ url("pembayaran/hapus/$data->id") }}' class="btn btn-danger btn-sm"><i class="bi bi-file-excel"></i></a>
                            <a href='{{ url("pembayaran/edit/$data->id") }}' class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    @endcannot
                </tr>
            @endforeach
        @endif

    </tbody>
</table>
@endsection
