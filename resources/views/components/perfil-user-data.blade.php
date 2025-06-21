<div class="d-flex gap-5">

    <div>
        <i class="fa-solid fa-user me-3"></i>{{ auth()->user()->nome }}
    </div>
    <div>
        <i class="fa-solid fa-user me-3"></i>{{ auth()->user()->perfil }}
    </div>
    <div>
        <i class="fa-solid fa-at me-3"></i>{{ auth()->user()->email }}
    </div>

</div>
