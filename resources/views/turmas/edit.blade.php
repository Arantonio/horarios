<x-layout-principal page-title="Editar Turma">
    <h5 class="mb-4">Editar Turma: {{ $turma->nome }}</h5>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erro!</strong> Corrige os campos abaixo:
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li class="small">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('turmas.update', $turma->id) }}" method="POST" class="shadow-sm p-4 rounded bg-light">
        @csrf @method('POST')
        @include('turmas.form', ['turma' => $turma])
    </form>
</x-layout-principal>
