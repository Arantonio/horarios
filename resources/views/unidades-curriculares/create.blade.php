<x-layout-principal page-title="Nova Unidade Curricular">

    <div class="w-100 p-4">
    <h1 class="mb-3">Criar Unidade Curricular</h1>
    <hr>
    <form action="{{ route('unidades-curriculares.store') }}" method="POST">
        @csrf
        @include('unidades-curriculares.form')
    </form>
    </div>
</x-layout-principal>
