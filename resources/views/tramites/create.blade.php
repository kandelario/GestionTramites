@extends('adminlte::page')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    Registrar Nuevo Trámite
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')
        

                {!! Form::open(['route' => 'tramites.store']) !!}
                <div id="accordion">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                @include('tramites.client_fields')
                            </div>

                            <div class="row">
                                @include('tramites.fields')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('tramites.index') }}" class="btn btn-default"> Cancelar </a>
                </div>
                {!! Form::close() !!}

            
    </div>
@endsection