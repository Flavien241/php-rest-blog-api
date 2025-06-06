<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Http\Resources\CommentaireResource;
use App\Http\Requests\CommentaireRequest;

class CommentaireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(CommentaireRequest $request)
    {
        $commentaire = Commentaire::create([
            'COM_DATE' => now(),
            'COM_AUTEUR' => auth()->user()->name,
            'COM_CONTENU' => $request->contenu,
            'billet_id' => $request->billet_id,
            'user_id' => auth()->id()
        ]);

        return new CommentaireResource($commentaire);
    }
}
