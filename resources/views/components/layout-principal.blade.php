<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} @isset($pageTitle) - {{ $pageTitle }} @endisset</title>

    <!-- favicon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

    <!-- Bootstrap & Fontawesome -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>

    <!-- Sidebar -->
    <x-side-bar />

    <!-- Botão para Minimizar/Maximizar Sidebar -->
    <button class="toggle-btn p-1 m-0" onclick="toggleSidebar()" id="toggleBtn">
        <i class="fas fa-grip-lines"></i>
    </button>

    <!-- User Bar -->
    <x-user-bar class="user-bar" id="userBar" />

    <!-- Conteúdo -->
    <div class="content p-0" id="content">
        {{ $slot }}
    </div>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- JS: jQuery, Bootstrap, DataTables, Sidebar -->
    <script src="{{ asset('assets/datatables/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar.js') }}"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Inicialização do Select2 -->
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: "Selecionar",
                width: '100%'
            });
        });
    </script>

</body>

</html>
