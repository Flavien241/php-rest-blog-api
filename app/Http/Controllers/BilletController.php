<?php

namespace App\Http\Controllers;

use App\Models\Billet;
use App\Http\Resources\BilletResource;

class BilletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return BilletResource::collection(Billet::with('commentaires')->get());
    }

    /**
     * Display the specified resource.
     */
    public function show(Billet $billet)
    {
        return new BilletResource($billet->load('commentaires'));
    }
}
