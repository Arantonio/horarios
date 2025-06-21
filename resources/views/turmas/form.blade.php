<div class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="codigo" class="form-label">Código da Turma <span class="text-danger">*</span></label>
    <input type="text" name="codigo" class="form-control" value="{{ old('codigo') }}">
    @error('codigo')
        <small class="text-danger">{{ $message }}</small>
    @enderror


    </div>




    <div class="col-md-4">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome', $turma->nome ?? '') }}">
        @error('nome') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Período</label>
        <select name="periodo" class="form-select">
            <option value="">Selecionar</option>
            <option value="manha" {{ old('periodo', $turma->periodo ?? '') == 'manha' ? 'selected' : '' }}>Manhã</option>
            <option value="tarde" {{ old('periodo', $turma->periodo ?? '') == 'tarde' ? 'selected' : '' }}>Tarde</option>
            <option value="noite" {{ old('periodo', $turma->periodo ?? '') == 'noite' ? 'selected' : '' }}>Noite</option>
        </select>
        @error('periodo') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Curso</label>
        <select name="curso_id" class="form-select">
            <option value="">Selecionar</option>
            @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}" {{ old('curso_id', $turma->curso_id ?? '') == $curso->id ? 'selected' : '' }}>
                    {{ $curso->nome }}
                </option>
            @endforeach
        </select>
        @error('curso_id') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Programa de Estudo</label>
        <select name="programa_estudo_id" class="form-select">
            <option value="">Selecionar</option>
            @foreach ($programas as $prog)
                <option value="{{ $prog->id }}" {{ old('programa_estudo_id', $turma->programa_estudo_id ?? '') == $prog->id ? 'selected' : '' }}>
                    {{ $prog->nome }}
                </option>
            @endforeach
        </select>
        @error('programa_estudo_id') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Ano Letivo</label>
        <select name="ano_letivo_id" class="form-select">
            <option value="">Selecionar</option>
            @foreach ($anos as $ano)
                <option value="{{ $ano->id }}" {{ old('ano_letivo_id', $turma->ano_letivo_id ?? '') == $ano->id ? 'selected' : '' }}>
                    {{ $ano->designacao }}
                </option>
            @endforeach
        </select>
        @error('ano_letivo_id') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
</div>

<div class="mt-4">
    <button type="submit" class="btn btn-success">
        <i class="fas fa-save me-1"></i> Guardar
    </button>
    <a href="{{ route('turmas.index') }}" class="btn btn-outline-secondary">
        Cancelar
    </a>
</div>
