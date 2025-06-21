<x-layout-principal page-title="Departamentos">

    <div class="w-100 p-4">

        <h3>Departamentos</h3>

        <hr>

        @if ($departamentos->count() === 0)
            <div class="text-center my-5">
                <p>Não foi encontrado nenhum departamento.</p>
                <a href="{{ route('departamentos.new-departamento') }}" class="btn btn-primary">Criar um novo departamento</a>
            </div>
        @else
            <div class="mb-3">
                <a href="{{ route('departamentos.new-departamento') }}" class="btn btn-primary">Criar um novo departamento</a>
            </div>

            <table class="table w-50" id="table">
                <thead class="table-dark">
                    <th>Departamentos</th>
                    <th></th>
                </thead>
                <tbody>

                    @foreach ($departamentos as $departamento)
                        <tr>
                            <td>{{ $departamento->nome }}</td>
                            <td>

                                <div class="d-flex gap-3 justify-content-end">
                                    @if (in_array($departamento->id, [1, 2, 3, 4]))
                                        <i class="fa-solid fa-lock"></i>
                                    @else
                                        <a href="{{ route('departamentos.edit-departamento', ['id' =>$departamento->id])}}"
                                            class="btn btn-sm btn-outline-dark ms-3"><i
                                                class="fa-regular fa-pen-to-square me-2"></i>Editar</a>
                                        <a href="{{ route('departamentos.delete-departamento', ['id' =>$departamento->id])}}"
                                            class="btn btn-sm btn-outline-dark ms-3"><i
                                                class="fa-regular fa-trash-can me-2"></i>Apagar</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        @endif

    </div>


</x-layout-principal>
