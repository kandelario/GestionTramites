<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div>

<!-- Image Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control', 'required', 'maxlength' => 255, 'maxlength' => 255]) !!}
</div> --}}

<div class="form-group col-sm-6">
    {!! Form::label('roles', 'Rol de usuario:') !!}
    <select class="form-control" name="roles" id="roles">
        @if (isset($roles))
            <option value="">SELECCIONE UN ROL PARA EL USUARIO</option>
            
            @foreach ($roles as $role)
                @if (isset($user) && $role->name == $user->roles()->first()->name)
                    <option value="{{ $role->name }}" selected>{{ $role->name }}</option>
                @else
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                @endif
                    
            @endforeach
        @else
            <option value="">NO EXISTEN ROLES DISPONIBLES</option>
        @endif
    </select>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('plazas', 'Plazas:') !!}
    <select class="form-control" name="plazas" id="plazas">
        @if (isset($plazas))
            <option value="">SELECCIONE UNA PLAZA</option>
            
            @foreach ($plazas as $plaza)
                @if (isset($user) && $plaza->id == $user->plaza_id_asignado)
                    <option value="{{ $plaza->id }}" selected>{{ $plaza->nombre }}</option>
                @else
                    <option value="{{ $plaza->id }}">{{ $plaza->nombre }}</option>
                @endif
                    
            @endforeach
        @else
            <option value="">NO EXISTEN PLAZAS DISPONIBLES</option>
        @endif
    </select>
</div>