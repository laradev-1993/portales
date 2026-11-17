<x-layouts.main>
    <x-slot:title>Ingresa a tu cuenta</x-slot:title>

    <section class="login py-5">
        <div class="container">
           <div class="row justify-content-center">
              <div class="col-md-8 col-lg-5">
                <div class="login-caja p-4 p-md-5 mb-4 rounded-4">
                <h1 class="login-titulo mb-4">Iniciar Sesión</h1>

                <form class="login-form" method="POST" action="{{ route('auth.login.process') }}">
                     @csrf

                    <div class="campo mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email"

                            @class([
                                'form-control',
                                'is-invalid' => $errors->has('email'),
                            ])

                            @error('email')
                            aria-invalid=true
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

                    <div class="campo mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" id="password" name="password"

                            @class([
                                'form-control',
                                'is-invalid' => $errors->has('password'),
                            ])

                            @error('password')
                            aria-invalid=true
                            aria-errormessage="error-password"
                            @enderror
                            >

                            @error('password')
                                <div class="text-danger" id="error-password">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>

                    <button type="submit" class="boton-login btn btn-primary w-100">Ingresar</button>
                </form>
            </div>
            </div>
         </div>
        </div>
    </section>
</x-layouts.main>