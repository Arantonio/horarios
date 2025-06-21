<div class="row">
    {{-- Código --}}
    <div class="col-md-4 mb-4">
        <label for="codigo" class="form-label fw-semibold">
            <i class="fas fa-barcode me-1 text-primary"></i> Código
        </label>
        <input type="text"
               id="codigo"
               name="codigo"
               class="form-control @error('codigo') is-invalid @enderror"
               value="{{ old('codigo', $programa->codigo ?? '') }}"
               placeholder="Ex: PS1 ou INF01">
        @error('codigo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Nome --}}
    <div class="col-md-4 mb-4">
        <label for="nome" class="form-label fw-semibold">
            <i class="fas fa-book me-1 text-primary"></i> Nome
        </label>
        <input type="text"
               id="nome"
               name="nome"
               class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome', $programa->nome ?? '') }}"
               placeholder="Ex: Engenharia Informática">
        @error('nome')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    {{-- Grau Académico --}}
    <div class="col-md-4 mb-4">
        <label for="grau_academico_id" class="form-label fw-semibold">
            <i class="fas fa-graduation-cap me-1 text-primary"></i> Grau Académico
        </label>
        <select name="grau_academico_id"
                id="grau_academico_id"
                class="form-select @error('grau_academico_id') is-invalid @enderror">
            <option value="">-- Selecionar --</option>
            @foreach($graus as $grau)
                <option value="{{ $grau->id }}"
                    {{ old('grau_academico_id', $programa->grau_academico_id ?? '') == $grau->id ? 'selected' : '' }}>
                    {{ $grau->nome }}
                </option>
            @endforeach
        </select>
        @error('grau_academico_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
