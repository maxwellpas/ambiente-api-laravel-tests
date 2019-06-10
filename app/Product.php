<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable= ['name', 'price', 'description'];
    

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
