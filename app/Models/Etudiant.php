<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public static function sansFiliere()
    {
        return self::whereNull('filiere_id')->get();
    }
}
