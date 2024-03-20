<div class="navigasi">
    <ul>
        <a href="javascript: void(0);" class="icon" onclick="myfunction()"><span class="fa-solid fa-bars"></span></a>
    </ul>
    <ul>
        <a href=""><img src="{{asset('github.jpg')}}" alt="" class=""><br><span class="ml-2">
            @if($message = Session::get('nama'))
                {{$message}}
            @endif
        </span></a>
    </ul>
    <ul>
        <a href="">Dashboard</a>
    </ul>
    <ul>
        <a href="">Data</a>
    </ul>
    <ul>
        <a href="">blabla</a>
    </ul>
    <ul>
        <a href="">blabla</a>
    </ul>
    <ul>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logout">
            Log Out
        </button>
    </ul>
</div>