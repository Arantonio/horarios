<x-layout-principal titulo="Editar Associação de Turma e Unidade Curricular">
    <div class="container">
        <h1 class="mb-4">Editar Associação</h1>




        <form action="{{ route('turma-unidade-curricular.update', $associacao->id) }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="turma_id" class="form-label">Turma</label>
                    <select name="turma_id" class="form-control">
                        @foreach($turmas as $turma)
                            <option value="{{ $turma->id }}" {{ $associacao->turma_id == $turma->id ? 'selected' : '' }}>
                                {{ $turma->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('turma_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="unidade_curricular_id" class="form-label">Unidade Curricular</label>
                    <select name="unidade_curricular_id" class="form-control">
                        @foreach($unidades as $uc)
                            <option value="{{ $uc->id }}" {{ $associacao->unidade_curricular_id == $uc->id ? 'selected' : '' }}>
                                {{ $uc->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('unidade_curricular_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="professor_regente_id" class="form-label">Professor Regente</label>
                    <select name="professor_regente_id" class="form-control">
                        <option value="">-- Nenhum --</option>
                        @foreach($professores as $prof)
                            <option value="{{ $prof->id }}" {{ $associacao->professor_regente_id == $prof->id ? 'selected' : '' }}>
                                {{ $prof->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('professor_regente_id') <div class="text-danger">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="outros_professores" class="form-label">Outros Professores</label>
                    <select name="outros_professores[]" class="form-control" multiple>
                        @foreach($professores as $prof)
                            <option value="{{ $prof->id }}"
                                @if(collect($associacao->outros_professores)->contains($prof->id)) selected @endif>
                                {{ $prof->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('outros_professores') <div class="text-danger">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Atualizar</button>
                <a href="{{ route('turma-unidade-curricular.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</x-layout-principal>
