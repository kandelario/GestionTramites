<!-- Nombre Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- N Contacto Field -->
<div class="form-group col-sm-3">
    {!! Form::label('n_contacto', 'N° Contacto:') !!}
    {!! Form::text('n_contacto', null, ['class' => 'form-control', 'maxlength' => 0, 'maxlength' => 10]) !!}
</div>

<!-- Nss Field -->
<div class="form-group col-sm-3">
    {!! Form::label('nss', 'NSS:') !!}
    {!! Form::text('nss', null, ['class' => 'form-control', 'minlength' => 0, 'maxlength' => 10]) !!}
</div>

<!-- Curp Field -->
<div class="form-group col-sm-3">
    {!! Form::label('curp', 'CURP:') !!}
    {!! Form::text('curp', null, ['class' => 'form-control text-uppercase', 'maxlength' => 0, 'maxlength' => 18]) !!}
</div>

<!-- Fecha Baja Field -->
<div class="form-group col-sm-4">
    {!! Form::label('fecha_baja', 'Fecha Baja:') !!}
    @if (isset($cliente->fecha_baja))
        {!! Form::date('fecha_baja', substr($cliente->fecha_baja, 0, 10), ['class' => 'form-control','id'=>'fecha_baja']) !!}
    @else
        {!! Form::date('fecha_baja', null, ['class' => 'form-control','id'=>'fecha_baja']) !!}
    @endif
    
</div>

<!-- Fecha Solicitud Field -->
{{-- <div class="form-group col-sm-4">
    {!! Form::label('fecha_solicitud', 'Fecha Solicitud:') !!}
    @if (isset($cliente->fecha_solicitud))
        {!! Form::date('fecha_solicitud', substr($cliente->fecha_solicitud, 0, 10), ['class' => 'form-control','id'=>'fecha_baja']) !!}
    @else
        {!! Form::date('fecha_solicitud', null, ['class' => 'form-control','id'=>'fecha_baja']) !!}
    @endif
</div> --}}

<!-- Fecha Cobro Field -->
{{-- <div class="form-group col-sm-4">
    {!! Form::label('fecha_cobro', 'Fecha Cobro:') !!}
    @if (isset($cliente->fecha_cobro))
        {!! Form::date('fecha_cobro', substr($cliente->fecha_cobro, 0, 10), ['class' => 'form-control','id'=>'fecha_baja']) !!}
    @else
        {!! Form::date('fecha_cobro', null, ['class' => 'form-control','id'=>'fecha_baja']) !!}
    @endif
</div> --}}

<!-- Afore Field -->
<div class="form-group col-sm-4">
    {!! Form::label('afore', 'Afore:') !!}
    {!! Form::text('afore', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Monto Field -->
<div class="form-group col-sm-4">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::number('monto', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Estatus Field -->
<div class="form-group col-sm-4">
    {!! Form::label('estatus', 'Estatus:') !!}
    <select name="estatus" id="estatus" class="form-control" required>
        <option value="">Seleccione un estatus</option>
    @php
        $_estatus = 'selected';
    @endphp
    @if (isset($cliente))
        @if ($cliente->estatus == 'Pendiente')
            <option class="bg-danger" value="Pendiente" selected>Pendiente</option>
            <option class="bg-warning" value="Completo">Completo</option>
            <option class="bg-success" value="Pagado">Pagado</option>
        @elseif($cliente->estatus == 'Completo')
            <option class="bg-danger" value="Pendiente">Pendiente</option>
            <option class="bg-warning" value="Completo" selected>Completo</option>
            <option class="bg-success" value="Pagado">Pagado</option>
        @elseif($cliente->estatus == 'Pagado')
            <option class="bg-danger" value="Pendiente">Pendiente</option>
            <option class="bg-warning" value="Completo">Completo</option>
            <option class="bg-success" value="Pagado" selected>Pagado</option>
        @endif
    @else
        <option class="bg-danger" value="Pendiente">Pendiente</option>
        <option class="bg-warning" value="Completo">Completo</option>
        <option class="bg-success" value="Pagado">Pagado</option>
    @endif
    
    
        
        
        
    </select>
</div>
