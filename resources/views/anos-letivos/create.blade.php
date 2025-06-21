<x-layout-principal page-title="Novo Ano Letivo">

    <div class="container">

        <h1>Criar Novo Ano Letivo</h1>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro!</strong> Corrige os campos abaixo:
                <ul class="mt-2 mb-0">
                    @foreach ($errors->all() as $error)
                        <li class="small">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('anos-letivos.store') }}" method="POST" class="shadow-sm p-4 rounded bg-light">
            @csrf

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label for="designacao" class="form-label">Designação <span class="text-danger">*</span></label>
                    <input type="text" id="designacao" name="designacao"
                           class="form-control @error('designacao') is-invalid @enderror"
                           placeholder="Ex: 2024-2025" value="{{ old('designacao') }}">
                    @error('designacao')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="data_inicio" class="form-label">Data de Início <span class="text-danger">*</span></label>
                    <input type="date" id="data_inicio" name="data_inicio"
                           class="form-control @error('data_inicio') is-invalid @enderror"
                           value="{{ old('data_inicio') }}">
                    @error('data_inicio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="data_fim" class="form-label">Data de Fim <span class="text-danger">*</span></label>
                    <input type="date" id="data_fim" name="data_fim"
                           class="form-control @error('data_fim') is-invalid @enderror"
                           value="{{ old('data_fim') }}">
                    @error('data_fim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-1"></i> Guardar
                </button>
                <a href="{{ route('anos-letivos.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-1"></i> Cancelar
                </a>
            </div>
        </form>
    </div>

</x-layout-principal>
