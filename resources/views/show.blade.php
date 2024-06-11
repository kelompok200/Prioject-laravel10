<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('show.css')}}">
    <title>tampilan-data-karyawan</title>
</head>
<body>
    @if ($name === 'Zoro')
    <div class="container">
        <ul class="list-group list-group-flush">
            @foreach ($dataakun as $d)
            <li class="list-group-item mb-3"><label for="">Kode Karyawan    </label>: <span>{{$d->kode_karyawan}}</span></li>
            <li class="list-group-item mb-3"><label for="">Nama Karyawan    </label>: <span>{{$d->nama_karyawan}}</span></li>
            <li class="list-group-item mb-3"><label for="">Tanggal Absensi  </label>: <span>{{$d->tanggal_absensi}}</span></li>
            <li class="list-group-item mb-3"><label for="">Jam Masuk        </label>: <span>{{$d->jam_masuk}}</span></li>
            <li class="list-group-item mb-3"><label for="">Jam Keluar       </label>: <span>{{$d->jam_keluar}}</span></li>
            <li class="list-group-item mb-3"><label for="">Jenis Shift      </label>: <span>{{$d->jenis_shift}}</span></li>
            @endforeach
          </ul>
        <div>
            <a href="{{route('dasboard',['id'=>$name])}}" class="btn btn-primary">Back</a>
        </div>
    </div>
    @endif
    @if ($name != 'Zoro')
    <div class="container">
        <ul class="list-group list-group-flush">
            @foreach ($dataakun as $d)
            <li class="list-group-item mb-3"><label for="">Kode Karyawan    </label>: <span>{{$d->kode_karyawan}}</span></li>
            <li class="list-group-item mb-3"><label for="">Nama Karyawan    </label>: <span>{{$d->nama_karyawan}}</span></li>
            <li class="list-group-item mb-3"><label for="">Tanggal Absensi  </label>: <span>{{$d->tanggal_absensi}}</span></li>
            <li class="list-group-item mb-3"><label for="">Jam Masuk        </label>: <span>{{$d->jam_masuk}}</span></li>
            <li class="list-group-item mb-3"><label for="">Jam Keluar       </label>: <span>{{$d->jam_keluar}}</span></li>
            <li class="list-group-item mb-3"><label for="">Jenis Shift      </label>: <span>{{$d->jenis_shift}}</span></li>
            @endforeach
          </ul>
        <div>
            <a href="{{route('dasboard',['id'=>$name])}}" class="btn btn-primary">Back</a>
        </div>
    </div>
    @endif
</body>
</html>
