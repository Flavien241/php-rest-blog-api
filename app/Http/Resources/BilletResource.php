<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BilletResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titre' => $this->BIL_TITRE,
            'contenu' => $this->BIL_CONTENU,
            'date' => $this->BIL_DATE,
            'user_id' => $this->user_id,
            'commentaires' => CommentaireResource::collection($this->whenLoaded('commentaires')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}