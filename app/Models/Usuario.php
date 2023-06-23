<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
  use Notifiable;

  protected $table = 'usuarios';

  protected $fillable = [
    'nome', 'user', 'email', 'sexo', 'imagem', 'password', 'tipo', 'status',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  // Definindo o relacionamento muitos-para-muitos com o modelo Role
  public function roles()
  {
    return $this->belongsToMany(Role::class, 'roles_usuarios', 'usuarios_id', 'roles_id');
  }

  // Criptogrifar a senha
  public function setPasswordAttribute($password)
  {
    $this->attributes['password'] = bcrypt($password);
  }

  public function getStatusAttribute()
  {
    return $this->attributes['status'] == 1 ? 'Ativo' : 'Desativado';
  }

  public function hasRoles($role)
  {
    return $this->roles()->where('nome', $role)->exists();
  }
}
