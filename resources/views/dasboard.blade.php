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
    @if($id === 'Zoro')
    @include('navbar.navbar')
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
                            <table id="example" class="table table-striped">
                                    <tr>
                                        <th scope="col">No. </th>
                                        <th scope="col">Kode Absensi</th>
                                        <th scope="col">Nama Karyawan</th>
                                        <th scope="col">Tanggal Absensi</th>
                                        <th scope="col">Jam Masuk</th>
                                        <th scope="col">Jam Keluar</th>
                                        <th scope="col">Jenis Shift</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    @php
                                        $no = 1;
                                    @endphp
                                        <tr>
                                            @foreach ($data['data'] as $d)
                                            <td>{{ $no++}}</td>
                                            <td>{{ $d->kode_karyawan}}</td>
                                            <td>{{ $d->nama_karyawan}}</td>
                                            <td>{{ $d->tanggal_absensi}}</td>
                                            <td>{{ $d->jam_masuk}}</td>
                                            <td>{{ $d->jam_keluar}}</td>
                                            <td>{{ $d->jenis_shift}}</td>
                                            <td>
                                                <a href="{{route('edit',['name' => $id,'id'=>$d->id])}}" class="btn btn-primary" id="edit"><span class="fa-solid fa-edit"></span>Edit</a>
                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$d->id}}">
                                                        <span class="fa-solid fa-trash"></span>Delete
                                                    </button>
                                                <a href="{{route('show',['name'=>$id,'id'=>$d->id])}}" class="btn btn-success" id="edit"><span class="fa-solid fa-eye"></span>Show</a>
                                            </td>
                                        </tr>
                                        @include('popup.popupdelete')
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            @endif
            @if($id != 'Zoro')
            @include('navbar.navbar')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <h3 class="card-title">Absensi Karyawan</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('create',['id'=>$id])}}">
                                <button type="submit" class="btn btn-primary mb-3"><span class="fa-solid fa-user-plus"></span>Tambah Absen</button>
                            </form>
                        <a href="{{route('pdf',['id'=>$id])}}" class="btn btn-primary mb-3">Cetak PDF</a>
                        {{-- <a href="{{url('cetak-excel')}}" class="btn btn-primary mb-3">Cetak Excel</a> --}}
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>No. </th>
                                <th>Kode Absensi</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal Absensi</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Jenis Shift</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    @foreach ($data['getData'] as $d)
                                    <th scope="row">{{ $no++}}</th>
                                    <td>{{ $d->kode_karyawan}}</th>
                                    <td>{{ $d->nama_karyawan}}</th>
                                    <td>{{ $d->tanggal_absensi}}</th>
                                    <td>{{ $d->jam_masuk}}</th>
                                    <td>{{ $d->jam_keluar}}</th>
                                    <td>{{ $d->jenis_shift}}</th>
                                    <td>
                                        <a href="{{route('edit',['name' => $id,'id'=>$d->id])}}" class="btn btn-primary" id="edit"><span class="fa-solid fa-edit"></span>Edit</a>
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$d->id}}">
                                                <span class="fa-solid fa-trash"></span>Delete
                                            </button>
                                            <a href="{{route('show',['name'=>$id,'id'=>$d->id])}}" class="btn btn-success" id="edit"><span class="fa-solid fa-eye"></span>Show</a>
                                    </th>
                                </tr>
                                @include('popup.popupdelete')
                            @endforeach
                        </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            @endif
        @include('popup.popuplogout')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.10/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if($message = Session::get('sukses'))
        <script>
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "{{$message}}",
            showConfirmButton: false,
            timer: 1500
            });
        </script>
    @endif
    @if($message = Session::get('delete'))
        <script>
            let timerInterval;
            Swal.fire({
            title: "Auto close alert!",
            html: "{{$message}} in <b></b> milliseconds.",
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                timer.textContent = `${Swal.getTimerLeft()}`;
                }, 70);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("delete was successful");
            }
            });
        </script>
    @endif
</body>
</html>
