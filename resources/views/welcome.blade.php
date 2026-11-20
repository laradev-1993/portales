<x-layouts.main>
    <x-slot:title>Home</x-slot:title>
  
    {{-- banner --}}
      <section class="home-banner py-5">
          <div class="container">
              <div class="row align-items-center">
                  <div class="col-md-6 mb-4 mb-md-0">
                      <h1 class="home-banner-titulo mb-3 ms-3">¡Bienvenidos a Canela!</h1>
                      <p class="home-banner-texto fs-5 mb-4 ms-3">
                          Pastelería artesanal hecha con ingredientes simples y mucho cariño, para que cada momento tenga su sabor.
                      </p>
                      <a href="{{ route('productos') }}" class="boton-canela btn btn-primary ms-3">Conocé nuestras tortas</a>
                  </div>
                  <div class="col-md-6">
                      <img src="{{ asset('img/torta-banner.png') }}" alt="Torta artesanal de Canela" class="home-banner-imagen img-fluid">
                  </div>
              </div>
          </div>
      </section>

    {{-- SOBRE NOS --}}
    <section class="py-5">
        <div class="container text-center">
            <h2 class="mb-3">Sobre nosotros</h2>
            <p class="home-texto-centrado mx-auto">
                <strong>En CANELA hacemos pastelería artesanal</strong>: tortas, masas dulces y mesa dulce para eventos.
                Transformamos ingredientes simples en momentos inolvidables. Nuestra esencia radica en el respeto por lo auténtico, alejándonos de la producción en masa para devolverle al dulce su verdadero valor.
            </p>
        </div>
    </section>

    {{-- Productos destacados (hardcodeados) --}}
    <section class="home-productos py-5">
        <div class="container">
            <h2 class="text-center mb-4">Nuestros productos</h2>

            <div class="row justify-content-center g-4">
                <div class="col-md-5 col-lg-4">
                    <div class="home-card p-3 rounded-4 text-center h-100">
                        <img src="{{ asset('img/torta-1.jpg') }}" alt="Torta de chocolate" class="home-card-imagen img-fluid rounded-3 mb-3">
                        <h3 class="fs-5 mb-3">Torta de chocolate</h3>
                        <a href="{{ route('productos') }}" class="boton-canela btn btn-primary">Ver detalles</a>
                    </div>
                </div>

                <div class="col-md-5 col-lg-4">
                    <div class="home-card p-3 rounded-4 text-center h-100">
                        <img src="{{ asset('img/torta-2.jpg') }}" alt="Torta de frutilla" class="home-card-imagen img-fluid rounded-3 mb-3">
                        <h3 class="fs-5 mb-3">Tiramisú Italiano</h3>
                        <a href="{{ route('productos') }}" class="boton-canela btn btn-primary">Ver detalles</a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('productos') }}" class="boton-canela-contorno btn btn-secondary">Ver más productos</a>
            </div>
        </div>
    </section>

    {{-- BLOG --}}
    <section class="home-blog py-5 mb-2">
        <div class="container text-center">
            <h2 class="home-blog-titulo mb-3">Nuestro Blog</h2>
            <p class="home-blog-texto fs-5 mb-4">
                Recetas, novedades y secretos de la pastelería: pasá a leernos.
            </p>
            <a href="{{ route('blog') }}" class="boton-canela btn btn-primary">Ir al blog</a>
        </div>
    </section>

    {{-- Contactanos --}}
    <section class="py-5 mt-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('img/torta-contacto.jpg') }}" alt="Torta personalizada" class="home-contacto-imagen img-fluid rounded-4 shadow-sm">
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3">Contactáte con nosotros</h2>
                    <p class="fs-5 mb-4">
                        Hacemos tortas personalizadas y servicio de eventos.
                    </p>
                    <a href="{{ route('contacto') }}" class="boton-canela btn btn-primary">Ir a contacto</a>
                </div>
            </div>
        </div>
    </section>

</x-layouts.main>

        
  