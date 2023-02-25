@extends('layouts.app')
@section('title')
Clientes
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Clientes</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h3 class="text-center">Dashboard Content</h3> --}}
                        {{-- @can('crear-rol')
                        <a href="{{ route('clientes.create') }}" class="btn btn-warning">Nuevo cliente</a>
                        @endcan --}}
                        <br>
                        <br>
                        <div class="table-responsive">

                            <table class="table table-hover table-striped mt-2" id="table_id">
                                <thead style="background-color: #0C0F0A">
                                    <th style="color: white">ID</th>
                                    <th style="color: white">Nombre</th>
                                    <th style="color: white">Apellidos</th>

                                    <th style="color: white">E-mail</th>
                                    <th style="color: white">Teléfono</th>
                                    <th style="color: white">Pedidos</th>

                                    {{-- <th style="color: white">Pedidos</th> --}}
                                    {{-- <th style="color: white">Contraseña</th> --}}
                                    <th style="color: white">Fecha de creación</th>

                                    {{-- <th style="color: white">Acciones</th> --}}
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                    <tr>
                                        <td>{{$cliente->id}}</td>

                                        <td>{{$cliente->name}}</td>
                                        <td>{{$cliente->lastname}}</td>

                                        <td>{{$cliente->email}}</td>
                                        <td>{{$cliente->phone}}</td>
                                        {{-- <td>{{$cliente->cliente_pedido_id}}</td> --}}

                                        {{-- <td>{{$cliente->password}}</td> --}}
                                        <td>
                                            {{ DB::table('pedidos')->where("user_id","=",$cliente->id)->count(); }}

                                        </td>
                                        <td>{{$cliente->created_at}}</td>


                                        {{-- <td>
                                            @can('editar-rol')
                                            <a class="btn btn-info" href="{{ route('clientes.edit', $cliente->id) }}"><i class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('eliminar-rol')
                                            {!! Form::open(['method'=> 'DELETE', 'route'=> ['clientes.destroy', $cliente->id], 'style'=>'display: inline', 'class'=>'formEliminar',]) !!}
                                            <button class='btn btn-danger' type='submit' value='submit'>
                                                <i class='fa fa-eraser'> </i> </button>
                                                {!! Form::close() !!}
                                                @endcan
                                            </td> --}}
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="table-responsive">

                                    <div class="pagination justify-content-end">
                                        {!! $clientes->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script language="JavaScript" type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" defer></script>
            <script type="text/javascript">
                $(document).ready( function () {
                    $('#table_id').DataTable({
                        "paging": true,
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                        }

                    });
                } );
            </script>
            <script>
                (function () {
                    'use strict'
                    //debemos crear la clase formEliminar dentro del form del boton borrar
                    //recordar que cada registro a eliminar esta contenido en un form
                    var forms = document.querySelectorAll('.formEliminar')
                    Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                            event.preventDefault()
                            event.stopPropagation()
                            Swal.fire({
                                title: '¿Confirma la eliminación del usuario?',
                                icon: 'info',
                                showCancelButton: true,
                                confirmButtonColor: '#20c997',
                                cancelButtonColor: '#6c757d',
                                confirmButtonText: 'Confirmar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    this.submit();
                                    // Swal.fire('¡Eliminado!', 'El registro ha sido eliminado exitosamente.','success');
                                    Swal.fire({

                                        icon: 'success',
                                        title: 'El usuario ha sido eliminado',
                                        showConfirmButton: false,
                                        timer: 1500
                                    })
                                }
                            })
                        }, false)
                    })
                })()
            </script>

            @endsection
