<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BilletController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

// Route d'enregistrement
Route::post('/register', [UserController::class, 'store']);

// Route de connexion
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['Les identifiants fournis sont incorrects.'],
        ]);
    }

    return $user->createToken('auth_token')->plainTextToken;
});

// Routes protégées
Route::middleware('auth:sanctum')->group(function () {
    // Information utilisateur
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Déconnexion
    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Déconnecté avec succès']);
    });

    // Routes des billets
    Route::get('/billets', [BilletController::class, 'index']);
    Route::get('/billet/{billet}', [BilletController::class, 'show']);

    // Route des commentaires
    Route::post('/commentaire', [CommentaireController::class, 'store']);
});
