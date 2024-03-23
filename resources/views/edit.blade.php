<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/@fortawesome/fontawesome-free@latest/css/all.min.css">
  <link rel="stylesheet" href="{{asset('create.css')}}">
    <title>Edit Absensi</title>
</head>
<body>
    <div class="container">
      <div class="card">
      <div class="card-header">
          <h2 class="mt-4 mb-4">ABSENSI KARYAWAN</h2>
          <form method="POST" action="{{ route('update',['name'=>$name,'id'=>$data->id]) }}">
            @csrf
            @method('PUT')
              <div class="alert alert-success" role="alert" id="myAlert">
              </div>
              <label for="">Kode Karyawan</label><br>
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><span class="fa-brands fa-codepen"></span></span>
                <input type="text" class="form-control" name="kode_karyawan" placeholder="Kode" value="{{$data->kode_karyawan}}" aria-label="Kode" id="input" aria-describedby="addon-wrapping">
              </div>
              @error('kode_karyawan')
                      <small style="color: red;">{{$message}}</small>
              @enderror
              <br>
              <label for="">Nama Karyawan</label><br>
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"><span class="fa-solid fa-signature"></span></span>
                <input type="text" class="form-control" name="nama_karyawan" placeholder="Name" value="{{$data->nama_karyawan}}" aria-label="Name" id="input" aria-describedby="addon-wrapping">
              </div>
              @error('nama_karyawan')
                  <small style="color: red;">{{$message}}</small>
              @enderror
              <br>
              <label for="">Tanggal Absensi</label><br>
            <div class="input-group flex-nowrap">
              <span class="input-group-text" id="addon-wrapping"><span class="fa-solid fa-calendar"></span></span>
              <input type="date" class="form-control" name="tanggal_absensi" placeholder="" value="{{$data->tanggal_absensi}}" aria-label="" aria-describedby="addon-wrapping">
            </div><br>
              <label for="">Jam Masuk</label><br>
            <div class="input-group flex-nowrap">
            <span class="input-group-text" id="addon-wrapping"><span class="fa-solid fa-clock"></span></span>
            <input type="time" class="form-control" name="jam_masuk" placeholder="Masuk" value="{{$data->jam_masuk}}" aria-label="Masuk" id="input" aria-describedby="addon-wrapping">
            </div>
            @error('jam_masuk')
                  <small style="color: red;">{{$message}}</small>
              @enderror
            <br>
              <label for="">Jam Keluar</label><br>
            <div class="input-group flex-nowrap">
              <span class="input-group-text" id="addon-wrapping"><span class="fa-solid fa-clock"></span></span>
              <input type="text" class="form-control timepicker" name="jam_keluar" placeholder="Keluar" value="{{$data->jam_keluar}}" aria-label="Keluar" id="input" aria-describedby="addon-wrapping">
            </div>
            @error('jam_keluar')
                  <div><small style="color: red;">{{$message}}</small>
            @enderror
            <br>
            <div class="col-12">
              <button type="submit" class="btn btn-primary mt-4" id="submit">Submit</button>
            </div>
          </form>
        </div>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="{{asset('create.js')}}"></script>
  </div>
  </body>
  </html>