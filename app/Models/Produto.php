<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \App\Models\ProdutoDetalhe;

class Produto extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id','fornecedor_id'];

    public function produtoDetalhe(){
        return $this->hasOne('\App\Models\ProdutoDetalhe');
    }

    public function fornecedor(){
        return $this->belongsTo('App\Models\Fornecedor');
    }
    
    public function pedido(){
        return $this->belongsToMany('App\Models\Pedido', 'pedido_produtos')->withPivot('created_at');
    }
}
