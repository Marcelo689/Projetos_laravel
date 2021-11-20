<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable=['nome','descricao','peso','unidade_id'];

    public function ItemDetalhe(){
        return $this->hasOne('App\ItemDetalhe','produto_id','id');
    }
    public function fornecedor(){
        // passando modelo que contem foreign key de relacionamento
        //return $this->belongsTo('App\Fornecedor','fornecedor_id','id');
        return $this->belongsTo('App\Fornecedor');
    }
}
