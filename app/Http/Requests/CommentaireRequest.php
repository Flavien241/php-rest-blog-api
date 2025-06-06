<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentaireRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contenu' => 'required|string',
            'billet_id' => 'required|exists:billets,id'
        ];
    }
}