<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_COTIZACION
 * @property int $ID_ORDEN_COMPRA
 * @property int $ID_IVA
 * @property int $RUT_CLIENTE
 * @property string $DESCRIPCION
 * @property string $FECHA_COTIZACION
 * @property string $FECHA_LLEGADA
 * @property string $FECHA_RESPUESTA_COTIZACION
 * @property int $VALOR_NETO
 * @property int $VALOR_TOTAL
 * @property int $COD_PETICION_OFERTA
 * @property int $PORC_DESCUENTO
 * @property string $ESTADO
 * @property OrdenDeCompra $ordenDeCompra
 * @property Iva $iva
 * @property Cliente $cliente
 * @property DetalleCotizacion[] $detalleCotizacions
 * @property Factura[] $facturas
 */
class Cotizacion extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'cotizacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_COTIZACION';
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['ID_ORDEN_COMPRA', 'ID_IVA', 'RUT_CLIENTE', 'DESCRIPCION', 'FECHA_COTIZACION', 'FECHA_LLEGADA', 'FECHA_RESPUESTA_COTIZACION', 'VALOR_NETO', 'VALOR_TOTAL', 'COD_PETICION_OFERTA', 'PORC_DESCUENTO', 'ESTADO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ordenDeCompra()
    {
        return $this->belongsTo('App\OrdenDeCompra', 'ID_ORDEN_COMPRA', 'ID_ORDEN_COMPRA');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function iva()
    {
        return $this->belongsTo('App\Iva', 'ID_IVA', 'ID_IVA');
    }

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
    public function detalleCotizacions()
    {
        return $this->hasMany('App\DetalleCotizacion', 'ID_COTIZACION', 'ID_COTIZACION');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function facturas()
    {
        return $this->hasMany('App\Factura', 'ID_COTIZACION', 'ID_COTIZACION');
    }
}
