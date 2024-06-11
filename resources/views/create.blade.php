<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unpkg.com/@fortawesome/fontawesome-free@latest/css/all.min.css">
  <link rel="stylesheet" href="{{asset('create.css')}}">
    <title>Create Absensi</title>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
    <h2 class="mt-4 mb-4">ABSENSI KARYAWAN</h2>
        <form method="POST" action="{{ route('store',['id'=>$id]) }}">
        @csrf
        <div class="alert alert-success" role="alert" id="myAlert">
        </div>
        <label for="">Kode Karyawan</label><br>
        <div class="input-group flex-nowrap">
          <span class="input-group-text" id="addon-wrapping"><span class="fa-brands fa-codepen"></span></span>
          <input type="text" class="form-control" name="kode_karyawan" placeholder="Kode" aria-label="Kode" id="input1" aria-describedby="addon-wrapping">
        </div>
        @error('kode_karyawan')
                <small style="color: red;">{{$message}}</small>
        @enderror
        <br>
        <label for="">Nama Karyawan</label><br>
        <div class="input-group flex-nowrap">
          <span class="input-group-text" id="addon-wrapping"><span class="fa-solid fa-signature"></span></span>
          <input type="text" class="form-control" name="nama_karyawan" placeholder="Name" aria-label="Name" id="input2" aria-describedby="addon-wrapping">
        </div>
        @error('nama_karyawan')
            <small style="color: red;">{{$message}}</small>
        @enderror
        <br>
        <label for="">Tanggal Absensi</label><br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><span class="fa-solid fa-calendar"></span></span>
        <input type="date" class="form-control" name="tanggal_absensi" placeholder="" aria-label="" aria-describedby="addon-wrapping">
      </div><br>
        <label for="">Jam Masuk</label><br>
      <div class="input-group flex-nowrap">
      <span class="input-group-text" id="addon-wrapping"><span class="fa-solid fa-clock"></span></span>
      <input type="time" class="form-control" name="jam_masuk" step="60" aria-label="Masuk" id="input3" aria-describedby="addon-wrapping">
      </div>
      @error('jam_masuk')
            <small style="color: red;">{{$message}}</small>
        @enderror
      <br>
        <label for="">Jam Keluar</label><br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><span class="fa-solid fa-clock"></span></span>
        <input type="time" class="form-control timepicker" name="jam_keluar" placeholder="Keluar" aria-label="Keluar4" id="input" aria-describedby="addon-wrapping">
      </div>
      @error('jam_keluar')
            <div><small style="color: red;">{{$message}}</small>
      @enderror
      <br>
      <label for="">Jenis Shift</label><br>
      <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping"><span class="fa-solid fa-clock"></span></span>
        <select class="form-select" name="jenis_shift" aria-label="Default select example">
          <option selected>Pilih Jenis Shift</option>
          @foreach ($data as $d)
          <option value="{{$d->JenisShift}}">{{$d->code}}-{{$d->JenisShift}}</option>
          @endforeach
        </select>
      </div>
      @error('jenis_shift')
            <div><small style="color: red;">{{$message}}</small>
      @enderror
      <br>
      <div class="col-12">
        <button type="submit" class="btn btn-primary m-2" id="submit">Submit</button>
        <a href="{{route('dasboard',['id'=>$id])}}" class="btn btn-warning m-2">Back</a>
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
