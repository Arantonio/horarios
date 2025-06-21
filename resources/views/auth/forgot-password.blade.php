<x-layout-convidado page-title="Recuperar Senha">

    <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">
        <div class="card shadow-sm p-4" style="max-width: 450px; width: 100%; border-radius: 12px;">

            <!-- Logo -->
            <div class="text-center mb-4">
                <img src="{{ asset('assets/images/logo.png')}}" alt="Logo" style="max-width: 160px;">
            </div>

            @if (!session('status'))

                <!-- Título e instruções -->
                <h4 class="text-center mb-3">Recuperar Senha</h4>
                <p class="text-center text-muted mb-4">
                    Indique o seu email e receberá um link para redefinir a sua senha.
                </p>

                <!-- Formulário -->
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Endereço de Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="exemplo@dominio.com">
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ações -->
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('login') }}" class="small text-decoration-none">Já sei a minha senha</a>
                        <button type="submit" class="btn btn-primary">Enviar Email</button>
                    </div>
                </form>

            @else

                <!-- Mensagem de confirmação -->
                <div class="text-center">
                    <h5 class="mb-3 text-success">Pedido enviado com sucesso</h5>
                    <p class="text-muted">Se estiver registado nesta plataforma, irá receber um email com um link para recuperar a sua senha.</p>
                    <p class="mb-4">Por favor, verifique a sua caixa de correio.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Voltar ao Login</a>
                </div>

            @endif
        </div>
    </div>

</x-layout-convidado>
