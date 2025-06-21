<x-layout-principal page-title="Programas de Estudo">
    <div class="container">
        <h1 class="mb-3">Lista de Programas de Estudo</h1>
        <hr>

        {{-- Botão de novo programa --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('programas-estudo.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Novo Programa
            </a>
        </div>

        {{-- Mensagem de sucesso --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        {{-- Tabela de programas --}}
        <div class="card shadow-sm border-0">
            <div class="card-body bg-white">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Grau Académico</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($programas as $programa)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $programa->codigo }}</td>
                                    <td>{{ $programa->nome }}</td>
                                    <td>{{ $programa->grau->nome ?? '-' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('programas-estudo.edit', $programa->id) }}"
                                           class="btn btn-sm btn-warning me-1" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('programas-estudo.destroy', $programa->id) }}"
                                              method="POST"
                                              class="d-inline-block"
                                              onsubmit="return confirm('Tem certeza que deseja eliminar este programa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Nenhum programa encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout-principal>
