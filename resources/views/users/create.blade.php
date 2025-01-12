@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    Crear Usario
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div id="accordion">
            <div class="card">

                {!! Form::open(['route' => 'users.store']) !!}
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#datoscliente" aria-expanded="true" aria-controls="collapseOne">
                        Datos del cliente
                        </button>
                    </h5>
                </div>
                <div id="datoscliente" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                        <div class="row">
                            @include('users.fields')
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('users.index') }}" class="btn btn-default"> Cancelar </a>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
