<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add Bootstrap Data Table css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.10/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{asset('style.css')}}">
    <link rel="stylesheet" href="{{asset('format.css')}}">
</head>
<body>
    @include('navbar.navbar')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                          <th scope="col">No. </th>
                          <th scope="col">Image</th>
                          <th scope="col">Karyawan</th>
                          <th scope="col">Email</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data['user'] as $d)
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td><img src="{{asset('kontak.png')}}" alt=""></td>
                          @if ($d->name === 'Zoro')
                          <td>{{$d->name}} <span class="iconBoss">Leader</span></td>
                          @endif
                          @if ($d->name != 'Zoro')
                          <td>{{$d->name}}</td>
                          @endif
                          <td><a href="{{route('Absen',['name'=> $id,'id'=>$d->name])}}">{{$d->email}}</a></td>
                          <td>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$d->id}}">
                                <span class="fa-solid fa-trash"></span>Delete
                            </button>
                          </td>
                        @include('popup.deleteakun')
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('popup.popuplogout')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.10/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.10/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
