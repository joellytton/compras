<?php

namespace App\Models\Administracao;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\AbstractPaginator;

class AreaAbrangencia extends Model
{
    use HasFactory;

    protected $table = 'areas_abrangencias';



    protected static function buscar(int $perPage, string $keyword): AbstractPaginator
    {
        return self::select('areas_abrangencias.*', 'cidades.nome as cidade')
            ->join('cidades', 'cidades.id', '=', 'areas_abrangencias.cidade_id')
            ->where('areas_abrangencias.status', 'ativo')
            ->where('cidades.nome', 'like', "%{$keyword}%")
            ->paginate($perPage);
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }
}
