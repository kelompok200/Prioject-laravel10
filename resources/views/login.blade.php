<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add Bootstrap Data Table css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.10/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@fortawesome/fontawesome-free@latest/css/all.min.css">
    <title>Halaman Login</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }.login{
            padding: 60px;
            margin-top: 40px;
            width: 400px;
            max-height: 550px;
            border: solid 1px rgba(0, 0, 0, 0.445);
            border-radius: 6px;
            box-shadow: 4px 4px 0.5px silver;
        }
        input:not(input[type=checkbox]){
            width: 250px;
            height: 35px;
            margin: 5px;
            border-radius: 5px;
            font-size: 17px;
            border: solid 1px rgba(0, 0, 0, 0.315);
            font-family: 'Times New Roman', Times, serif;
        }label{
            margin: 5px;
            margin-left: 10px;
            font-size: 17px;
            pointer-events: none;
        }.submit{
            background: rgb(44, 44, 255);
            border: none;
            color: rgb(233, 233, 233);
        }h2{
            margin-bottom: 30px;
            text-align: center;
        }.submit:hover{
            background: blue;
        }input[type=checkbox]{
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="login">
        <h2><b>Login</b></h2><br>
        @foreach ($data as $d)
        <form action="{{route('login_proses')}}" method="POST">
        @endforeach
        @csrf
            <div class="username">
                <label for="text">Username/Email</label>
                <input type="text" class="inputanLog" name="email" id="" style="font-size: 17px;">
                @error('email')
                    <small style="color:red;"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</small>
                @enderror<br>
            </div>
            
            <div class="password">
                <label for="password">Password</label>
                <input type="password" class="inputanSig" name="password" id="pass" style="font-size: 17px;">
                @error('password')
                    <small style="color:red;"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</small><br>
                @enderror
                <input type="checkbox" name="" id="checkbox"><span>check</span><br>
                <br>
            </div><br>
            <input type="submit" class="submit" value="Log In">
        </form>
        <span style="font-size: 10px;">jika belum memiliki maka daftar terlebih dahulu <a href="{{route('signin')}}" style="font-size: 15px;">Register</a></span>
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if($message = Session::get('sukses-sign'))
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
    @if($message = Session::get('logout'))
        <script>
            Swal.fire({
            position: "center",
            icon: "success",
            title: "{{$message}}",
            showConfirmButton: false,
            timer: 1500
            });
        </script>
    @endif
    <script src="{{asset('check2.js')}}"></script>
</body>
</html>
