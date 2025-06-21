<x-layout-principal page-title="Nova Associação de Turma e Unidade Curricular">
    <div class="container">
        <h1 class="mb-4">Nova Associação</h1>
        <hr>

        <form action="{{ route('turma-unidade-curricular.store') }}" method="POST" class="card card-body shadow-sm p-4">
            @csrf

            <div class="row">
                {{-- Turma --}}
                <div class="col-md-4 mb-3">
                    <label for="turma_id" class="form-label">Turma <span class="text-danger">*</span></label>
                    <select name="turma_id" id="turma_id" class="form-select @error('turma_id') is-invalid @enderror">
                        <option value="">-- Selecionar Turma --</option>
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}"
                                data-programa="{{ $turma->programa_estudo_id }}"
                                {{ old('turma_id') == $turma->id ? 'selected' : '' }}>
                                {{ $turma->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('turma_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Unidade Curricular --}}
                <div class="col-md-4 mb-3">
                    <label for="unidade_curricular_id" class="form-label">Unidade Curricular <span class="text-danger">*</span></label>
                    <select name="unidade_curricular_id" id="unidade_curricular_id" class="form-select @error('unidade_curricular_id') is-invalid @enderror">
                        <option value="">-- Selecionar UC --</option>
                    </select>
                    @error('unidade_curricular_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Semestre --}}
                <div class="col-md-4 mb-3">
                    <label for="semestre" class="form-label">Semestre <span class="text-danger">*</span></label>
                    <select name="semestre" class="form-select @error('semestre') is-invalid @enderror">
                        <option value="">-- Selecionar --</option>
                        <option value="I" {{ old('semestre') == 'I' ? 'selected' : '' }}>I</option>
                        <option value="II" {{ old('semestre') == 'II' ? 'selected' : '' }}>II</option>
                    </select>
                    @error('semestre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Blocos Semanais --}}
                <div class="col-md-4 mb-3">
                    <label for="blocos_semanais" class="form-label">Blocos Semanais <span class="text-danger">*</span></label>
                    <input type="number" name="blocos_semanais" id="blocos_semanais" class="form-control @error('blocos_semanais') is-invalid @enderror" value="{{ old('blocos_semanais') }}">
                    @error('blocos_semanais')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Professor Regente --}}
                <div class="col-md-4 mb-3">
                    <label for="professor_regente_id" class="form-label">Professor Regente</label>
                    <select name="professor_regente_id" class="form-select">
                        <option value="">-- Nenhum --</option>
                        @foreach ($professores as $prof)
                            <option value="{{ $prof->id }}"
                                {{ old('professor_regente_id') == $prof->id ? 'selected' : '' }}>
                                {{ $prof->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('professor_regente_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Outros Professores --}}
                <div class="col-md-4 mb-3">
                    <label for="outros_professores" class="form-label">Outros Professores</label>
                    <select name="outros_professores[]" class="form-select select2" multiple>
                        @foreach ($professores as $prof)
                            <option value="{{ $prof->id }}" @if (collect(old('outros_professores'))->contains($prof->id)) selected @endif>
                                {{ $prof->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('outros_professores')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('turma-unidade-curricular.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-success">Guardar Associação</button>
            </div>
        </form>
    </div>

    {{-- Script para carregar UCs por programa e calcular blocos --}}
    <script>
        const todasUCs = @json($unidades); // Corrigido

        const turmaSelect = document.getElementById('turma_id');
        const ucSelect = document.getElementById('unidade_curricular_id');
        const blocosInput = document.getElementById('blocos_semanais');

        turmaSelect.addEventListener('change', () => {
            const programaId = turmaSelect.options[turmaSelect.selectedIndex].getAttribute('data-programa');

            ucSelect.innerHTML = '<option value="">-- Selecionar UC --</option>';
            todasUCs.forEach(uc => {
                if (uc.programa_estudo_id == programaId) {
                    const option = document.createElement('option');
                    option.value = uc.id;
                    option.textContent = uc.nome + ' (' + uc.carga_horaria + 'h)';
                    option.setAttribute('data-carga', uc.carga_horaria);
                    ucSelect.appendChild(option);
                }
            });
        });

        ucSelect.addEventListener('change', function () {
            const carga = parseInt(this.selectedOptions[0]?.dataset?.carga || 0);
            let blocos = 0;

            if (carga === 30) blocos = 2;
            else if (carga === 60) blocos = 4;
            else if (carga > 30 && carga < 60) blocos = 3;

            blocosInput.value = blocos;
        });
    </script>

</x-layout-principal>
