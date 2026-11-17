<x-layouts.main>
     <x-slot:title>Admin Blog</x-slot:title>
  


<section class="entradas-admin py-5">
    <div class="container">
        <h1 class="entradas-admin-titulo mb-4">Administración del Blog </h1>
        

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">

                <thead>
                    <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Extracto</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Etiquetas</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($entradas as $entrada)
                        <tr>

                            <td>
                                {{ $entrada->titulo }}
                            </td>

                            <td>
                                {{ $entrada->extracto }}
                            </td>

                            <td>
                                {{ $entrada->categoria->nombre }}
                            </td>
                            <td>
                                 @forelse ($entrada->etiquetas as $etiqueta)
                                    <span class="badge bg-secondary">{{ $etiqueta->nombre }}</span>
                                @empty
                                    <span class="fs-6 text-muted fst-italic">Sin etiquetas</span>
                                @endforelse
                            </td>

                            <td>
                                {{ $entrada->created_at->format('d/m/Y') }}
                            </td>

                            <td>
                                <div class="entradas-admin-acciones d-flex flex-column gap-2">
                                    <a href="{{ url('/admin/entradas/' . $entrada->id . '/editar') }}" class="btn btn-sm btn-warning">
                                        Editar
                                    </a>
                                    <a href="{{ url('/admin/entradas/' . $entrada->id . '/eliminar') }}" class="btn btn-sm btn-danger">
                                        Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <div class="entradas-admin-crear d-flex justify-content-center align-items-center mb-4">
           
            <a href="{{ url('/admin/entradas/crear') }}" class="btn btn-primary my-4 w-100">
                Crear entrada
            </a>
        </div>
    </div>
</section>



</x-layouts.main>


