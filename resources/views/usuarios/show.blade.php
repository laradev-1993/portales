<x-layouts.main>
    <x-slot:title>Detalle de {{ $usuario->name }}</x-slot:title>

    <section class="entradas-admin py-5">
        <div class="container">

           <div class="card shadow-sm mx-auto mb-5 usuario-detalle-card">
                <div class="card-body text-center p-4">
                    <h1 class="entradas-admin-titulo mb-4">
                        {{ $usuario->name }}
                    </h1>
                
                   <dl class="d-flex flex-row justify-content-start gap-5 text-start">
                        <div>
                            <dt>Email</dt>
                            <dd>{{ $usuario->email }}</dd>
                        </div>

                        <div>
                            <dt>Rol</dt>
                            <dd>{{ $usuario->rol->nombre }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="card shadow-sm usuario-detalle-encargados">
                <div class="card-body p-4">
                    <h2 class="fs-4 mb-3">Productos encargados</h2>

                     @if ($usuario->productosEncargados->isNotEmpty()) 
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuario->productosEncargados as $producto) {{-- $usuario->productosEncargados es una collection --}}
                                        <tr>
                                            <td>{{ $producto->nombre }}</td>
                                            <td>${{ number_format($producto->precio, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="fst-italic mb-0">
                            Este usuario todavía no encargó productos.
                        </p>
                    @endif

                    <a href="{{ route('admin.usuarios.index') }}"
                    class="boton-canela-contorno btn btn-secondary mt-4">
                        Volver al listado
                    </a>

                    </div>
               </div>
        </div>

    </section>
</x-layouts.main>