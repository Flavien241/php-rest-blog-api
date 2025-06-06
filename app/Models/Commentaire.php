<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commentaire extends Model
{
    /** @use HasFactory<\Database\Factories\CommentaireFactory> */
    use HasFactory;

    protected $fillable = [
        'COM_DATE',
        'COM_AUTEUR',
        'COM_CONTENU',
        'billet_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function billet(): BelongsTo
    {
        return $this->belongsTo(Billet::class);
    }
}
