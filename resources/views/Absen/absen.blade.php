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
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Absensi Karyawan</h3>
                </div>
                <div class="card-body">
                <a href="{{url('cetak-pdf')}}" class="btn btn-primary mb-3">Cetak PDF</a>
                {{-- <a href="{{url('cetak-excel')}}" class="btn btn-primary mb-3">Cetak Excel</a> --}}
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                              <th scope="col">No. </th>
                              <th scope="col">Kode Karyawan</th>
                              <th scope="col">Nama Karyawan</th>
                              <th scope="col">Tanggal Absensi</th>
                              <th scope="col">Jam Masuk</th>
                              <th scope="col">Jam Keluar</th>
                              <th scope="col">Jenis Shift</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                    <tr>
                                        @foreach ($data as $d)
                                        <th class="ms-1">{{ $no++}}</th>
                                        <th class="ms-1">{{ $d->kode_karyawan}}</th>
                                        <th class="ms-1">{{ $d->nama_karyawan}}</th>
                                        <th class="ms-1">{{ $d->tanggal_absensi}}</th>
                                        <th class="ms-1">{{ $d->jam_masuk}}</th>
                                        <th class="ms-1">{{ $d->jam_keluar}}</th>
                                        <th class="ms-1">{{ $d->jenis_shift}}</th>
                                        <th class="ms-1">
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$d->id}}">
                                                    <span class="fa-solid fa-trash"></span>Delete
                                                </button>
                                            <a href="{{route('show',['name'=>$id,'id'=>$d->id])}}" class="btn btn-success" id="edit"><span class="fa-solid fa-eye"></span>Show</a>
                                        </th>
                                    </tr>
                                    @include('popup.popupdelete')
                                @endforeach
                            </tbody>
                        </table>
                        <a href="{{route('karyawan',['name'=>$name])}}" class="btn btn-success" id="edit"><span class="fa-solid fa-eye"></span>Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.10/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
