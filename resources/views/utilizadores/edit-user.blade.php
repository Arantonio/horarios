<x-layout-principal page-title="Editar Utilizador">

    <div class="w-100 p-4">

        <h3>Editar Utilizador</h3>
        <hr>

        <!-- Mantemos apenas o método POST -->
        <form action="{{ route('utilizadores.update-user') }}" method="POST">
            @csrf

            <div class="d-flex gap-5">
                <p>Nome: <strong>{{ $utilizador->nome }}</strong></p>
                <p>Email: <strong>{{ $utilizador->email }}</strong></p>
            </div>

            <input type="hidden" name="utilizador_id" value="{{ $utilizador->id }}">

            <div class="container-fluid">
                <div class="row gap-3">

                    {{-- user --}}
                    <div class="col border border-black p-4">
                        
                        <div class="col">
                            <div class="mb-3">
                                <label for="grau_academico" class="form-label">Grau Académico</label>
                                <select class="form-select" id="grau_academico" name="grau_academico">
                                    <option value="">--- Selecione ---</option>
                                    <option value="Licenciado"
                                        {{ old('grau_academico', $utilizador->detalhes->grau_academico ?? '') == 'Licenciado' ? 'selected' : '' }}>
                                        Licenciado
                                    </option>
                                    <option value="Mestre"
                                        {{ old('grau_academico', $utilizador->detalhes->grau_academico ?? '') == 'Mestre' ? 'selected' : '' }}>
                                        Mestre
                                    </option>
                                    <option value="Especialista"
                                        {{ old('grau_academico', $utilizador->detalhes->grau_academico ?? '') == 'Especialista' ? 'selected' : '' }}>
                                        Especialista
                                    </option>
                                    <option value="Professor Doutor"
                                        {{ old('grau_academico', $utilizador->detalhes->grau_academico ?? '') == 'Professor Doutor' ? 'selected' : '' }}>
                                        Professor Doutor
                                    </option>
                                </select>
                                @error('grau_academico')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <p class="mb-3">Perfil: <strong>Funcionário</strong></p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('utilizadores.user') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Editar utilizador</button>
                    </div>

                </div>
            </div>
        </form>

    </div>

</x-layout-principal>
