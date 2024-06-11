<div class="navigasi" id="myTopnav">
    <ul>
        <a href="javascript: void(0);" class="icon"  onclick="myFunction()"><span class="fa-solid fa-bars"></span></a><pre></pre>
        <center><a href="" class="profileakun"><img src="{{asset('kontak.png')}}" alt="" class=""><br>
        {{$id}}</a></center><br><pre></pre>
    @if ($id === 'Zoro')
        <a href="{{route('dasboard',['id'=>$id])}}">Data Karyawan</a><br><pre></pre>
        <a href="{{route('karyawan', ['name' => $id])}}">Daftar Karyawan</a><br><pre></pre>
    @endif
    @if ($id != 'Zoro')
        <a href="">Absensi</a><br><pre></pre>
        <a href="">Data</a><br><pre></pre>
    @endif

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#logout">
            Log Out
        </button>
    </ul>
</div>

<script>
    function myFunction(){
    var x = document.getElementById("myTopnav");
            if(x.className === "navigasi"){
                x.className += " nav";
            }else{
                x.className = "navigasi";
            }
        }
</script>
