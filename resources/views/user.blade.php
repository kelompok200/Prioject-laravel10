<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add Bootstrap Data Table css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.10/css/dataTables.bootstrap5.min.css">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
        }.login{
            padding: 60px;
            margin-top: 40px;
            width: 500px;
            max-height: 700px;
            border: solid 1px rgba(0, 0, 0, 0.445);
            border-radius: 6px;
            box-shadow: 4px 4px 0.5px silver;
        }
        input{
            width: 350px;
            height: 35px;
            margin: 5px;
            border-radius: 5px;
            border: solid 1px rgba(0, 0, 0, 0.315);
        }label{
            position: relative;
            font-size: 17px;
            top: -35px;
            left: 15px;
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
        }
    </style>
</head>
<body>
    <div class="login">
        <h2>Membuat Username dan password</h2><br>
        <form action="{{route('login_proses')}}" method="post">
                @csrf
                @error('email')
                    <small>{{$message}}</small>
                @enderror
            <div class="email">
                <input type="text" class="inputanLog" name="email" id="" style="font-size: 17px;">
                <label for="text">Email</label><br>
            </div>
            @error('password')
                    <small>{{$message}}</small>
            @enderror
            <div class="password">
                <input type="password" class="inputanSig" name="password" id="">
                <label for="password">Password</label>
                <br>
            </div><br>
            <input type="submit" class="submit" value="Register">
        </form>
        <span>halaman login <a href="{{route('login')}}">Log In</a></span>
    </div>
</body>
</html>
