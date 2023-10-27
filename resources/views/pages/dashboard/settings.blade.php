@extends('layouts.app')

@section('content')
<section class="section">
    <ul class="breadcrumb breadcrumb-style">
        <li class="breadcrumb-item">
            <h4 class="page-title">Mi Perfil</h4>
        </li>
    </ul>
    <div class="section-body">
        <div class="row mt-3">
            <div class="col-12 col-md-12 col-lg-4">
                @include('blocks.personal-information')
            </div>
            <div class="col-12 col-md-12 col-lg-8">
              <div class="card">
                <!-- f -->
                <form method="POST" action="{{ route('dashboard.change-password') }}" class="needs-validation" novalidate>
                  <div class="card-header">
                    <h4>Cambiar Contraseña</h4>
                  </div>
                  <div class="card-body">
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        <strong>{{ session()->get('success') }}</strong>
                      </div>
                    </div>
                    @elseif(session()->has('failed'))
                    <div class="alert alert-danger alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert"><span>&times;</span></button>
                        <strong>{{ session()->get('failed') }}</strong>
                      </div>
                    </div>
                    @endif
                    <div class="row">
                      <div class="form-group col-md-12 col-12">
                        <label>Contraseña actual</label>
                        <input type="password" name="current_password" class="form-control" minlength="6" required>
                        <div class="invalid-feedback">Por favor ingrese la contraseña actual</div>
                      </div>
                      <div class="form-group col-md-12 col-12">
                        <label>Contraseña nueva</label>
                        <input type="password" name="new_password" class="form-control" minlength="6" required>
                        <div class="invalid-feedback">Por favor ingrese la nueva contraseña</div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer pt-0">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                  </div>
                </form>
                <!-- f -->
              </div>
            </div>
        </div>
    </div>
</section>
@endsection