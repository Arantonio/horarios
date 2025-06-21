<x-layout-convidado page-title="Login">

    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%; border-radius: 12px;">

            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="max-width: 180px;">
            </div>

            <!-- Formulário -->
            <h4 class="text-center mb-3">Acesso ao Sistema</h4>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Endereço de Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu email">
                    @error('email')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Senha -->
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite a sua senha">
                    @error('password')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Ações -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="{{ route('password.request') }}" class="small text-decoration-none">Esqueceu a sua senha?</a>
                </div>

                <!-- Botão -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                </div>

                <!-- Sucesso -->
                @if (session('status'))
                    <div class="alert alert-success mt-3 text-center small">
                        {{ session('status') }}
                    </div>
                @endif

            </form>
        </div>
    </div>

</x-layout-convidado>
