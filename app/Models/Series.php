<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;
    protected $fillable = ['nome'];
    protected $with = ['seasons'];

    //metodo para fazer relacionamento com a model Season
    public function seasons(){
        return $this->hasMany(Season::class,  'series_id');
    }

    //função que cria um escopo globar, informa ao eloquent como fazer uma busca usando o 'all()' por exemplo
    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder){
            $queryBuilder->orderBy('nome');
        });
    }
}
