<x-layout-principal page-title="Unidades Curriculares">
    <div class="container">
        <h1 class="mb-3">Lista de Unidades Curriculares</h1>
        <hr>

        {{-- Botão de nova UC --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('unidades-curriculares.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Nova UC
            </a>
        </div>

        {{-- Mensagem de sucesso --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        {{-- Tabela --}}
        <div class="card shadow-sm border-0">
            <div class="card-body bg-white">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Tipo</th>
                                <th>Horas</th>
                                <th>ECTS</th>
                                <th>Ano</th>
                                <th>Programa</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($ucs as $uc)
                                <tr>
                                    <td>{{ $uc->codigo }}</td>
                                    <td>{{ $uc->nome }}</td>
                                    <td>{{ $uc->tipo ?? '-' }}</td>
                                    <td>{{ $uc->carga_horaria ?? '-' }}</td>
                                    <td>{{ $uc->ects ?? '-' }}</td>
                                    <td>{{ $uc->anoCurricular->nome ?? '-' }}</td>
                                    <td>{{ $uc->programaEstudo->nome ?? '-' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('unidades-curriculares.edit', $uc->id) }}"
                                           class="btn btn-sm btn-warning me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('unidades-curriculares.destroy', $uc->id) }}"
                                              method="POST" class="d-inline-block"
                                              onsubmit="return confirm('Deseja excluir esta UC?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-muted">Nenhuma UC encontrada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout-principal>
