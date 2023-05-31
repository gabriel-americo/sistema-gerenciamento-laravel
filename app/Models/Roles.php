<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['nome', 'descricao'];

    // Definindo o relacionamento muitos-para-muitos com o modelo Usuario
    public function usuarios()
    {
      return $this->belongsToMany(Usuarios::class);
    }
}
