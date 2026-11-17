<x-layouts.main>
     <x-slot:title>Eliminar entrada</x-slot:title>

        <div class="bg-danger border rounded"> 
            <h1 class="py-2 fs-2 text-white text-center">¿Deseas eliminar esta entrada?</h1> 
        </div>

     <section class="blog py-5"> 
     <div class="container"> 
               <article class="blog-entrada p-4 p-md-5 mb-4 rounded-4">
                    <header class="blog-entrada-header"> 
                       <span class="blog-entrada-categoria badge rounded-pill d-inline-block mb-3">{{ $entrada->categoria->nombre }}</span>
                       <h2>{{ $entrada->titulo }}</h2>

                         <time class="blog-entrada-fecha d-block" datetime="{{ $entrada->created_at->format('Y-m-d') }}">
                                {{ $entrada->created_at->format('d/m/Y') }}
                        </time>

                       <p class="blog-entrada-extracto fst-italic"> {{ $entrada->extracto }} </p>
                    </header> 

                   @if ($entrada->imagen !== null && \Storage::exists($entrada->imagen))
                     <img src="<?= \Storage::url($entrada->imagen); ?>" alt="{{ $entrada->titulo }}" class="blog-entrada-imagen rounded-2 shadow-sm">
                  @endif

                    <div class="blog-entrada-contenido"> 
                       {{ $entrada->cuerpo }} 
                    </div> 

                    <footer class="blog-entrada-etiquetas d-flex flex-wrap gap-3 mt-4">
                     @forelse ($entrada->etiquetas as $etiqueta)
                        <span class="blog-entrada-etiqueta">{{ $etiqueta->nombre }}</span>
                     @empty
                        <span class="blog-entrada-etiqueta fst-italic">Sin etiquetas</span>
                     @endforelse
                  </footer>
               </article> 

            <form action="{{ url('/admin/entradas/' . $entrada->id . '/eliminar') }}" method="POST" class="mt-2">
                   @csrf
                <button type="submit" class="btn btn-danger w-50 d-block mx-auto">Eliminar entrada</button>
            </form>   
       
     </div> 
</section>
</x-layouts.main>
