<!-- Asesor Id Field -->
<div class="form-group col-sm-4">
    @if (isset($asesores->id))
        {!! Form::label('asesor_id', 'Asesor:') !!}    
        {{$asesores->nombre}}
        {!! Form::hidden('asesor_id', $asesores->id, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
    @else
        {!! Form::label('asesor_id', 'Asesor:') !!}
        <select name="asesor_id" id="asesor_id" class="form-control disabled">
            @if (isset($asesores))
                @foreach ($asesores as $asesor)
                    <option value="{{$asesor->id}}">{{$asesor->nombre}}</option>
                @endforeach
            @else
                <option value="">No existen Asesores Registrados</option>
            @endif
        </select>    
    @endif
</div>

<!-- Cliente Id Field -->
<div class="form-group col-sm-4">
    @if (isset($clientes->id))
        {!! Form::label('cliente_id', 'Cliente:') !!}    
        {{$clientes->nombre}}
        {!! Form::hidden('asesor_id', $clientes->id, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
    @else
        {!! Form::label('cliente_id', 'Cliente:') !!}
        <select name="cliente_id" id="cliente_id" class="form-control disabled">
            @if (isset($clientes) && count($clientes) > 0)
                @foreach ($clientes as $cliente)
                    <option value="{{$cliente['id']}}">{{$cliente['nombre']}}</option>
                @endforeach
            @else
                <option value="">No existen Clientes Registrados</option>
            @endif
        </select>    
    @endif
    
</div>

<!-- Tramite Field -->
<div class="form-group col-sm-4">
    {!! Form::label('tramite', 'Tramite (nombre o tipo):') !!}
    {!! Form::text('tramite', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Estatus Afore Field -->
<div class="form-group col-sm-4">
    {!! Form::label('estatus_afore', 'Estatus Afore:') !!}
    {!! Form::text('estatus_afore', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Fecha Baja Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fecha_baja', 'Fecha Baja:') !!}
    {!! Form::date('fecha_baja', null, ['class' => 'form-control','id'=>'fecha_baja']) !!}
</div>

<!-- Fecha Solicitud Recurso Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fecha_solicitud_recurso', 'Fecha Solicitud Recurso:') !!}
    {!! Form::date('fecha_solicitud_recurso', null, ['class' => 'form-control','id'=>'fecha_solicitud_recurso']) !!}
</div>

<!-- Fecha Pago Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fecha_pago', 'Fecha Pago:') !!}
    {!! Form::date('fecha_pago', null, ['class' => 'form-control','id'=>'fecha_pago']) !!}
</div>

<!-- Porcentaje Field -->
<div class="form-group col-sm-4">
    {!! Form::label('porcentaje', 'Porcentaje para el asesor:') !!}
    {!! Form::number('porcentaje', null, ['class' => 'form-control']) !!}
</div>

<!-- Monto Asesor Field -->
<div class="form-group col-sm-4">
    {!! Form::label('monto_asesor', 'Monto Asesor ($):') !!}
    {!! Form::number('monto_asesor', null, ['class' => 'form-control']) !!}
</div>

{{-- <!-- Email Verified At Field -->
<div class="form-group col-sm-4">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::date('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div> --}}