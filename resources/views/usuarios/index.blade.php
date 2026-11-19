<x-layouts.main>
    <x-slot:title>Admin Usuarios</x-slot:title>

            <section class="entradas-admin py-5">
                <div class="container">


                    <h1 class="entradas-admin-titulo mb-4">Administración de Usuarios</h1>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">

                         <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Rol</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                        </thead>

                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->rol->nombre }}</td>
                                        <td>
                                            <a href="{{ route('admin.usuarios.show', ['usuario' => $usuario->id]) }}" class="btn btn-sm btn-primary">
                                                Ver detalle
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </section>

</x-layouts.main>