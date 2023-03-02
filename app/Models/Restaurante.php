<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plato;

class Restaurante extends Model
{
    use HasFactory;

    /**
     * Get the platos for the restaurante.
     */
    public function platos()
    {
        return $this->hasMany(Plato::class, 'restaurante_id');
    }
}
