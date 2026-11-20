
<?php
$etiquetaIds = $entrada->etiquetas->pluck('etiqueta_id')->all();
?>

<x-layouts.main>
    <x-slot:title>Editar {{ $entrada->titulo }}</x-slot:title>

    <section class="entrada-formulario py-5">
        <div class="container">

          <div class="row justify-content-center">
            <div class="col-lg-8">
                <h1 class="mb-4">Editar esta entrada del blog</h1>

                @if ($errors->any())
                    <div class="alert alert-danger">Oops! Hay datos que faltan. Revisalos y volvé a intentarlo...</div>
                @endif

                <form action="{{ route('admin.entradas.modificar', ['id' => $entrada->id]) }}" method="POST" enctype="multipart/form-data">

                    @csrf

                
                    <div class="mb-3">
                        <label for="titulo" class="form-label"> Título </label>

                        <input type="text" id="titulo" name="titulo"

                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('titulo'),
                        ])

                        @error('titulo')
                        aria-invalid=true
                        aria-errormessage="error-titulo" {{-- El id del mensaje --}}
                        @enderror
                            value="{{ old('titulo', $entrada->titulo) }}"
                        >
                        

                        @error('titulo')
                            <div class="text-danger" id="error-titulo">
                                {{ $message }}
                            </div>
                        @enderror
                    
                    </div>

                    
                    <div class="mb-3">
                        <label for="extracto" class="form-label"> Extracto </label>

                        <textarea id="extracto" name="extracto" rows="3" 
                         @class([
                            'form-control',
                            'is-invalid' => $errors->has('extracto'),
                        ])

                        @error('extracto')
                        aria-invalid=true
                        aria-errormessage="error-extracto" {{-- El id del mensaje --}}
                        @enderror
                        >{{ old('extracto', $entrada->extracto) }}</textarea>

                        @error('extracto')
                             <div class="text-danger" id="error-extracto">{{ $message }}</div>
                        @enderror
                    </div>

                
                    <div class="mb-3">
                        <label for="cuerpo" class="form-label">
                            Cuerpo
                        </label>

                        <textarea id="cuerpo" name="cuerpo" rows="8" 
                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('cuerpo'),
                        ])

                        @error('cuerpo')
                        aria-invalid=true
                        aria-errormessage="error-cuerpo" {{-- El id del mensaje --}}
                        @enderror
                        >{{ old('cuerpo', $entrada->cuerpo) }}</textarea>

                        @error('cuerpo')
                             <div class="text-danger" id="error-cuerpo">{{ $message }}</div>
                        @enderror   
                    
                    </div>

                    <div class="mb-3">
                        <label for="categoria_fk" class="form-label">Categoría</label>

                        <select id="categoria_fk" name="categoria_fk"

                        @class([
                            'form-select',
                            'is-invalid' => $errors->has('categoria_fk'),
                        ])

                        @error('categoria_fk')
                        aria-invalid=true
                        aria-errormessage="error-categoria_fk" 
                        @enderror
                        >
                            <option value="">Elegí una categoría</option>

                            @foreach ($categorias as $categoria)
                                <option
                                    value="{{ $categoria->id }}"
                                    @selected($categoria->id == old('categoria_fk', $entrada->categoria_fk))
                                >
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>

                        @error('categoria_fk')
                            <div class="text-danger" id="error-categoria_fk">{{ $message }}</div>
                        @enderror
                    </div>

        {{-- ETIQUETAS --}}
                    <fieldset class="mb-5">
                        <legend class="form-label fs-6">Etiquetas</legend>

                        @foreach ($etiquetas as $etiqueta)
                            <label class="me-3">
                                <input
                                    type="checkbox"
                                    name="etiqueta_id[]"
                                    value="{{ $etiqueta->etiqueta_id }}"
                                    @checked(in_array($etiqueta->etiqueta_id, old('etiqueta_id', $etiquetaIds)))
                                >
                                {{ $etiqueta->nombre }}
                            </label>
                        @endforeach

                        @error('etiqueta_id.*')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                
        {{-- Imagen             --}}
                    <div class="mt-4 mb-5">
                        <p class="form-label">Imagen actual:</p>

                        @if ($entrada->imagen !== null && \Storage::exists($entrada->imagen))
                            <img src="<?= \Storage::url($entrada->imagen); ?>" alt="{{ $entrada->titulo }}" class="entrada-imagen-actual img-fluid rounded-2 shadow-sm mb-3 d-block">
                        @else
                            <p>Sin imagen.</p>
                        @endif

                        <label for="imagen" class="form-label">
                            Cambiar imagen <span class="small">(Opcional)</span>
                        </label>

                        <input type="file" id="imagen" name="imagen"

                        @class([
                            'form-control',
                            'is-invalid' => $errors->has('imagen'),
                        ])

                        @error('imagen')
                        aria-invalid=true
                        aria-errormessage="error-imagen"
                        @enderror
                        aria-describedby="ayuda-imagen"
                        >

                        <div class="text-muted small" id="ayuda-imagen">Elegir una sola imagen si deseas cambiar la actual</div>
                        @error('imagen')
                            <div class="text-danger" id="error-imagen">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- botones -->
                    <div class="d-flex justify-content-center gap-2">

                        <a href="{{ route('entradas.index') }}" class="btn btn-secondary rounded-pill px-4">Cancelar</a>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Modificar</button>
  
                    </div>

                </form>
           </div>
          </div>
        </div>
    </section>
</x-layouts.main>

