<?php

namespace App\Models;

use App\Models\Administracao\Perfil;
use App\Models\Administracao\PessoaFisica;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'perfil_id',
        'status',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function buscar(int $perPage, string $keyword)
    {
        return self::with('pessoaFisica', 'perfil')
            ->where('status', 'ativo')
            ->where('name', 'like', "%{$keyword}%")
            ->paginate($perPage);
    }

    public function pessoaFisica()
    {
        return $this->hasOne(PessoaFisica::class);
    }

    public function perfil()
    {
        return $this->belongsTo(Perfil::class);
    }
}
