<div class="row">
    {{-- Nome do Curso --}}
    <div class="col-md-4 mb-3">
        <label for="nome" class="form-label">Nome do Curso</label>
        <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome"
            value="{{ old('nome', $curso->nome ?? '') }}">
        @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Descrição --}}
    <div class="col-md-4 mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" id="descricao" rows="1">{{ old('descricao', $curso->descricao ?? '') }}</textarea>
        @error('descricao')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    {{-- Programa de Estudo --}}
    <div class="col-md-4 mb-3">
        <label for="programa_estudo_id" class="form-label">Programa de Estudo</label>
        <select name="programa_estudo_id" class="form-select @error('programa_estudo_id') is-invalid @enderror">
            <option value="">-- Selecionar --</option>
            @foreach($programas as $programa)
                <option value="{{ $programa->id }}" {{ old('programa_estudo_id', $curso->programa_estudo_id ?? '') == $programa->id ? 'selected' : '' }}>
                    {{ $programa->nome }}
                </option>
            @endforeach
        </select>
        @error('programa_estudo_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
