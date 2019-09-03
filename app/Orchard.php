<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orchard extends Model
{
    protected $table = 'MAE_HUERTOS';

    protected $fillable = [
        'cod_huerto', 'descripcion',
    ];
}
