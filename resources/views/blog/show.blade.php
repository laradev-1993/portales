 <x-layouts.main>
     <x-slot:title> {{ $entrada->titulo }}</x-slot:title>

     <section class="blog py-5"> 
     <div class="container"> 
               <article class="blog-entrada p-4 p-md-5 mb-4 rounded-4">
                    <header class="blog-entrada-header"> 
                     <span class="blog-entrada-categoria badge rounded-pill mb-3">{{ $entrada->categoria->nombre }}</span>
                        <h1 class="mb-3">{{ $entrada->titulo }}</h1>

                         <time class="blog-entrada-fecha d-block" datetime="{{ $entrada->created_at->format('Y-m-d') }}">
                                {{ $entrada->created_at->format('d/m/Y') }}
                        </time>

                       <p class="blog-entrada-extracto fst-italic"> {{ $entrada->extracto }} </p>
                    </header> 

                  
                @if ($entrada->imagen !== null && \Storage::disk('public')->exists($entrada->imagen))
                   <img src="<?= \Storage::disk('public')->url($entrada->imagen); ?>" alt="{{ $entrada->titulo }}" class="blog-entrada-imagen rounded-2 shadow-sm">
                @endif


                    <div class="blog-entrada-contenido"> 
                       {{ $entrada->cuerpo }} 
                    </div> 
            
                  <hr></hr>

                  <footer class="blog-entrada-etiquetas d-flex flex-wrap gap-3 mt-4">
                     @forelse ($entrada->etiquetas as $etiqueta)
                        <span class="blog-entrada-etiqueta">{{ $etiqueta->nombre }}</span>
                     @empty
                        <span class="blog-entrada-etiqueta fst-italic">Sin etiquetas</span>
                     @endforelse
                  </footer>
               </article> 
       
     </div> 
</section>
</x-layouts.main>
