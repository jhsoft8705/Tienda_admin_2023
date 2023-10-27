<div class="sidebar-user mb-2 d-flex">
    <div class="sidebar-user-picture">
        <img class="rounded-circle" alt="{{ Auth::user()->nombre }}" src="{{ asset('assets/img/user.png') }}">
    </div>
    <div class="sidebar-user-details ml-2">
        <div class="user-name">{{ Auth::user()->nombre }}</div>
        <div class="user-role">
            @if(Auth::user()->tipo_usuario == 1)
            Administrador
            @elseif(Auth::user()->tipo_usuario == 2)
            Vendedor
            @endif
        </div>
    </div>
</div>