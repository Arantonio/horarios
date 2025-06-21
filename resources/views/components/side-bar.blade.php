<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="logo" width="80px" class="img-fluid">
        </a>
    </div>

    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link text-white my-2">
                <i class="fas fa-home"></i> <span class="sidebar-text">Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white my-2 d-flex justify-content-between align-items-center" onclick="toggleGestao()">
                <div>
                    <i class="fas fa-users-cog"></i> <span class="sidebar-text">Adiministração</span>
                </div>
                <i class="fas fa-chevron-down" id="gestaoIcon"></i>
            </a>
            <ul class="list-unstyled ms-4 collapse" id="gestaoMenu">
                <li>
                    <a class="nav-link text-white" href="{{ route('utilizadores.user')}}">
                        <i class="fas fa-user"></i> Utilizadores
                    </a>
                </li>
                <li>
                    <a class="nav-link text-white" href="{{ route('departamentos') }}">
                        <i class="fas fa-building"></i> Departamentos
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#submenu-anoletivo" data-bs-toggle="collapse" class="nav-link text-white my-2">
                <i class="fas fa-calendar-alt"></i>
                <span class="sidebar-text">Ano Letivo</span>
                <i class="fas fa-chevron-down float-end"></i>
            </a>
            <ul class="collapse list-unstyled ps-3" id="submenu-anoletivo">
                <li>
                    <a href="{{ route('anos-letivos.index') }}" class="nav-link text-white">
                        <i class="fas fa-list"></i> Listar Anos Letivos
                    </a>
                </li>
                <li>
                    <a href="{{ route('anos-letivos.create') }}" class="nav-link text-white">
                        <i class="fas fa-plus-circle"></i> Criar Ano Letivo
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link text-white my-2" data-bs-toggle="collapse" href="#submenuProgramas" role="button" aria-expanded="false" aria-controls="submenuProgramas">
                <i class="fa-solid fa-book-open-reader me-2"></i>
                <span class="sidebar-text">Programas de Estudo</span>
                <i class="fa-solid fa-chevron-down float-end"></i>
            </a>
            <div class="collapse ps-3" id="submenuProgramas">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('programas-estudo.index') }}" class="nav-link text-white my-1">
                            <i class="fa-solid fa-list me-2"></i> Listar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('programas-estudo.create') }}" class="nav-link text-white my-1">
                            <i class="fa-solid fa-plus me-2"></i> Criar
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white my-2" data-bs-toggle="collapse" href="#submenuCursos" role="button" aria-expanded="false" aria-controls="submenuCursos">
                <i class="fas fa-book me-2"></i>
                <span class="sidebar-text">Gestão de Cursos</span>
                <i class="fa-solid fa-chevron-down float-end"></i>
            </a>
            <div class="collapse ps-3" id="submenuCursos">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('cursos.index') }}" class="nav-link text-white my-1">
                            <i class="fa-solid fa-list me-2"></i> Listar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cursos.create') }}" class="nav-link text-white my-1">
                            <i class="fa-solid fa-plus me-2"></i> Criar
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a href="#ucSubmenu" data-bs-toggle="collapse" class="nav-link text-white my-2">
                <i class="fas fa-book-open"></i>
                <span class="sidebar-text">Unidades Curriculares</span>
                <i class="fas fa-chevron-down float-end mt-1"></i>
            </a>
            <ul class="collapse list-unstyled ms-3" id="ucSubmenu">
                <li class="nav-item">
                    <a href="{{ route('unidades-curriculares.index') }}" class="nav-link text-white">
                        <i class="fas fa-list"></i> Listar
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('unidades-curriculares.create') }}" class="nav-link text-white">
                        <i class="fas fa-plus-circle"></i> Criar
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a class="nav-link text-white my-2" data-bs-toggle="collapse" href="#submenuTurmas" role="button" aria-expanded="false" aria-controls="submenuTurmas">
                <i class="fas fa-school me-2"></i>
                <span class="sidebar-text">Gestão de Turmas</span>
                <i class="fas fa-chevron-down float-end small"></i>
            </a>

            <div class="collapse ps-3" id="submenuTurmas">
                <ul class="nav flex-column">

                    <!-- Turmas -->
                    <li class="nav-item">
                        <a class="nav-link text-white py-1" href="{{ route('turmas.index') }}">
                            <i class="fas fa-list me-1"></i> Listar Turmas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-1" href="{{ route('turmas.create') }}">
                            <i class="fas fa-plus me-1"></i> Nova Turma
                        </a>
                    </li>

                 <hr>

                    <!-- Associações Turma x UC -->
                    <li class="nav-item">
                        <a class="nav-link text-white py-1" href="{{ route('turma-unidade-curricular.index') }}">
                            <i class="fas fa-link me-1"></i> Listar Associações
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white py-1" href="{{ route('turma-unidade-curricular.create') }}">
                            <i class="fas fa-plus-circle me-1"></i> Nova Associação
                        </a>
                    </li>

                </ul>
            </div>
        </li>






        <li class="nav-item">
            <a class="nav-link text-white my-2" data-bs-toggle="collapse" href="#submenuHorarios" role="button" aria-expanded="false" aria-controls="submenuHorarios">
                <i class="fas fa-calendar-alt me-2"></i>
                <span class="sidebar-text">Meus Horários</span>
                <i class="fas fa-chevron-down float-end small"></i>
            </a>

            <div class="collapse ps-3" id="submenuHorarios">
                <ul class="nav flex-column">

                    <li class="nav-item">
                        <a class="nav-link text-white py-1" href="{{ route('disponibilidade.index') }}">
                            <i class="fas fa-calendar-check me-1"></i> Ver Disponibilidade
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white py-1" href="{{ route('disponibilidade.create') }}">
                            <i class="fas fa-clock me-1"></i> Registar Disponibilidade
                        </a>
                    </li>

        

                    <li class="nav-item">
                        <a class="nav-link text-white py-1" href="#">
                            <i class="fas fa-calendar-day me-1"></i> Ver Horário
                        </a>
                    </li>

                </ul>
            </div>
        </li>




        <li class="nav-item">
            <a href="{{ route('user.perfil')}}" class="nav-link text-white my-2">
                <i class="fas fa-user"></i> <span class="sidebar-text">Meu Perfil</span>
            </a>
        </li>
<hr>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link text-danger"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt m-3"></i> Sair
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</div>
