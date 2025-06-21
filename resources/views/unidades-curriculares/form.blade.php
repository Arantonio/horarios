<div class="card shadow-sm border-0 mb-4">
    <div class="card-body">
        <div class="row g-3">

            <div class="col-md-4">
                <label for="codigo" class="form-label">Código da UC</label>
                <input type="text" class="form-control" name="codigo" value="{{ old('codigo', $uc->codigo ?? '') }}" required>
            </div>

            <div class="col-md-4">
                <label for="nome" class="form-label">Nome da Unidade Curricular</label>
                <input type="text" class="form-control" name="nome" value="{{ old('nome', $uc->nome ?? '') }}" required>
            </div>

            <div class="col-md-4">
                <label for="programa_estudo_id" class="form-label">Programa de Estudo</label>
                <select class="form-select" name="programa_estudo_id">
                    <option value="">Selecionar programa</option>
                    @foreach($programas as $programa)
                        <option value="{{ $programa->id }}" {{ old('programa_estudo_id', $uc->programa_estudo_id ?? '') == $programa->id ? 'selected' : '' }}>
                            {{ $programa->nome }} ({{ $programa->codigo }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for="ano_curricular_id" class="form-label">Ano Curricular</label>
                <select class="form-select" name="ano_curricular_id">
                    <option value="">Selecionar ano</option>
                    @foreach($anos as $ano)
                        <option value="{{ $ano->id }}" {{ old('ano_curricular_id', $uc->ano_curricular_id ?? '') == $ano->id ? 'selected' : '' }}>
                            {{ $ano->nome ?? $ano->ordem }}
                        </option>
                    @endforeach
                </select>
            </div>



            <div class="col-md-4">
                <label for="tipo" class="form-label">Tipo</label>
                <select class="form-select" name="tipo">
                    <option value="">Selecionar</option>
                    <option value="T" {{ (old('tipo', $uc->tipo ?? '') == 'T') ? 'selected' : '' }}>Teórica</option>
                    <option value="P" {{ (old('tipo', $uc->tipo ?? '') == 'P') ? 'selected' : '' }}>Prática</option>
                    <option value="TP" {{ (old('tipo', $uc->tipo ?? '') == 'TP') ? 'selected' : '' }}>Teórico-Prática</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="carga_horaria" class="form-label">Carga Horária (h)</label>
                <input type="number" class="form-control" name="carga_horaria" value="{{ old('carga_horaria', $uc->carga_horaria ?? '') }}">
            </div>

            <div class="col-md-4">
                <label for="ects" class="form-label">ECTS</label>
                <input type="number" class="form-control" name="ects" value="{{ old('ects', $uc->ects ?? '') }}">
            </div>

            <div class="col-md-8">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" rows="1">{{ old('descricao', $uc->descricao ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <div class="card-footer bg-light text-end">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-1"></i> Guardar
        </button>
        <a href="{{ route('unidades-curriculares.index') }}" class="btn btn-danger">
            <i class="fas fa-arrow-left me-1"></i> Cancelar
        </a>
    </div>
</div>
