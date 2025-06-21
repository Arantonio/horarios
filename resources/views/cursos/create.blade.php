<x-layout-principal page-title="Cursos">
    <div class="container">
        <h1 class="mb-3">Novo Curso</h1>
        <hr>

        {{-- Validação de erros --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro!</strong> Verifica os campos abaixo:
                <ul class="mb-0 mt-2 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Formulário --}}
        <div class="card shadow-sm border-0">
            <div class="card-body bg-light">
                <form action="{{ route('cursos.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        {{-- Nome do Curso --}}
                        <div class="col-md-4 mb-3">
                            <label for="nome" class="form-label">Nome do Curso</label>
                            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
                            @error('nome') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        {{-- Programa de Estudo --}}
                        <div class="col-md-4 mb-3">
                            <label for="programa_estudo_id" class="form-label">Programa de Estudo</label>
                            <select name="programa_estudo_id" class="form-select">
                                <option value="">-- Selecionar --</option>
                                @foreach($programas as $programa)
                                    <option value="{{ $programa->id }}" {{ old('programa_estudo_id') == $programa->id ? 'selected' : '' }}>
                                        {{ $programa->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('programa_estudo_id') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        {{-- Descrição --}}
                        <div class="col-md-4 mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea name="descricao" class="form-control" rows="3">{{ old('descricao') }}</textarea>
                            @error('descricao') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    {{-- Botões --}}
                    <div class="mt-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-2">
                            <i class="fas fa-save me-1"></i> Guardar
                        </button>
                        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i> Cancelar
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout-principal>
