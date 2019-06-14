<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'price', 'description'];

    protected $dates = ['deleted_at'];


    /**
     * Aplicação de funções globais desatualizada
    protected static function boot()
    {
        parent::boot();
        
        static::addGlobalScope('maioresQue150', function(Builder $builder){
            $builder->where('id', '>', '150');

        });
    }
     */


    /**
     * Tranbalhando com mutators, antes de ser registrado no banco de dados
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }


    /**
     * Trabalhando com acessor, antes de enviar para o usuário
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
