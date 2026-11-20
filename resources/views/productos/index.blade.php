<x-layouts.main>
    <x-slot:title>Productos</x-slot:title>

    <section class="productos py-5">
        <div class="container">
            
            <h1 class="text-center mb-2">Nuestros productos</h1>

            <p class="productos-subtitulo text-center mx-auto mb-5">
                Tortas artesanales hechas por encargo. Elegí tu favorita y pedila.
            </p>

            <div class="row g-4">
                @foreach($productos as $producto)
                    <div class="col-md-6 col-lg-4">
                        <article class="producto-card p-3 rounded-4 h-100 d-flex flex-column">

                            <img src="{{ asset('img/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="producto-imagen rounded-3 mb-3">

                            <h2 class="producto-nombre fs-4 mb-3 mt-2 text-center">{{ $producto->nombre }}</h2>

                            <p class="producto-descripcion">{{ $producto->descripcion }}</p>
                            <p class="producto-precio text-center mt-auto">${{ number_format($producto->precio, 0, ',', '.') }}</p>


                            <a href="{{ route('contacto') }}" class="boton-canela btn btn-primary">Encargar</a>
                        </article>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</x-layouts.main>

 