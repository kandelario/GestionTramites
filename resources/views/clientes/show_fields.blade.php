<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $cliente->nombre }}</p>
</div>

<!-- N Celular Field -->
<div class="col-sm-12">
    {!! Form::label('n_celular', 'N Celular:') !!}
    <p>{{ $cliente->n_celular }}</p>
</div>

<!-- N Casa Field -->
<div class="col-sm-12">
    {!! Form::label('n_casa', 'N Casa:') !!}
    <p>{{ $cliente->n_casa }}</p>
</div>

<!-- Domicilio Field -->
<div class="col-sm-12">
    {!! Form::label('domicilio', 'Domicilio:') !!}
    <p>{{ $cliente->domicilio }}</p>
</div>

<!-- Nss Field -->
<div class="col-sm-12">
    {!! Form::label('nss', 'Nss:') !!}
    <p>{{ $cliente->nss }}</p>
</div>

<!-- Fecha Baja Field -->
<div class="col-sm-12">
    {!! Form::label('fecha_baja', 'Fecha Baja:') !!}
    <p>{{ $cliente->fecha_baja }}</p>
</div>

<!-- Monto Asesor Field -->
<div class="col-sm-12">
    {!! Form::label('monto_asesor', 'Monto Asesor:') !!}
    <p>{{ $cliente->monto_asesor }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $cliente->email_verified_at }}</p>
</div>

