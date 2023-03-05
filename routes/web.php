<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PedidoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Rutas para la web sin iniciar sesion
 */

// Pagina principal
Route::get('/', [PlatoController::class, 'platosMasPedidos'])->name('home');

// Ruta para mostrar todos los restaurantes
Route::get('/restaurantes', [RestauranteController::class, 'index']);

// Buscador restaurantes por nombre
Route::post('/restaurantes/buscarNombre', [RestauranteController::class, 'showRestauranteNombre']);

// Buscador restaurantes por categoria
Route::post('/restaurantes/buscarCategoria', [RestauranteController::class, 'showRestauranteCategoria']);

// Ruta que muestra el detalle del restaurante
Route::get('/restaurantes/{restaurante}', [RestauranteController::class, 'show']);

// Ruta para los platos de un restaurante
Route::get('/platos/{restaurante}', [PlatoController::class, 'platosRestaurante']);

// Ruta para la pagina de contacto
Route::get('/contacto', function () {
    return view('contacto');
});

// Ruta para mostrar mensajes cuando el rol no coincide
Route::get('/error', function () {
    return view('admin.error');
});


/**
 * Rutas para los usuarios logueados
 */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pagina principal
    Route::get('/platos', [PlatoController::class, 'platosMasPedidos'])->name('home');

    // Carrito
    Route::get('/carrito/{restaurante}/{plato}', [PedidoController::class, 'addCarrito']);
    Route::get('/carrito', [PedidoController::class, 'showCarrito']);

    // Pedidos
    Route::get('/pedido', [PedidoController::class, 'store']);
    
});


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Solo si eres admin y estas autenticado
Route::middleware(['auth', 'rol:admin'])->group(function () {

    //Rutas protegidas para admin
    Route::get('/clientes', [UserController::class, 'indexClientes'])->name('clientes');
    Route::get('/clientes/{cliente}/eliminar', [UserController::class, 'destroyClientes']);


    Route::get('/restaurantesAdmin', [RestauranteController::class, 'indexAdmin'])->name('restaurantesAdmin');
    Route::get('/restaurantesAdmin/{restaurante}/eliminar', [RestauranteController::class, 'destroy']);
    Route::get('/restaurantesAdmin/agregar', [RestauranteController::class, 'create']);
    Route::post('/restaurantesAdmin/store' , [RestauranteController::class, 'store']);
    Route::get('/restaurantesAdmin/{restaurante}/modificar', [RestauranteController::class, 'edit']);
    Route::post('/restaurantesAdmin/{restaurante}/update' , [RestauranteController::class, 'update']);


    Route::get('/restaurantesAdmin/{restaurante}/platos', [PlatoController::class, 'platosRestauranteAdmin']);
    Route::get('/restaurantesAdmin/{restaurante}/platos/agregar', [PlatoController::class, 'create']);
    Route::post('/restaurantesAdmin/{restaurante}/platos/store', [PlatoController::class, 'store']);
    Route::get('/restaurantesAdmin/{restaurante}/platos/{plato}/eliminar', [PlatoController::class, 'destroy']);

    Route::get('/repartidores', [UserController::class, 'indexRepartidores'])->name('repartidores');
    Route::get('/repartidores/{repartidor}/eliminar', [UserController::class, 'destroyRepartidores']);
    Route::get('/repartidores/agregar', [UserController::class, 'createRepartidores']);
    Route::post('/repartidores/store' , [UserController::class, 'storeRepartidores']);
    Route::get('/repartidores/{repartidor}/modificar', [UserController::class, 'editRepartidores']);
    Route::post('/repartidores/{repartidor}/update' , [UserController::class, 'updateRepartidores']);
});



require __DIR__.'/auth.php';
