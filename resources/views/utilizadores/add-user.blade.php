<x-layout-principal page-title="Adicionar Utilizador">
    <div class="container my-4">
        <h1 class="mb-4">Adicionar Utilizador</h1>
        <hr>

        <form action="{{ route('utilizadores.create-user') }}" method="POST" class="shadow-sm p-4 rounded bg-light">
            @csrf

            <div class="row">
                {{-- Coluna 1 --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome" value="{{ old('nome') }}">
                        @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="select_departamento" class="form-label">Departamento</label>
                        <select class="form-select @error('select_departamento') is-invalid @enderror" name="select_departamento">
                            <option value="">-- Selecionar --</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}" {{ old('select_departamento') == $departamento->id ? 'selected' : '' }}>
                                    {{ $departamento->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('select_departamento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <p class="mt-3"><strong>Perfil:</strong> Funcionário</p>
                </div>

                {{-- Coluna 2 --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Sexo</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" value="Masculino" {{ old('sexo') == 'Masculino' ? 'checked' : '' }}>
                            <label class="form-check-label">Masculino</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" value="Feminino" {{ old('sexo') == 'Feminino' ? 'checked' : '' }}>
                            <label class="form-check-label">Feminino</label>
                        </div>
                        @error('sexo') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="grau_academico" class="form-label">Grau Académico</label>
                            <select class="form-select @error('grau_academico') is-invalid @enderror" name="grau_academico">
                                <option value="">Selecione</option>
                                <option value="Licenciado" {{ old('grau_academico') == 'Licenciado' ? 'selected' : '' }}>Licenciado</option>
                                <option value="Mestre" {{ old('grau_academico') == 'Mestre' ? 'selected' : '' }}>Mestre</option>
                                <option value="Especialista" {{ old('grau_academico') == 'Especialista' ? 'selected' : '' }}>Especialista</option>
                                <option value="Professor Doutor" {{ old('grau_academico') == 'Professor Doutor' ? 'selected' : '' }}>Professor Doutor</option>
                            </select>
                            @error('grau_academico') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control @error('data_nascimento') is-invalid @enderror" name="data_nascimento" value="{{ old('data_nascimento') }}">
                            @error('data_nascimento') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="telemovel" class="form-label">Telemóvel</label>
                        <div class="input-group">
                            <select class="form-select" name="indicativo">
                                <option value="+244" {{ old('indicativo') == '+244' ? 'selected' : '' }}>🇦🇴 +244</option>
                                <option value="+351" {{ old('indicativo') == '+351' ? 'selected' : '' }}>🇵🇹 +351</option>
                                <option value="+55" {{ old('indicativo') == '+55' ? 'selected' : '' }}>🇧🇷 +55</option>
                                <option value="+1" {{ old('indicativo') == '+1' ? 'selected' : '' }}>🇺🇸 +1</option>
                                <!-- Outros países -->
                            </select>
                            <input type="tel" class="form-control @error('telemovel') is-invalid @enderror" name="telemovel" placeholder="Número" value="{{ old('telemovel') }}">
                        </div>
                        @error('telemovel') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-end">
                <a href="{{ route('utilizadores.user') }}" class="btn btn-outline-danger me-3">Cancelar</a>
                <button type="submit" class="btn btn-success">Criar Utilizador</button>
            </div>
        </form>
    </div>
</x-layout-principal>
