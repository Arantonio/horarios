<x-layout-principal page-title="Editar Ano Letivo">

    <div class="container">

        <h5 class="mb-4">✏️ Editar Ano Letivo: <strong>{{ $ano->designacao }}</strong></h5>

        <form action="{{ route('anos-letivos.update', $ano->id) }}" method="POST" class="shadow-sm p-4 rounded bg-light">
            @csrf

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="designacao" class="form-label">Designação <span class="text-danger">*</span></label>
                    <input type="text" id="designacao" name="designacao" class="form-control @error('designacao') is-invalid @enderror"
                           value="{{ old('designacao', $ano->designacao) }}">
                    @error('designacao')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="data_inicio" class="form-label">Data de Início <span class="text-danger">*</span></label>
                    <input type="date" id="data_inicio" name="data_inicio" class="form-control @error('data_inicio') is-invalid @enderror"
                           value="{{ old('data_inicio', $ano->data_inicio) }}">
                    @error('data_inicio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-md-3">
                    <label for="data_fim" class="form-label">Data de Fim <span class="text-danger">*</span></label>
                    <input type="date" id="data_fim" name="data_fim" class="form-control @error('data_fim') is-invalid @enderror"
                           value="{{ old('data_fim', $ano->data_fim) }}">
                    @error('data_fim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Atualizar
                    </button>
                    <a href="{{ route('anos-letivos.index') }}" class="btn btn-outline-secondary ms-2">
                        <i class="fas fa-times me-1"></i> Cancelar
                    </a>
                </div>

                @if(!$ano->activo)
                    <form action="{{ route('anos-letivos.activar', $ano->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary"
                                onclick="return confirm('Deseja ativar este ano letivo?')">
                            <i class="fas fa-check me-1"></i> Ativar Ano Letivo
                        </button>
                    </form>
                @endif
            </div>
        </form>
    </div>

</x-layout-principal>
