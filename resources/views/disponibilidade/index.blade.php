<x-layout-principal page-title="Minhas Disponibilidades">
    <div class="container">
        <h4 class="mb-4">Minhas Disponibilidades Registadas</h4>
        <hr>
        <div class="m-3">
            <a href="{{ route('disponibilidade.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Nova Disponibilidade
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($disponibilidades->isEmpty())
            <div class="alert alert-info">Ainda não registou nenhuma disponibilidade.</div>
        @else
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover text-center align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Semestre</th>
                                    <th>Dia da Semana</th>
                                    <th>Faixa Horária</th>
                                    <th>Ano Letivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($disponibilidades as $index => $d)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $d->semestre }}</td>
                                        <td>{{ ucfirst($d->dia_semana) }}</td>
                                        <td>{{ $d->faixa_horaria }}</td>
                                        <td>{{ $d->anoLetivo->designacao ?? 'N/D' }}</td>
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
