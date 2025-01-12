<div class="card col-sm-12">
    <div class="card-header bg-gradient-gray" id="headingOne">
        <h5 class="mb-0">
            <div class="text-warning">Datos del Trámite</div>
        </h5>
    </div>
    <div class="card-body row">
        <!-- Asesor Id Field -->
        <div class="form-group col-sm-4">
            @if (isset($asesores->id))
                {!! Form::label('asesor_id', 'Asesor:') !!}    
                {{$asesores->nombre}}
                {!! Form::hidden('asesor_id', $asesores->id, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
            @else
                {!! Form::label('asesor_id', 'Asesor:') !!}
                <select name="asesor_id" id="asesor_id" class="form-control disabled">
                    <option value="">SELECCIONE UN ASESOR</option>
                    @if (isset($asesores))
                        @foreach ($asesores as $asesor)
                            @if ($asesor->id == old('asesor_id'))
                                <option value="{{$asesor->id}}" selected>{{$asesor->nombre}}</option>
                            @else
                                <option value="{{$asesor->id}}">{{$asesor->nombre}}</option>
                            @endif
                            
                        @endforeach
                    @else
                        <option value="">No existen Asesores Registrados</option>
                    @endif
                </select>    
            @endif
        </div>

        <!-- Tramite Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('tramite', 'Tramite (nombre o tipo):') !!}
            {!! Form::text('tramite', null, ['class' => 'form-control text-uppercase', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
        </div>

        <!-- Estatus Afore Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('estatus_afore', 'Estatus Afore:') !!}
            {!! Form::text('estatus_afore', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
        </div>

        <!-- Fecha Solicitud Recurso Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_fecha_solicitud_recurso', 'Fecha Solicitud Recurso:') !!}
            @if (isset($tramite->t_fecha_solicitud_recurso))
                {!! Form::date('t_fecha_solicitud_recurso', $tramite->t_fecha_solicitud_recurso, ['class' => 'form-control','id'=>'fecha_solicitud_recurso']) !!}    
            @else
                {!! Form::date('t_fecha_solicitud_recurso', null, ['class' => 'form-control','id'=>'fecha_solicitud_recurso']) !!}
            @endif
            
        </div>

        <!-- Fecha Pago Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_fecha_pago', 'Fecha Pago:') !!}
            @if (isset($tramite->t_fecha_pago))
                {!! Form::date('t_fecha_pago', $tramite->t_fecha_pago, ['class' => 'form-control','id'=>'fecha_pago']) !!}
            @else
                {!! Form::date('t_fecha_pago', null, ['class' => 'form-control','id'=>'fecha_pago']) !!}
            @endif
            
        </div>

        <!-- Porcentaje Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_porcentaje', 'Porcentaje para el asesor:') !!}
            {!! Form::number('t_porcentaje', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Monto Asesor Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_monto_para_asesor', 'Monto Asesor ($):') !!}
            {!! Form::number('t_monto_para_asesor', null, ['class' => 'form-control']) !!}
        </div>

        {{-- <!-- Email Verified At Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('email_verified_at', 'Email Verified At:') !!}
            {!! Form::date('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
        </div> --}}

    </div>
    
</div>
    