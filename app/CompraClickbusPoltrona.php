<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class CompraClickbusPoltrona extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'compras_clickbus_poltronas';

    //Settando colunas que podem ser MassAssigned
    //AKA CompraClickBusPoltrona::create(['coluna' => 'valor']);
    protected $fillable = [
        'compra_id',
        'departure_id',
        'arrival_id',
        'viacao_id',
        'localizer',
        'passenger_name',
        'passenger_document_number',
        'passenger_document_type',
        'seat_number',
        'passenger_email',
        'departure_time',
        'arrival_time',
        'subtotal'
    ];

    /**
     * Toda poltrona pertence a uma compra
     */
    public function compra()
    {
        return $this->belongsTo("App\CompraClickBus");
    }

    /**
     * Toda poltrona tem um local de embarque
     */
    public function embarque()
    {
        return $this->belongsTo("App\ClickBusPlaces", 'departure_id');
    }

    /**
     * Toda poltrona tem um local de desembarque
     */
    public function desembarque()
    {
        return $this->belongsTo("App\ClickBusPlaces", 'arrival_id');
    }

    /**
     * Toda poltrona é oferecida por 1 viacao
     */
    public function viacao()
    {
        return $this->belongsTo("App\ClickBusCompanies", 'viacao_id');
    }

}
