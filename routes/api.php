<?php

use App\Http\Resources\PlatoCollection;
use App\Models\Restaurante;
use App\Models\User;
use App\Models\Plato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\RestauranteCollection;
use App\Http\Resources\RestauranteResource;
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
    Route::get('/indalfood/retaurantes',  function () {
        return new RestauranteCollection(Restaurante::paginate(4));
    });

    // Restaurante y sus platos
    Route::get('/indalfood/restaurantes/{id}',  function ($id) {
        return new RestauranteResource(Restaurante::findOrFail($id));
    });

    // Platos de una categoria
    Route::get('/indalfood/platos/{categoria}',  function ($categoria) {
        return new PlatoCollection(Plato::where('categoria', $categoria)->get());
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