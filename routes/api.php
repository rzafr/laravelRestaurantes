<?php

use App\Models\Restaurante;
use App\Models\User;
use App\Models\Plato;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\RestauranteCollection;
use App\Http\Resources\RestauranteResource;
use App\Http\Resources\PlatoCollection;
use App\Http\Resources\PlatoResource;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Http\Resources\PedidoCollection;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\PlatoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {

    // Todos los restaurantes
    Route::get('/indalfood/restaurantes', function () {
        return new RestauranteCollection(Restaurante::paginate(10));
    });

    // Informacion de un restaurante y sus platos
    Route::get('/indalfood/restaurantes/{id}', function ($id) {
        return new RestauranteResource(Restaurante::findOrFail($id));
    });

    // Platos de una categoria
    Route::get('/indalfood/platos/{categoria}', function ($categoria) {
        return new PlatoCollection(Plato::where('categoria', $categoria)->get());
    });

    // Informacion de un plato en concreto
    Route::get('/indalfood/platos/id/{id}', function ($id) {
        return new PlatoResource(Plato::findOrFail($id));
    });

    // Informacion de un cliente
    Route::get('/indalfood/clientes/{dni}', function ($dni) {
        return new UserResource(User::where('dni', $dni)->get());
    });

    // Todos los pedidos de un cliente
    Route::get('/indalfood/clientes/{dni}/pedidos', function ($dni) {
        return new UserCollection(Pedido::where('cliente_id', User::where('dni', $dni)->first()->id)->get());
    });

    // Informacion de un pedido en concreto
    Route::get('/indalfood/clientes/{dni}/pedidos/{id}', function ($dni, $id) {
        return new UserResource(Pedido::where('cliente_id', User::where('dni', $dni)->first()->id)->where('id', $id)->first());
    });

    // Todos los pedidos ordenados por fecha y paginados
    Route::get('/indalfood/pedidos', function () {
        return new PedidoCollection(Pedido::orderBy('created_at', 'asc')->paginate(10));
    });

    // Crea un restaurante
    Route::put('/indalfood/restaurantes', [RestauranteController::class, 'crearRestaurante']);

    // Crea un plato
    Route::put('/indalfood/restaurantes/{id}/plato', [PlatoController::class, 'crearPlato']);

    // Borra un restaurante y todos sus platos
    Route::delete('/indalfood/restaurantes/{id}', function ($id) {
        Restaurante::findOrFail($id)->delete();
        return response()->json(['msg:' => 'Restaurante borrado']);
    });

    // Borra un plato de un restaurante
    Route::delete('/indalfood/restaurantes/{idRestaurante}/platos/{idPlato}', function ($idRestaurante, $idPlato) {
        Plato::findOrFail($idPlato)->where('restaurante_id', $idRestaurante)->delete();
        return response()->json(['msg:' => 'Plato borrado']);
    });
});



// Creamos token
Route::post('/tokens/create', function (Request $request) {
  
    $user = User::where('email', $request->email)->first();
  
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['error' => 'Usuario o contraseña incorrectos']);
        /*
        throw ValidationException::withMessages([
          'email' => ['The provided credentials are incorrect.'],
        ]);
        */
    }

    $token = $user->createToken($request->email);
 
    return response()->json(['token' => $token->plainTextToken]);
});