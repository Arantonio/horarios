<div class="d-flex align-items-center justify-content-center gap-4 p-3 rounded-4 shadow-sm bg-white border">
    <div class="d-flex align-items-center gap-2">
        <i class="fa-solid fa-user text-primary"></i>
        <span class="fw-semibold">{{ auth()->user()->nome }}</span>
    </div>
    <div class="vr"></div>
    <div class="d-flex align-items-center gap-2">
        <i class="fa-solid fa-id-badge text-secondary"></i>
        <span class="fw-semibold">{{ auth()->user()->perfil }}</span>
    </div>
    <div class="vr"></div>
    <div class="d-flex align-items-center gap-2">
        <i class="fa-solid fa-envelope text-success"></i>
        <span class="fw-semibold">{{ auth()->user()->email }}</span>
    </div>
</div>
