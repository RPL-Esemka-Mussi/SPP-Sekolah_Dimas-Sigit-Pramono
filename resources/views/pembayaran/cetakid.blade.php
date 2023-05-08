<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Pembayaran</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="text-center py-3">
        <H3><b>LAPORAN PEMABAYARAN</b></H3>
    </div>
    <div class="container mt-3">

    <ul type="none" >
        <li><b>NIS : {{ $siswa->nis }}</b></li>
        <li><b>Nama : {{ $siswa->user->name }}</b></li>
        <li><b>Kelas : {{ $siswa->kelas->kelas }}</b></li>
    </ul>
        <table class="table table-striped table-bordered mt-3">
            <thead>
                <tr>
                    <td><b>#</b></td>
                    <td><b>Petugas</b></td>
                    <td><b>Tanggal</b></td>
                    <td><b>SPP</b></td>
                    <td><b>Jumlah Bayar</b></td>
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
                        </tr>
                    @endforeach
                @endif

            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>
