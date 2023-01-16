<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Project extends Model
{
    use HasFactory;


    protected $fillable = ['title', 'cover_image', 'description', 'slug', 'type_id']; // per assegnare in blocco le proprietà, crea l'ogg. con tutte le props assegnate con i valori che gli abbiamo passato

    /* funzione di tipo utility per generare qui lo slug
    che poi viene richiamata nel metodo store del Controller
    */

    public static function generateSlug($title)
    {
        $project_slug = Str::slug($title);
        return $project_slug;
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
