<div class="col-lg-5 mx-auto">
    <div class="card shadow rounded-4 border-0">
        <div class="card-body p-5">
            <h4 class="text-center mb-4 fw-bold">👤 Atualizar Dados do Utilizador</h4>

            <form action="{{ route('user.perfil.update-user-data') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control rounded-pill px-4" value="{{ old('nome', auth()->user()->nome ?? '') }}">
                    @error('nome')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">Email (Nome de Utilizador)</label>
                    <input type="email" name="email" id="email" class="form-control rounded-pill px-4" value="{{ old('email', auth()->user()->email ?? '') }}">
                    @error('email')
                        <small class="text-danger d-block mt-1">{{ $message }}</small>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-success rounded-pill px-5 py-2 shadow-sm">
                        💾 Guardar Alterações
                    </button>
                </div>
            </form>

            @if (session('success_change_data'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('success_change_data') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>
    </div>
</div>
