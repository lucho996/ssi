<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_ORDEN_COMPRA
 * @property int $RUT_CLIENTE
 * @property int $NUM_ORDEN_COMPRA
 * @property string $FECHA_INGRESO
 * @property string $RUTA
 * @property Cliente $cliente
 * @property Cotizacion[] $cotizacions
 */
class Orden_de_compra extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'orden_de_compra';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_ORDEN_COMPRA';

    /**
     * @var array
     */
    protected $fillable = ['RUT_CLIENTE', 'NUM_ORDEN_COMPRA', 'FECHA_INGRESO', 'RUTA'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'RUT_CLIENTE', 'RUT_CLIENTE');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cotizacions()
    {
        return $this->hasMany('App\Cotizacion', 'ID_ORDEN_COMPRA', 'ID_ORDEN_COMPRA');
    }
}
