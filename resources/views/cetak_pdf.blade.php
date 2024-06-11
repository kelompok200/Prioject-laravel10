<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add Bootstrap Data Table css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.10/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@fortawesome/fontawesome-free@latest/css/all.min.css">
    <style>
        .container{
            font-family: 'Times New Roman', Times, serif;
            font-size: 20px;
            float: left;
            display: block;
        }
        table{
            border: solid 1px black;
            width: 100%;
        }th:first-child{
            width: 30px;
            max-width: 100px;
        }tr td{
            border: solid 1px black;
            width: 150px;
            max-width: 200px;
            padding: 4px;
        }tr th{
            border: solid 1px black;
        }
    </style>
</head>
<body>
        <center>
        <h2>Laporan PDF Absensi Karyawan</h2>
        <h3 class="card-title">Absensi Karyawan</h3>
        </center>
                    <div class="container">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">No. </th>
                                <th scope="col">Kode Absensi</th>
                                <th scope="col">Nama Karyawan</th>
                                <th scope="col">Tanggal Absensi</th>
                                <th scope="col">Jam Masuk</th>
                                <th scope="col">Jam Keluar</th>
                                <th scope="col">Jenis Shift</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pdf as $d)
                                <tr>
                                    <th scope="row">{{$no++}}</th>
                                    <td>{{ $d->kode_karyawan}}</th>
                                    <td>{{ $d->nama_karyawan}}</th>
                                    <td>{{ $d->tanggal_absensi}}</th>
                                    <td>{{ $d->jam_masuk}}</th>
                                    <td>{{ $d->jam_keluar}}</th>
                                    <td>{{ $d->jenis_shift}}</th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.10/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
