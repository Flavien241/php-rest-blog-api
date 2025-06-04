<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Routes protégées par Sanctum (nécessitent un token)
Route::middleware('auth:sanctum')->group(function () {
    // Récupérer les informations de l'utilisateur connecté
    Route::get('/user', [UserController::class, 'show']);

    // Déconnexion : suppression des tokens
    Route::post('/user/logout', function (Request $request) {
        auth()->user()->tokens()->delete();
    });
});

// Création de compte utilisateur
Route::post('/register', [UserController::class, 'store']);

// Connexion utilisateur
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email|max:50',
        'password' => 'required|string|min:8',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }

    return $user->createToken('auth_token')->plainTextToken;
});
