<x-layout-principal page-title="Editar Departamento">

    <div class="w-20 p-4">

        <h3>Editar Departamento</h3>

        <hr>

        <form action="{{ route('departamentos.update-departamento')}}" method="post">

            @csrf

            <input type="hidden" name="id" value="{{ $departamento->id }}">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome do Departamento</label>
                <input type="text" class="form-control" id="nome" name="nome" required value="{{ $departamento->nome }}">
            @error('nome')
                <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
                <a href="{{ route('departamentos')}}" class="btn btn-outline-danger me-3">Cancelar</a>
                <button type="submit" class="btn btn-primary">Atualizar Departamento</button>
            </div>

        </form>

    </div>


</x-layout-principal>
