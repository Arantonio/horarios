<div class="col-lg-5 mx-auto">
    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-5">
            <h4 class="text-center mb-4 fw-bold">🔐 Alterar Palavra-Passe</h4>

            <form action="{{ route('user.perfil.update-password') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="current_password" class="form-label">Palavra-Passe Atual</label>
                    <input type="password" name="current_password" id="current_password" class="form-control rounded-pill px-4">
                    @error('current_password')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="new_password" class="form-label">Nova Palavra-Passe</label>
                    <input type="password" name="new_password" id="new_password" class="form-control rounded-pill px-4">
                    @error('new_password')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="new_password_confirmation" class="form-label">Confirmar Nova Palavra-Passe</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control rounded-pill px-4">
                    @error('new_password_confirmation')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary rounded-pill px-5 py-2 shadow-sm">
                        💾 Guardar Alterações
                    </button>
                </div>
            </form>

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>
    </div>
</div>
