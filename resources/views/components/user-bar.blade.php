<div class="user-bar" id="userBar">
    <div class="d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <div class="d-flex align-items-center">
            <h4 class="ms-3 m-0 p-0 sidebar-text">
                {{ config('app.name') }}
            </h4>
        </div>



        {{-- Ano Letivo Ativo --}}

        <div class="d-flex align-items-center gap-2">
            <i class="fas fa-calendar-alt fa-lg text-white"></i>
            <div>
                @php
                    $anoLetivo = \App\Models\AnoLetivo::find(session('ano_letivo_ativo_id'));
                @endphp

                @if ($anoLetivo)
                    <div class="text-white">
                        <strong>Ano Letivo:</strong> {{ $anoLetivo->designacao }}
                    </div>
                @endif


            </div>
        </div>




        <!-- User Info -->
        <div class="d-flex align-items-center">
            <i class="fas fa-user-circle me-3"></i>
            <a href="#" class="text-white me-3">
                {{ auth()->user()->nome }}
            </a>

            <!-- Logout -->
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>
</div>
