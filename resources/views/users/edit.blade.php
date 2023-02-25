@extends('layouts.app')
@section('title')
Usuarios
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Usuario</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                          {{-- validation --}}
                          @if ($errors->any())
                          <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>Error</strong>
                            @foreach ($errors->all() as $error)
                                <span class="badge badge-danger">{{$error}}</span>
                            @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          @endif

                         {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="name">Nombre</label>
                                    {!! Form::text('name', null, array('class'=>'form-control'))  !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="lastname">Apellidos</label>
                                    {!! Form::text('lastname', null, array('class'=>'form-control'))  !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="email">Email</label>
                                    {!! Form::text('email', null, array('class'=>'form-control'))  !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="phone">Teléfono</label>
                                    {!! Form::text('phone', null, array('class'=>'form-control'))  !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="password">Contraseña (si no requiere cambiarla deje el campo vacio)</label>
                                   {!! Form::password('password', array('class'=>'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="password">Confirmar contraseña (si no requiere cambiarla deje el campo vacio)</label>
                                   {!! Form::password('confirm-password', array('class'=>'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class=" form-group">
                                    <label for="">Roles</label>
                                    {!! Form::select('roles[]', $roles, [], array('class'=>'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-12 col-md-12">
                                <button type="submit" class="btn btn-info" id="swal-edit">
                                    Editar
                                </button>
                                <a href="{{ route('users.index')}}" class="btn btn-danger">
                                    Cancelar
                                </a>
                            </div>
                          </div>
                          {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById("swal-edit").addEventListener("click", success);

        function success() {
            Swal.fire({
                icon: 'success',
                title: 'Registro editado correctamente',
                showConfirmButton: false,
                timer: 3000
            })
            }
    </script>
@endsection
