<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('dashboard.index') }}">
      <img style="width: 175px;" class="login-logo-square mb-2" src="{{ asset('assets/img/logo-sm.png') }}" alt="Logo" />


    </a>
  </div>
  @include('blocks.sidebar-user')
  <ul class="sidebar-menu">
    <li class="menu-header">Menu de Navegación</li>
    <li class="dropdown {{ request()->is('dashboard*') ? 'active' : '' }}">
      <a href="{{ route('dashboard.index') }}" class="nav-link" data-title="Dashboard">
        <i class="material-icons">dashboard</i><span>Inicio</span>
      </a>
    </li>
    @if(auth()->user()->tipo_usuario == 1)
    <li class="dropdown {{ request()->is('users*') ? 'active' : '' }}">
      <a href="{{ route('users.index') }}" class="nav-link" data-title="Usuarios">
        <i class="material-icons">group</i><span>Usuarios</span>
      </a>
    </li>
    <li class="dropdown {{ request()->is('banners*') ? 'active' : '' }}">
      <a href="{{ route('banners.index') }}" class="nav-link" data-title="Banners">
        <i class="material-icons">image</i><span>Banners</span>
      </a>
    </li>
    <li class="dropdown {{ request()->is('faq*') ? 'active' : '' }}">
      <a href="{{ route('faq.index') }}" class="nav-link" data-title="Preguntas">
        <i class="material-icons">help_outline</i><span>Preguntas Frecuentes</span>
      </a>
    </li>
    <li class="dropdown {{ request()->is('productos*') ? 'active' : '' }}">
      <a href="{{ route('productos.index') }}" class="nav-link" data-title="Productos">
        <i class="material-icons">inventory_2</i><span>Productos</span>
      </a>
    </li>
    <li class="dropdown {{ request()->is('clientes*') ? 'active' : '' }}">
      <a href="{{ route('clientes.index') }}" class="nav-link" data-title="Clientes">
        <i class="material-icons">people_outline</i><span>Clientes</span>
      </a>
    </li>
    <li class="dropdown {{ request()->is('ventas*') ? 'active' : '' }}">
      <a href="{{ route('ventas.index') }}" class="nav-link" data-title="Ventas">
        <i class="material-icons">point_of_sale</i><span>Ventas</span>
      </a>
    </li>

    @endif
    @if(auth()->user()->tipo_usuario == 2)
    <li class="dropdown {{ request()->is('banners*') ? 'active' : '' }}">
      <a href="{{ route('banners.index') }}" class="nav-link" data-title="Banners">
        <i class="material-icons">image</i><span>Banners</span>
      </a>
    </li>
    <li class="dropdown {{ request()->is('faq*') ? 'active' : '' }}">
      <a href="{{ route('faq.index') }}" class="nav-link" data-title="Preguntas">
        <i class="material-icons">help_outline</i><span>Preguntas Frecuentes</span>
      </a>
    </li>
    <li class="dropdown {{ request()->is('productos*') ? 'active' : '' }}">
      <a href="{{ route('productos.index') }}" class="nav-link" data-title="Productos">
        <i class="material-icons">inventory_2</i><span>Productos</span>
      </a>
    </li>
    <li class="dropdown {{ request()->is('ventas*') ? 'active' : '' }}">
      <a href="{{ route('ventas.index') }}" class="nav-link" data-title="Ventas">
        <i class="material-icons">point_of_sale</i><span>Ventas</span>
      </a>
    </li>

    @endif
  </ul>
</aside>