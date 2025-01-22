
<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table text-center" id="users-table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Plaza Asignada</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                @if (Auth()->user()->id == 1)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if (isset($user->plaza_id_asignado))
                                @foreach ($plazas as $plaza)
                                    @if ($user->plaza_id_asignado == $plaza->id)
                                        <span class="bg-info p-1 rounded">{{ $plaza->nombre }}</span>
                                    @endif
                                @endforeach
                            @else
                                <span class="bg-danger p-1 rounded">{{ 'Sin Plaza asignada' }}</span>
                            @endif
                        </td>
                        <td>
                            @if (isset($user->roles[0]->name))
                                <span class="bg-info p-1 rounded">{{ $user->roles[0]->name }}</span>
                            @else
                                <span class="bg-danger p-1 rounded">{{ 'Sin Rol asignado' }}</span>
                            @endif
                        </td>
                        
                        {{-- <td>{{ $user->image }}</td> --}}
                        <td  style="width: 120px">
                            {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                {{-- <a href="{{ route('users.show', [$user->id]) }}"
                                class='btn btn-default btn-xs'>
                                    <i class="far fa-eye"></i>
                                </a> --}}
                                <a href="{{ route('users.edit', [$user->id]) }}"
                                class='btn btn-default btn-xs'>
                                    <i class="far fa-edit"></i>
                                </a>
                                {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @else
                    @if ($user->id > 1)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->image }}</td>
                            <td  style="width: 120px">
                                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{{ route('users.show', [$user->id]) }}"
                                    class='btn btn-default btn-xs'>
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', [$user->id]) }}"
                                    class='btn btn-default btn-xs'>
                                        <i class="far fa-edit"></i>
                                    </a>
                                    {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endif
                @endif
                    
                
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $users])
        </div>
    </div>
</div>
