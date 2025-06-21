<x-layout-convidado page-title="Redefinir a Senha">

    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="card shadow-sm p-4" style="max-width: 450px; width: 100%; border-radius: 12px;">

            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="max-width: 160px;">
            </div>

            <!-- Título -->
            <h4 class="text-center mb-3">Nova Senha</h4>
            <p class="text-muted text-center mb-4">Preencha o formulário abaixo para definir uma nova senha.</p>

            <!-- Formulário -->
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Endereço de Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@dominio.com">
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nova Senha -->
                <div class="mb-3">
                    <label for="password" class="form-label">Nova Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="••••••••">
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirmar Senha -->
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirmar Nova Senha</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="••••••••">
                    @error('password_confirmation')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ações -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login') }}" class="small text-decoration-none">Já sei a minha senha</a>
                    <button type="submit" class="btn btn-primary">Definir Senha</button>
                </div>

            </form>
        </div>
    </div>

</x-layout-convidado>
