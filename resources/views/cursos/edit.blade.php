<x-layout-principal page-title="Cursos">
    <div class="container">
        <h1 class="mb-4">Editar Curso</h1>

        <hr>

        <form action="{{ route('cursos.update', $curso->id) }}" method="POST" class="shadow-sm bg-light p-4 rounded">
            @csrf


            @include('cursos.form')

            <div class="mt-4 d-flex justify-content-end gap-2">
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fas fa-save me-1"></i> Atualizar
                </button>
                <a href="{{ route('cursos.index') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</x-layout-principal>
