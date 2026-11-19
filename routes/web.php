<?php

use Illuminate\Support\Facades\Route;

// -- ACÁ SE DEFINEN LAS RUTAS 
// --- Array con FQN: \App\Http\Controllers\InicioController y el nombre del Método, (ej. index)

Route::get('/', [\App\Http\Controllers\InicioController::class, 'index'])
 ->name('home');

Route::get('/productos', [\App\Http\Controllers\ProductoController::class, 'index'])
->name('productos');

//Autenticación usuario
Route::get('/ingresar', [\App\Http\Controllers\AuthController::class, 'loginForm'])
->name('auth.login.form');

Route::post('/ingresar', [\App\Http\Controllers\AuthController::class, 'loginProcess'])
->name('auth.login.process');

Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
->name('auth.logout');

//Registrarse
Route::get('/registro', [\App\Http\Controllers\AuthController::class, 'registerForm'])
->name('auth.register.form');

Route::post('/registro', [\App\Http\Controllers\AuthController::class, 'registerProcess'])
->name('auth.register.process');

//blog
Route::get('/blog', [\App\Http\Controllers\BlogController::class, 'index'])
->name('blog');


Route::get('/admin/entradas', [\App\Http\Controllers\EntradaController::class, 'index'])
->name('entradas.index')
   ->middleware('auth')
    ->middleware(\App\Http\Middleware\RequerirAdministrador::class);


Route::get('/contacto', [\App\Http\Controllers\ContactoController::class, 'index'])
->name('contacto');

Route::post('/contacto', [\App\Http\Controllers\ContactoController::class, 'store'])
->name('contacto.store');


Route::get('/blog/{id}', [\App\Http\Controllers\BlogController::class, 'show'])
-> whereNumber('id')
->name('blog.show');

//Crear una entrada
Route::get('/admin/entradas/crear', [\App\Http\Controllers\EntradaController::class, 'create'])
    ->name('admin.entradas.create')
     ->middleware('auth')
    ->middleware(\App\Http\Middleware\RequerirAdministrador::class);
Route::post('/admin/entradas/crear', [\App\Http\Controllers\EntradaController::class, 'store'])
    ->name('admin.entradas.store')
     ->middleware('auth')
    ->middleware(\App\Http\Middleware\RequerirAdministrador::class);

//Editar
Route::get('/admin/entradas/{id}/editar', [\App\Http\Controllers\EntradaController::class, 'edit'])
    ->whereNumber('id')
    ->name('admin.entradas.editar')
     ->middleware('auth')
    ->middleware(\App\Http\Middleware\RequerirAdministrador::class);

Route::post('/admin/entradas/{id}/editar', [\App\Http\Controllers\EntradaController::class, 'update'])
    ->whereNumber('id')
    ->name('admin.entradas.modificar')
     ->middleware('auth')
    ->middleware(\App\Http\Middleware\RequerirAdministrador::class);

//eliminar
Route::get('/admin/entradas/{id}/eliminar', [\App\Http\Controllers\EntradaController::class, 'delete'])
    ->whereNumber('id')
    ->name('admin.entradas.delete')
    ->middleware('auth')
    ->middleware(\App\Http\Middleware\RequerirAdministrador::class);

Route::post('/admin/entradas/{id}/eliminar', [\App\Http\Controllers\EntradaController::class, 'destroy'])
    ->whereNumber('id')
    ->name('admin.entradas.destroy')
    ->middleware('auth')
    ->middleware(\App\Http\Middleware\RequerirAdministrador::class);

//administración de usuarios
Route::get('/admin/usuarios', [\App\Http\Controllers\UsuarioController::class, 'index'])
    ->name('admin.usuarios.index')
    ->middleware('auth')
    ->middleware(\App\Http\Middleware\RequerirAdministrador::class);    

Route::get('/admin/usuarios/{usuario}', [\App\Http\Controllers\UsuarioController::class, 'show'])
    ->whereNumber('usuario')
    ->name('admin.usuarios.show')
    ->middleware('auth')
    ->middleware(\App\Http\Middleware\RequerirAdministrador::class);    

// Route::post('/productos/{id}/encargar', [\App\Http\Controllers\ProductoEncargarController::class, 'register'])
//     ->name('producto.encargar.register');
