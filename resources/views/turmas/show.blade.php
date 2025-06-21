<x-layout-principal page-title="Detalhes da Turma {{ $turma->nome }}">
    <div class="container">
        <h5>Detalhes da Turma</h5>

        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <p><strong>Nome:</strong> {{ $turma->nome }}</p>
                <p><strong>Curso:</strong> {{ $turma->curso->nome ?? '-' }}</p>
                <p><strong>Programa de Estudo:</strong> {{ $turma->programaEstudo->nome ?? '-' }}</p>
                <p><strong>Ano Letivo:</strong> {{ $turma->anoLetivo->designacao ?? '-' }}</p>
                <p><strong>Período:</strong> {{ ucfirst($turma->periodo) }}</p>
            </div>
        </div>

        <h5>Unidades Curriculares Associadas</h5>

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Unidade Curricular</th>
                                <th>Semestre</th>
                                <th>Professor Regente</th>
                                <th>Outros Professores</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($associacoes as $index => $associacao)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $associacao->unidadeCurricular->nome ?? '-' }}</td>
                                    <td>{{ $associacao->semestre ?? '-' }}</td>
                                    <td>{{ optional($associacao->professorRegente)->nome ?? '-' }}</td>
                                    <td>
                                        @if ($associacao->outros_professores && is_array($associacao->outros_professores))
                                            @foreach ($associacao->outros_professores as $profId)
                                                <span class="badge bg-secondary">
                                                    {{ \App\Models\Utilizador::find($profId)->nome ?? 'N/D' }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="text-muted">Nenhum</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Nenhuma associação encontrada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4 text-end">
            <a href="{{ route('turmas.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-1"></i> Voltar à Lista
            </a>
        </div>
    </div>
</x-layout-principal>
