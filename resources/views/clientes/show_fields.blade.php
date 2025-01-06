<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $cliente->nombre }}</p>
</div>

<!-- N Contacto Field -->
<div class="col-sm-12">
    {!! Form::label('n_contacto', 'N Contacto:') !!}
    <p>{{ $cliente->n_contacto }}</p>
</div>

<!-- Nss Field -->
<div class="col-sm-12">
    {!! Form::label('nss', 'Nss:') !!}
    <p>{{ $cliente->nss }}</p>
</div>

<!-- Curp Field -->
<div class="col-sm-12">
    {!! Form::label('curp', 'Curp:') !!}
    <p>{{ $cliente->curp }}</p>
</div>

<!-- Fecha Baja Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_baja', 'Fecha Baja:') !!}
    <p>{{ $cliente->fecha_baja }}</p>
</div>

<!-- Fecha Solicitud Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_solicitud', 'Fecha Solicitud:') !!}
    <p>{{ $cliente->fecha_solicitud }}</p>
</div>

<!-- Fecha Cobro Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_cobro', 'Fecha Cobro:') !!}
    <p>{{ $cliente->fecha_cobro }}</p>
</div>

<!-- Afore Field -->
<div class="col-sm-12">
    {!! Form::label('afore', 'Afore:') !!}
    <p>{{ $cliente->afore }}</p>
</div>

<!-- Monto Field -->
<div class="col-sm-12">
    {!! Form::label('monto', 'Monto:') !!}
    <p>{{ $cliente->monto }}</p>
</div>

<!-- Estatus Field -->
<div class="col-sm-12">
    {!! Form::label('estatus', 'Estatus:') !!}
    <p>{{ $cliente->estatus }}</p>
</div>

