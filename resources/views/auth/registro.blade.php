<x-layouts.main>
    <x-slot:title>Crear cuenta</x-slot:title>

    <section class="login py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-5">
                    <div class="login-caja p-4 p-md-5 mb-4 rounded-4">
                        <h1 class="login-titulo mb-4">Crear cuenta</h1>

                        <form class="login-form" method="POST" action="{{ route('auth.register.process') }}" novalidate>
                            @csrf

                            <div class="campo mb-3">

                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" id="name" name="name"
                                    @class([
                                        'form-control',
                                        'is-invalid' => $errors->has('name'),
                                    ])

                                    @error('name')
                                    aria-invalid=true
                                    aria-errormessage="error-name"
                                    @enderror
                                    value="{{ old('name') }}"
                                >

                                @error('name')
                                    <div class="text-danger" id="error-name">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

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

                            <button type="submit" class="boton-login btn btn-primary w-100">Registrarme</button>
                        </form>

                    </div> 
                </div>
            </div>
        </div>


    </section>
</x-layouts.main>