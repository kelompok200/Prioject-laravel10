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
    <title>Halaman Register</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }.login{
            padding: 60px;
            margin-top: 40px;
            width: 500px;
            max-height: 750px;
            border: solid 1px rgba(0, 0, 0, 0.445);
            border-radius: 6px;
            box-shadow: 4px 4px 0.5px silver;
        }
        input:not(input[type=checkbox]){
            width: 350px;
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
        <h2>Register</h2><br>
        <form action="{{route('inputsignin')}}" method="post">
            @csrf
            @method('PUT')
            <div class="nama">
                <label for="text">Nama</label><br>
                <input type="text" name="name" id="nama" style="font-size: 17px;">
                @error('name')
                    <small style="color:red;"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</small>
                @enderror
                <br>
            </div>
            <div class="Email">
                <label for="email">Email</label><br>
                <input type="email" name="email" id="" style="font-size: 17px;">
                @error('email')
                    <small style="color:red;"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</small>
                @enderror
                <br>
            </div>
            <div class="password">
                <label for="password">Password</label><br>
                <input type="password" name="password" id="pass" style="font-size: 17px;">
                <input type="checkbox" name="" id="checkbox" class="ml-2"><span> tampilkan password</span>
                @error('password')
                    <br><small style="color:red;"><i class="fa-solid fa-triangle-exclamation"></i>{{$message}}</small>
                @enderror
                <br>
            <div class="password">
                <label for="password">Confirm Password</label><br>
                <input type="password" name="verifikasi" id="confirm" style="font-size: 17px;">
                <input type="checkbox" name="" id="checkbox2" class="ml-2"><span> tampilkan password</span>
                <br>
            </div><br>
            <input type="submit" class="submit" value="Register">
        </form>
        <span>halaman login <a href="{{route('login')}}">Log In</a></span>
    </div>
    <script src="{{asset('check.js')}}"></script>
</body>
</html>
