<x-layout-principal page-title="Nova Turma">
    <div class="container">
        <h1 class="mb-3">Nova Turma</h1>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <h6 class="mb-1"><i class="fas fa-exclamation-circle me-1"></i> Corrige os erros abaixo:</h6>
                <ul class="mb-0 small ps-3">
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body bg-light">
                <form action="{{ route('turmas.store') }}" method="POST">
                    @csrf
                    @include('turmas.form')

                   
                </form>
            </div>
        </div>
    </div>
</x-layout-principal>
