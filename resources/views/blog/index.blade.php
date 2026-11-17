
       
 <x-layouts.main>
     <x-slot:title>Blog</x-slot:title>
    
 <!-- Encabezado -->
     <header class="blog-banner d-flex flex-column justify-content-center align-items-center align-items-md-start text-center text-md-start px-3 px-md-5 py-4 py-md-5 mb-5 rounded-2">
          <h1 class="mb-3 text-white blog-banner-titulo">Blog</h1>
          <p class="blog-banner-subtitulo lead mb-0 text-white">
               Ideas, tendencias y consejos para tus celebraciones.
          </p>
     </header>


<section class="blog py-5"> 
     <div class="container"> 
          @foreach ($entradas as $entrada) 
               <article class="blog-entrada p-4 p-md-5 mb-4 rounded-4">
                    <header class="blog-entrada-header"> 

                    <h2 class="blog-entrada-titulo"> {{ $entrada->titulo }} </h2>
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
               </article> 
          @endforeach 
     </div> 
</section>

 


     
</x-layouts.main>
