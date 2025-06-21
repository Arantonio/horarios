<x-layout-principal page-title="Apagar Departamento">

    <div class="w-30 p-4">

        <h5>Apagar Departamento</h5>

        <hr>

        <p>Tem a certeza de que pretende eliminar este departamento?</p>

        <div class="text-center">
            <h3 class="my-5">{{ $departamento->nome}}</h3>
            <a href="{{ route('departamentos')}}" class="btn btn-secondary px-5">Não</a>
            <a href="{{ route('departamentos.delete-departamento-confirm', ['id' => $departamento->id])}}" class="btn btn-danger px-5">Sim</a>
        </div>

    </div>

</x-layout-principal>
