<x-layout-principal page-title="Cursos">
    <div class="container">
        <h1 class="mb-3">Lista de Cursos</h1>
        <hr>

        {{-- Botão de novo curso --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('cursos.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Novo Curso
            </a>
        </div>

        {{-- Mensagem de sucesso --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        {{-- Tabela de cursos --}}
        <div class="card shadow-sm border-0">
            <div class="card-body bg-white">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>Programa de Estudo</th>
                                <th>Descrição</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cursos as $curso)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $curso->nome }}</td>
                                    <td>{{ $curso->programa->nome ?? '-' }}</td>
                                    <td>{{ $curso->descricao }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('cursos.edit', $curso->id) }}"
                                           class="btn btn-sm btn-warning me-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST"
                                              class="d-inline-block"
                                              onsubmit="return confirm('Tem certeza que deseja eliminar este curso?')">
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
                                    <td colspan="5" class="text-center text-muted">Nenhum curso encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout-principal>
