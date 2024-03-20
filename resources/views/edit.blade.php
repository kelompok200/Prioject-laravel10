<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Absen</title>
</head>
<body>
<form method="POST" action="{{ route('update',['id'=>$data->id]) }}">
    @csrf
    @method('PUT')
    <div class="input-group flex-nowrap">
      <span class="input-group-text" id="addon-wrapping">Kode Karyawan</span>
      <input type="text" class="form-control" name="kode_karyawan" value="{{$data->kode_karyawan}}" placeholder="Kode" aria-label="Kode" aria-describedby="addon-wrapping">
    </div>
    <br>
    <div class="input-group flex-nowrap">
      <span class="input-group-text" id="addon-wrapping">Nama Karyawan</span>
      <input type="text" class="form-control" name="nama_karyawan" value="{{$data->nama_karyawan}}" placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping">
    </div>
    <br>
  <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Tanggal Absensi</span>
    <input type="date" class="form-control" name="tanggal_absensi" value="{{$data->tanggal_absensi}}" placeholder="" aria-label="" aria-describedby="addon-wrapping">
  </div><br>
  <div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Jam Masuk</span>
  <input type="time" class="form-control" name="jam_masuk" value="{{$data->jam_masuk}}" placeholder="Masuk" aria-label="Masuk" aria-describedby="addon-wrapping">
  </div>
  <br>
  <div class="input-group flex-nowrap">
    <span class="input-group-text" id="addon-wrapping">Jam Keluar</span>
    <input type="time" class="form-control" name="jam_keluar" value="{{$data->jam_keluar}}" placeholder="Keluar" aria-label="Keluar" aria-describedby="addon-wrapping">
  </div>
  <br>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</div>
</body>
</html>