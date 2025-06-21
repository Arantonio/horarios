<x-layout-principal page-title="Apagar Utilizador">

        <div class="w-25 p-4">

            <h3>Apagar Utilizador</h3>

            <hr>

            <p>
                Tem a certeza de que pretende eliminar este utilizador?</p>

            <div class="text-center">
                <h3 class="my-5">{{ $utilizador->nome}}</h3>
                <a href="{{ route('utilizadores.user')}}" class="btn btn-secondary px-5">Não</a>
                <a href="{{ route('utilizadores.delete-confirm', ['id' => $utilizador->id])}}" class="btn btn-danger px-5">Sim</a>
            </div>

        </div>



</x-layout-principal>
