<x-layout-principal page-title="Utilizadores">
    <div class="container">
        <h1 class="mb-4">Utilizadores</h1>
        <hr>

        {{-- Botão de novo utilizador --}}
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('utilizadores.new-user') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Novo Utilizador
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        @if ($utilizadores->count() === 0)
            <div class="alert alert-info text-center">
                Nenhum utilizador encontrado.
            </div>
        @else
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" id="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Email Verificado</th>
                                    <th>Departamento</th>
                                    <th>Grau Académico</th>
                                    <th class="text-end">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($utilizadores as $utilizador)
                                    <tr>
                                        <td>{{ $utilizador->nome }}</td>
                                        <td>{{ $utilizador->email }}</td>
                                        <td>
                                            <span class="badge {{ $utilizador->email_verified_at ? 'bg-success' : 'bg-danger' }}">
                                                {{ $utilizador->email_verified_at ? 'Sim' : 'Não' }}
                                            </span>
                                        </td>
                                        <td>{{ $utilizador->departamento->nome ?? 'Não definido' }}</td>
                                        <td>{{ $utilizador->detalhes->grau_academico ?? 'Não informado' }}</td>
                                        <td class="text-end text-nowrap">
                                            @if (in_array($utilizador->departamento->id, [1]))
                                                <i class="fas fa-lock text-muted"></i>
                                            @else
                                                @if (is_null($utilizador->deleted_at))
                                                    <a href="{{ route('utilizadores.edit-user', $utilizador->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('utilizadores.delete-user', $utilizador->id) }}" class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('utilizadores.restore', $utilizador->id) }}" class="btn btn-sm btn-outline-success">
                                                        <i class="fas fa-trash-restore"></i>
                                                    </a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layout-principal>
