<div class="col-4">
    <div class="border p-5 shadow-sm">
        <form action="{{ route('user.perfil.update-password') }}" method="post">
            @csrf
            <h5 class="text-center">Alterar a Palavra-Passe</h5>
            <hr>
            <div class="mb-3">
                <label for="current_password" class="form-label">Palavra-Passe Atual</label>
                <input type="password" name="current_password" id="current_password" class="form-control">
                @error('current_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="new_password" class="form-label">Nova Palavra-Passe</label>
                <input type="password" name="new_password" id="new_password" class="form-control">
                @error('new_password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="new_password_confirmation" class="form-label">Confirmar a Nova
                    Palavra-Passe</label>
                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                    class="form-control">
                @error('new_password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Alterar a Palavra-passe</button>
            </div>

        </form>

        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
    </div>
</div>
