@foreach ($user as $s)
<div class="modal fade" id="staticBackdrop{{$d->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">KONFIRMASI</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Apakah anda yakin ingin mengapus <b>{{$d->nama_karyawan}}</b>?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="{{route('delete',['name'=>$s->name,'id'=>$d->id])}}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary"><span class="fa-solid fa-trash"></span>Hapus</button>
        </form>
        </div>
    </div>
    </div>
</div>
@endforeach