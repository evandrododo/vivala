<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CompraClickbus extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'compra_clickbus';

    //Settando colunas que podem ser MassAssigned
    //AKA CompraClickBus::create(['coluna' => 'valor']);
    protected $fillable = [
        'user_id',
        'buyer_firstname',
        'buyer_lastname',
        'buyer_birthday',
        'buyer_document',
        'buyer_document_type',
        'buyer_phone',
        'payment_method',
        'voucher',
        'voucher_discount',
        'desconto_total',
        'taxas',
        'total',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function poltronas()
    {
        return $this->hasMany('App\CompraClickBusPoltrona');
    }
}
