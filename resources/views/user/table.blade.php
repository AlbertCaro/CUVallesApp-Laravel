<table class="table align-items-center table-flush">
    <thead class="thead-light">
    <tr>
        <th scope="col">Nombre completo</th>
        <th scope="col">Correo</th>
        <th scope="col">Fecha de creación</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @forelse($users as $user)
        <tr>
            <th scope="row">
                <div class="media align-items-center">
                    <a href="#" class="avatar rounded-circle mr-3">
                        <img alt="Image placeholder" src="">
                    </a>
                    <div class="media-body">
                        <span class="mb-0 text-sm">{{ $user->fullname }}</span>
                    </div>
                </div>
            </th>
            <td>
                {{ $user->email }}
            </td>
            <td>
                {{ $user->created_at }}
            </td>
            <td class="text-right">
                <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <a class="dropdown-item" href="#">Editar</a>
                        <a class="dropdown-item" href="#">Eliminar</a>
                    </div>
                </div>
            </td>
        </tr>
    @empty
    @endforelse

    </tbody>
</table>
