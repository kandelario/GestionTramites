<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- N Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('n_celular', 'N° de Celular:') !!}
    {!! Form::text('n_celular', null, ['class' => 'form-control', 'maxlength' => 10, 'maxlength' => 10]) !!}
</div>

<!-- N Casa Field -->
<div class="form-group col-sm-6">
    {!! Form::label('n_casa', 'N° de tel. Casa:') !!}
    {!! Form::text('n_casa', null, ['class' => 'form-control', 'maxlength' => 10, 'maxlength' => 10]) !!}
</div>

<!-- Domicilio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('domicilio', 'Domicilio:') !!}
    {!! Form::text('domicilio', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Nss Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nss', 'NSS:') !!}
    {!! Form::text('nss', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Fecha Baja Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_baja', 'Fecha de Baja:') !!}
    {!! Form::date('fecha_baja', null, ['class' => 'form-control','id'=>'fecha_baja']) !!}
</div>

{{-- @push('page_scripts')
    <script type="text/javascript">
        $('#fecha_baja').datepicker()
    </script>
@endpush --}}

<!-- Monto Asesor Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('monto_asesor', 'Monto Asesor:') !!}
    {!! Form::number('monto_asesor', null, ['class' => 'form-control']) !!}
</div> --}}
