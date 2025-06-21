<x-layout-principal page-title="Programa de Estudo">

    <div class="container py-4">
        {{-- Título --}}
        <h1 class="mb-3">
            <i class="fas fa-layer-group me-2 text-primary"></i> Novo Programa de Estudo
        </h1>
        <hr class="mb-4">

        {{-- Formulário --}}
        <form action="{{ route('programas-estudo.store') }}" method="POST">
            @csrf

            @include('programas-estudo.form')

            {{-- Botões --}}
            <div class="mt-4 d-flex justify-content-start gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save me-1"></i> Guardar
                </button>
                <a href="{{ route('programas-estudo.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Cancelar
                </a>
            </div>
        </form>
    </div>

</x-layout-principal>
