<x-layouts.main>
    <x-slot:title>Contacto</x-slot:title>

    <section class="contacto py-5">
        <div class="container">
            <h1 class="text-center mb-2">¡Contactanos!</h1>
            <p class="contacto-subtitulo text-center mx-auto mb-5">
                Hacemos tortas personalizadas y servicio de eventos. Contanos qué necesitás y te respondemos a la brevedad.
            </p>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-4">
                    <div class="contacto-datos p-4 p-md-5 rounded-4 h-100">
                        <h2 class="fs-4 mb-4">Datos de contacto</h2>
                        <ul class="contacto-lista list-unstyled mb-0">
                            <li class="mb-3"><strong>Email:</strong> canela@mail.com</li>
                            <li class="mb-3"><strong>WhatsApp:</strong> +54 9 3447 1234-5678</li>
                            <li class="mb-3"><strong>Horarios:</strong> Lunes a sábados, de 9 a 18 hs</li>
                            <li><strong>Dirección:</strong> Avenida Siempre Viva 123</li>
                        </ul>
                    </div>
                </div>

{{-- --> MEJORAR LA VISTA DE LAS 2 COLUMNAS  --}}   

                <div class="col-lg-8">
                    <div class="contacto-caja p-4 p-md-5 rounded-4">
                        <h2 class="fs-4 mb-4">Envianos tu consulta</h2>

                        @if(session()->has('feedback.message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('feedback.message') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                Oops! Hay datos que faltan. Revisalos y volvé a intentarlo...
                            </div>
                        @endif

                        <form class="contacto-form" method="POST" action="{{ route('contacto.store') }}" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label for="nombre_completo" class="form-label">Nombre completo</label>
                                <input type="text" id="nombre_completo" name="nombre_completo"

                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('nombre_completo'),
                                    ])

                                    @error('nombre_completo')
                                    aria-invalid="true"
                                    aria-errormessage="error-nombre_completo"
                                    @enderror
                                    value="{{ old('nombre_completo') }}"
                                    placeholder="Tu nombre y apellido"
                                >

                                @error('nombre_completo')
                                    <div class="text-danger" id="error-nombre_completo">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email (opcional)</label>
                                <input type="email" id="email" name="email"

                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('email'),
                                    ])

                                    @error('email')
                                    aria-invalid="true"
                                    aria-errormessage="error-email"
                                    @enderror
                                    value="{{ old('email') }}"
                                    placeholder="tu@email.com"
                                >

                                @error('email')
                                    <div class="text-danger" id="error-email">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" id="telefono" name="telefono"

                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('telefono'),
                                    ])

                                    @error('telefono')
                                    aria-invalid="true"
                                    aria-errormessage="error-telefono"
                                    @enderror
                                    value="{{ old('telefono') }}"
                                    placeholder="+54 9 11 1234-5678"
                                >

                                @error('telefono')
                                    <div class="text-danger" id="error-telefono">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tipo_torta" class="form-label">Tipo de torta</label>
                                <input type="text" id="tipo_torta" name="tipo_torta"

                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('tipo_torta'),
                                    ])

                                    @error('tipo_torta')
                                    aria-invalid="true"
                                    aria-errormessage="error-tipo_torta"
                                    @enderror
                                    value="{{ old('tipo_torta') }}"
                                    placeholder="Ej: torta de cumpleaños"
                                >

                                @error('tipo_torta')
                                    <div class="text-danger" id="error-tipo_torta">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cantidad_personas" class="form-label">Cantidad de personas</label>
                                <input type="number" id="cantidad_personas" name="cantidad_personas"

                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('cantidad_personas'),
                                    ])

                                    @error('cantidad_personas')
                                    aria-invalid="true"
                                    aria-errormessage="error-cantidad_personas"
                                    @enderror
                                    value="{{ old('cantidad_personas') }}"
                                >

                                @error('cantidad_personas')
                                    <div class="text-danger" id="error-cantidad_personas">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="fecha_evento" class="form-label">Fecha del evento</label>
                                <input type="date" id="fecha_evento" name="fecha_evento"

                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('fecha_evento'),
                                    ])

                                    @error('fecha_evento')
                                    aria-invalid="true"
                                    aria-errormessage="error-fecha_evento"
                                    @enderror
                                    value="{{ old('fecha_evento') }}"
                                >

                                @error('fecha_evento')
                                    <div class="text-danger" id="error-fecha_evento">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descripcion_tematica" class="form-label">Temática o descripción</label>
                                <textarea id="descripcion_tematica" name="descripcion_tematica" rows="4"

                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('descripcion_tematica'),
                                    ])

                                    @error('descripcion_tematica')
                                    aria-invalid="true"
                                    aria-errormessage="error-descripcion_tematica"
                                    @enderror
                                    placeholder="Contanos qué torta o evento tenés en mente"
                                >{{ old('descripcion_tematica') }}</textarea>

                                @error('descripcion_tematica')
                                    <div class="text-danger" id="error-descripcion_tematica">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="boton-canela btn btn-primary w-100">Consultar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>

      
