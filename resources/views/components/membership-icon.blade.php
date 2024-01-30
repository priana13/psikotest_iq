<div class="nav-item ml-2 my-auto {{ (!$paket_aktif) ? 'd-none' : '' }}">  

    <a class="btn btn-outline-warning text-dark" disabled>{{ ($paket_aktif) ? $paket_aktif->name : "" }}</a>
</div>