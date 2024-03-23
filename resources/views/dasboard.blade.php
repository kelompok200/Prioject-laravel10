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
    @include('navbar.navbar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Absensi Karyawan</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($user as $s)
                    <form action="{{route('create',['id'=>$s->name])}}">
                        @endforeach
                        <button type="submit" class="btn btn-primary mb-3">Tambah Absen</button>
                    </form>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%; backgroud:blue;">
                                    <tr>
                                        <th>Kode Absensi</th>
                                        <th>Nama Karyawan</th>
                                        <th>Tanggal Absensi</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Action</th>
                                    </tr>
                                        <tr>
                                            @foreach ($data['data'] as $d)
                                            <th class="ms-1">{{ $d->kode_karyawan}}</th>
                                            <th class="ms-1">{{ $d->nama_karyawan}}</th>
                                            <th class="ms-1">{{ $d->tanggal_absensi}}</th>
                                            <th class="ms-1">{{ $d->jam_masuk}}</th>
                                            <th class="ms-1">{{ $d->jam_keluar}}</th>
                                            <th class="ms-1">
                                                @foreach ($user as $s)
                                                <a href="{{route('edit',['name' => $s->name,'id'=>$d->id])}}" class="btn btn-primary" id="edit"><span class="fa-solid fa-edit"></span>Edit</a>
                                                @endforeach
                                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$d->id}}">
                                                        <span class="fa-solid fa-trash"></span>Delete
                                                    </button>
                                                @foreach ($user as $s)
                                                <a href="{{route('show',['name'=>$s->name,'id'=>$d->nama_karyawan])}}" class="btn btn-success" id="edit"><span class="fa-solid fa-eye"></span>Show</a>
                                                @endforeach
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
        @include('popup.popuplogout')
    </div>
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
