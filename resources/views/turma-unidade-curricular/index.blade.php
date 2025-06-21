<x-layout-principal page-title="Associações Turma e Unidade Curricular">
    <div class="container">
        <h1 class="mb-4">Associações Turma x Unidade Curricular</h1>
        <hr>

        <a href="{{ route('turma-unidade-curricular.create') }}" class="btn btn-primary mb-3">
            <i class="fas fa-plus-circle me-1"></i> Nova Associação
        </a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Turma</th>
                                <th>Unidade Curricular</th>
                                <th class="text-center">Semestre</th>
                                <th class="text-center">Tempos</th>
                                <th>Professor Regente</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($associacoes as $index => $associacao)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $associacao->turma->nome }}</td>
                                    <td>{{ $associacao->unidadeCurricular->nome }}</td>
                                    <td class="text-center">{{ $associacao->semestre ?? '-' }}</td>
                                    <td class="text-center">{{ $associacao->blocos_semanais ?? '-' }}</td>
                                    <td>{{ optional($associacao->professorRegente)->nome ?? '-' }}</td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            {{-- Editar --}}
                                            <a href="{{ route('turma-unidade-curricular.edit', $associacao->id) }}" class="btn btn-sm btn-outline-warning" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('turma-unidade-curricular.destroy', $associacao->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja eliminar esta associação?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout-principal>
