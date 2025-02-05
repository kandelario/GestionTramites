<div class="card col-sm-12">
    <div class="card-header bg-gradient-gray" id="headingOne">
        <h5 class="mb-0">
            <div class="text-warning">Datos del Cliente</div>
        </h5>
    </div>
    <div class="card-body row">

        <!-- Nombre Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('c_nombre', 'Nombre:') !!}
            {!! Form::text('c_nombre', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
            @error('c_nombre')
                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                <span class="text-danger"><em>El nombre del cliente es necesario.</em></span>
            @enderror
        </div>

        <!-- N Contacto Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('c_contacto', 'N° Contacto:') !!}
            {!! Form::text('c_contacto', null, ['class' => 'form-control', 'maxlength' => 0, 'maxlength' => 10]) !!}
        </div>

        <!-- Nss Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('c_nss', 'NSS:') !!}
            {!! Form::text('c_nss', null, ['class' => 'form-control', 'minlength' => 0, 'maxlength' => 11]) !!}
            @error('c_nss')
                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                <span class="text-danger"><em>El número de seguro social del cliente es necesario.</em></span>
            @enderror
        </div>

        <!-- Curp Field -->
        <div class="form-group col-sm-3">
            {!! Form::label('c_curp', 'CURP:') !!}
            {!! Form::text('c_curp', null, ['class' => 'form-control text-uppercase', 'maxlength' => 0, 'maxlength' => 18]) !!}
            @error('c_curp')
                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                <span class="text-danger"><em>La curp del cliente es necesaria.</em></span>
            @enderror
        </div>

        <!-- Fecha Baja Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('c_afore_fecha_baja', 'Fecha Baja:') !!}
            @if (isset($tramite->c_afore_fecha_baja))
                {!! Form::date('c_afore_fecha_baja', substr($tramite->c_afore_fecha_baja, 0, 10), ['class' => 'form-control','id'=>'fecha_baja']) !!}
            @else
                {!! Form::date('c_afore_fecha_baja', null, ['class' => 'form-control','id'=>'fecha_baja']) !!}
            @endif
            
        </div>

        <!-- Afore Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('c_afore', 'Afore:') !!}
            {!! Form::text('c_afore', null, ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
        </div>

        <!-- Monto Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('c_monto', 'Monto:') !!}
            {!! Form::number('c_monto', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Estatus Field -->
        <div class="form-group col-sm-4">
            {!! Form::label('t_estatus', 'Estatus:') !!}
            <select name="t_estatus" id="t_estatus" class="form-control">
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
    </div>
</div>