
<li class="nav-item">
    <a href="{{ route('asesors.index') }}" class="nav-link {{ Request::is('asesors*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Asesors</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Clientes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tramites.index') }}" class="nav-link {{ Request::is('tramites*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tramites</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('plazas.index') }}" class="nav-link {{ Request::is('plazas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Plazas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Users</p>
    </a>
</li>
