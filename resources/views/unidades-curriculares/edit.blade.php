<x-layout-principal page-title="Editar Unidade Curricular">
 <div class="container">
    <h1>Editar Unidade Curricular</h1>
    <hr>

    <form action="{{ route('unidades-curriculares.update', ['id' => $uc->id]) }}" method="POST">
        @csrf
        @include('unidades-curriculares.form', ['uc' => $uc])
    </form>
    </div>

</x-layout-principal>
