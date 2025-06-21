<x-layout-principal page-title="Novo Departamento">

    <div class="w-30 p-4">

        <h5>Novo Departamento</h5>

        <hr>

        <form action="{{ route('departamentos.create-departamento')}}" method="post">

            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Departamento</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
                <a href="{{ route('departamentos')}}" class="btn btn-outline-danger me-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">Criar Departamento</button>
            </div>

        </form>

    </div>


</x-layout-principal>
