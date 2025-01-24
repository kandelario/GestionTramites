@if (Auth::user()->hasRole('Superadmin') || Auth::user()->hasRole('Admin'))
    <li class="nav-header">
        <p>GESTIÓN</p>
    </li>
    <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Usuarios</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('plazas.index') }}" class="nav-link {{ Request::is('plazas*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-map-marker"></i>
            <p>Plazas</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('asesors.index') }}" class="nav-link {{ Request::is('asesors*') ? 'active' : '' }}">
            <i class="nav-icon fa fa-briefcase"></i>
            <p>Asesores</p>
        </a>
    </li>

    <li class="nav-header">
        <p>SERVICIOS</p>
    </li>

    <li class="nav-item">
        <a href="{{ route('tramites.index') }}" class="nav-link {{ Request::is('tramites*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-dollar-sign"></i>
            <p>Trámites</p>
        </a>
    </li>
@endif

@if (Auth::user()->hasRole('Superadmin') || Auth::user()->hasRole('Admin'))
    <li class="nav-header">
        <p>SERVICIOS</p>
    </li>

    <li class="nav-item">
        <a href="{{ route('tramites.index') }}" class="nav-link {{ Request::is('tramites*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-dollar-sign"></i>
            <p>Trámites</p>
        </a>
    </li>
@endif







{{-- <li class="nav-item">
    <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Clientes</p>
    </a>
</li> --}}






