<div class="col-4">
    <div class="border p-5 shadow-sm">
        <form action="{{ route('user.perfil.update-user-data')}}" method="post">

            @csrf

            <h5>Alterar dados do utilizador</h5>
            <hr>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="">
                @error('nome')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email (nome do utilizador)</label>
                <input type="email" name="email" id="email" class="form-control" value="">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Atualizar dados do utilizador</button>
            </div>

        </form>

        @if (session('success_change_data'))
            <div class="alert alert-success mt-3">
                {{ session('success_change_data') }}
            </div>
        @endif


    </div>
</div>
