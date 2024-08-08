<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="asesors-table">
            <thead>
            <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Correo</th>
                <th class="text-center">Celular</th>
                <th class="text-center">Imagen</th>
                {{-- <th>Email Verified At</th>
                <th>Password</th> --}}
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($asesors as $asesor)
                <tr>
                    <td>{{ $asesor->nombre }}</td>
                    <td>{{ $asesor->correo }}</td>
                    <td>{{ $asesor->celular }}</td>
                    <td>{{ $asesor->image }}</td>
                    {{-- <td>{{ $asesor->email_verified_at }}</td>
                    <td>{{ $asesor->password }}</td> --}}
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['asesors.destroy', $asesor->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('asesors.show', [$asesor->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('asesors.edit', [$asesor->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $asesors])
        </div>
    </div>
</div>
