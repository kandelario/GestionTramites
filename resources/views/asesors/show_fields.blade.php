<!-- Nombre Field -->
<div class="col-sm-12">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{{ $asesor->nombre }}</p>
</div>

<!-- Activo Field -->
<div class="col-sm-12">
    {!! Form::label('activo', 'Activo:') !!}
    <p>{{ $asesor->activo }}</p>
</div>

<!-- Image Field -->
<div class="col-sm-12">
    {!! Form::label('image', 'Image:') !!}
    <p>{{ $asesor->image }}</p>
</div>

<!-- Email Verified At Field -->
<div class="col-sm-12">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    <p>{{ $asesor->email_verified_at }}</p>
</div>

<!-- Plaza Id Field -->
<div class="col-sm-12">
    {!! Form::label('plaza_id', 'Plaza Id:') !!}
    <p>{{ $asesor->plaza_id }}</p>
</div>

