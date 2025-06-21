<x-layout-principal page-title="Programa de Estudo">


    <div class="container">
        <h1 class="mb-4">Editar Programa de Estudo</h1>

        <form action="{{ route('programas-estudo.update', $programa->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('programas-estudo.form')
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('programas-estudo.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>




</x-layout-principal>