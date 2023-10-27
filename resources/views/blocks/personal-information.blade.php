<div class="card author-box">
    <div class="card-body">
        <div class="author-box-center">
            <img alt="{{ $user->nombre }}" src="{{ asset('assets/img/user.png') }}" class="rounded-circle author-box-picture">
            <div class="clearfix"></div>
            <div class="author-box-name">{{ $user->nombre }}</div>
            <div class="author-box-job">
                @if($user->tipo_usuario == 1)
                Administrador
                @elseif($user->tipo_usuario == 2)
                Vendedor
                @endif
            </div>
            <div class="author-box-status">
                @if($user->estado == 1)
                <span class="text-success">Activo</span>
                @elseif($user->estado == 0)
                <span class="text-danger">Inactivo</span>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Información Personal</h4>
    </div>
    <div class="card-body">
        <div class="py-1">
            <p class="clearfix dark-color">
                <span class="float-left">Nombre</span>
                <span class="float-right text-muted">{{ $user->nombre }}</span>
            </p>
            <p class="clearfix dark-color">
                <span class="float-left">Apellido</span>
                <span class="float-right text-muted">{{ $user->apellidos }}</span>
            </p>
            <p class="clearfix dark-color">
                <span class="float-left">Celular</span>
                <span class="float-right text-muted">{{ $user->celular }}</span>
            </p>
            <p class="clearfix dark-color">
                <span class="float-left">Email</span>
                <span class="float-right text-muted">{{ $user->email }}</span>
            </p>
        </div>
    </div>
</div>