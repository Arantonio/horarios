<x-layout-principal page-title="Disponibilidade de Horários">
    <div class="container">
        <h4 class="mb-4">Indicar Disponibilidade de Horários</h4>
    <hr>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        <form action="{{ route('disponibilidade.store') }}" method="POST" id="form-disponibilidade" class="card shadow-sm p-4 border-0 bg-white">
            @csrf

            <div class="row mb-4">
                <div class="col-md-4">
                    <label class="form-label">Semestre <span class="text-danger">*</span></label>
                    <select name="semestre" class="form-select @error('semestre') is-invalid @enderror">
                        <option value="">-- Selecionar --</option>
                        <option value="I" {{ old('semestre') == 'I' ? 'selected' : '' }}>I</option>
                        <option value="II" {{ old('semestre') == 'II' ? 'selected' : '' }}>II</option>
                    </select>
                    @error('semestre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label">Período <span class="text-danger">*</span></label>
                    <select class="form-select" id="periodoSelect">
                      
                        <option value="Manhã">Manhã</option>
                        <option value="Tarde">Tarde</option>
                        <option value="Noite">Noite</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive mb-4">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>Horários</th>
                            <th>Segunda</th>
                            <th>Terça</th>
                            <th>Quarta</th>
                            <th>Quinta</th>
                            <th>Sexta</th>
                        </tr>
                    </thead>
                    <tbody id="tabela-horarios">
                        <!-- Preenchido dinamicamente via JS -->
                    </tbody>
                </table>
            </div>

            <input type="hidden" name="disponibilidades_json" id="disponibilidades_json">

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-1"></i> Guardar Disponibilidade
                </button>
            </div>
        </form>
    </div>


    {{-- Injeção de dados existentes --}}
    <script>
        const disponibilidadesPreMarcadas = @json($disponibilidades ?? []);
    </script>

    {{-- Script --}}
    <script>
        const horariosPorPeriodo = {
            'Manhã': ['09:00 - 09:45', '09:50 - 10:35', '10:40 - 11:25', '11:30 - 12:15', '12:20 - 13:05'],
            'Tarde': ['14:00 - 14:45', '14:50 - 15:35', '15:40 - 16:25', '16:30 - 17:15', '17:20 - 18:05'],
            'Noite': ['18:10 - 18:55', '19:00 - 19:45', '19:50 - 20:35', '20:40 - 21:25', '21:30 - 22:10']
        };

        const diasSemana = ['segunda', 'terca', 'quarta', 'quinta', 'sexta'];

        const tabela = document.getElementById('tabela-horarios');
        const periodoSelect = document.getElementById('periodoSelect');
        const semestreSelect = document.querySelector('select[name=semestre]');

        function gerarTabela(periodo) {
            tabela.innerHTML = '';
            const horarios = horariosPorPeriodo[periodo];

            horarios.forEach(horario => {
                const tr = document.createElement('tr');
                const th = document.createElement('th');
                th.innerText = horario;
                tr.appendChild(th);

                diasSemana.forEach(dia => {
                    const td = document.createElement('td');
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.classList.add('form-check-input');
                    checkbox.setAttribute('data-dia', dia);
                    checkbox.setAttribute('data-hora', horario);
                    td.appendChild(checkbox);
                    tr.appendChild(td);
                });

                tabela.appendChild(tr);
            });

            aplicarMarcacoesExistentes(semestreSelect.value);
        }

        function aplicarMarcacoesExistentes(semestreSelecionado) {
            if (!disponibilidadesPreMarcadas.length) return;

            document.querySelectorAll('input[data-dia][data-hora]').forEach(cb => {
                const dia = cb.getAttribute('data-dia');
                const hora = cb.getAttribute('data-hora');

                const encontrado = disponibilidadesPreMarcadas.find(item =>
                    item.dia_semana === dia &&
                    item.faixa_horaria === hora &&
                    item.semestre === semestreSelecionado
                );

                if (encontrado) {
                    cb.checked = true;
                }
            });
        }

        // Eventos
        periodoSelect.addEventListener('change', () => {
            gerarTabela(periodoSelect.value);
        });

        semestreSelect.addEventListener('change', () => {
            gerarTabela(periodoSelect.value);
        });

        gerarTabela(periodoSelect.value); // Inicial

        // Submissão
        document.getElementById('form-disponibilidade').addEventListener('submit', function (e) {
            e.preventDefault();

            const selecionados = [];
            const semestre = semestreSelect.value;

            document.querySelectorAll('input[type=checkbox]:checked').forEach(cb => {
                selecionados.push({
                    dia: cb.getAttribute('data-dia'),
                    hora: cb.getAttribute('data-hora'),
                    semestre: semestre
                });
            });

            if (selecionados.length === 0) {
                alert('⚠️ Por favor, selecione pelo menos um horário.');
                return;
            }

            document.getElementById('disponibilidades_json').value = JSON.stringify(selecionados);
            this.submit();
        });
    </script>
</x-layout-principal>
