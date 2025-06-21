<x-layout-principal page-title="Anos Letivos">

    <div class="container">
        <h1>Lista de Anos Letivos</h1>
        <hr>
        <div class="mb-4">
            <a href="{{ route('anos-letivos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Novo Ano Letivo
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Designação</th>
                                <th>Início</th>
                                <th>Fim</th>
                                <th>Estado</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anos as $ano)
                                <tr>
                                    <td>{{ $ano->designacao }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ano->data_inicio)->format('d/m/Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ano->data_fim)->format('d/m/Y') }}</td>
                                    <td>
                                        @if ($ano->activo)
                                            <span class="badge bg-success">Ativo</span>
                                        @else
                                            <span class="badge bg-secondary">Inativo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('anos-letivos.edit', $ano->id) }}"
                                            class="btn btn-sm btn-warning me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        @if (!$ano->activo)
                                            <form action="{{ route('anos-letivos.activar', $ano->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button class="btn btn-sm btn-outline-primary"
                                                    onclick="return confirm('Deseja ativar este ano letivo?')">
                                                    <i class="fas fa-check"></i> Ativar
                                                </button>
                                            </form>
                                        @endif
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
