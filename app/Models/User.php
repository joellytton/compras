<?php

namespace App\Models;

use App\Models\Administracao\PessoaFisica;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Pagination\AbstractPaginator;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function buscar(int $perPage, string $keyword): AbstractPaginator
    {
        return self::with('pessoaFisica')
            ->where('status', 'ativo')
            ->where('name', 'like', "%{$keyword}%")
            ->paginate($perPage);
    }

    public function pessoaFisica()
    {
        return $this->hasOne(PessoaFisica::class);
    }
}
