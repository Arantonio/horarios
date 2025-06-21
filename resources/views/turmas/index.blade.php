<x-layout-principal page-title="Turmas">
    <div class="container">
        <h1 class="mb-3">Lista de Turmas</h1>
        <hr>

        {{-- Filtros --}}
        <form method="GET" class="row g-3 mb-4 shadow-sm bg-white p-3 rounded border">
            <div class="col-md-3">
                <label class="form-label">Ano Letivo</label>
                <select name="ano_letivo_id" class="form-select">
                    <option value="">Todos</option>
                    @foreach ($anosLetivos as $ano)
                        <option value="{{ $ano->id }}"
                            {{ request('ano_letivo_id') == $ano->id ? 'selected' : '' }}>
                            {{ $ano->designacao }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Curso</label>
                <select name="curso_id" class="form-select">
                    <option value="">Todos</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}" {{ request('curso_id') == $curso->id ? 'selected' : '' }}>
                            {{ $curso->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">Programa de Estudo</label>
                <select name="programa_estudo_id" class="form-select">
                    <option value="">Todos</option>
                    @foreach ($programas as $programa)
                        <option value="{{ $programa->id }}"
                            {{ request('programa_estudo_id') == $programa->id ? 'selected' : '' }}>
                            {{ $programa->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label class="form-label">Período</label>
                <select name="periodo" class="form-select">
                    <option value="">Todos</option>
                    <option value="manhã" {{ request('periodo') == 'manhã' ? 'selected' : '' }}>Manhã</option>
                    <option value="tarde" {{ request('periodo') == 'tarde' ? 'selected' : '' }}>Tarde</option>
                    <option value="noite" {{ request('periodo') == 'noite' ? 'selected' : '' }}>Noite</option>
                </select>
            </div>

            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-primary w-100">
                    <i class="fas fa-search me-1"></i>
                </button>
            </div>
        </form>

        {{-- Botão de nova turma --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('turmas.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Nova Turma
            </a>
        </div>

        {{-- Mensagem de sucesso --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Tabela --}}
        <div class="card shadow-sm border-0">
            <div class="card-body bg-white">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Curso</th>
                                <th>Programa de Estudo</th>
                                <th>Ano Letivo</th>
                                <th>Período</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($turmas as $turma)
                                <tr>
                                    <td>{{ $turma->codigo }}</td>
                                    <td>{{ $turma->nome }}</td>
                                    <td>{{ $turma->curso->nome ?? '-' }}</td>
                                    <td>{{ $turma->programaEstudo->nome ?? '-' }}</td>
                                    <td>{{ $turma->anoLetivo->designacao ?? '-' }}</td>
                                    <td>{{ ucfirst($turma->periodo) }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center">
                                            {{-- Detalhes (com cor azul e espaçamento) --}}
                                            <a href="{{ route('turmas.show', $turma->id) }}"
                                                class="btn btn-sm btn-info mx-1" title="Ver detalhes">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            {{-- Editar --}}
                                            <a href="{{ route('turmas.edit', $turma->id) }}"
                                                class="btn btn-sm btn-warning mx-1" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            {{-- Eliminar --}}
                                            <form action="{{ route('turmas.destroy', $turma->id) }}" method="POST"
                                                onsubmit="return confirm('Deseja excluir esta turma?')" class="mx-1">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" title="Eliminar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted">Nenhuma turma encontrada.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-layout-principal>
