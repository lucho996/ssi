<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_DETALLE_COTIZACION
 * @property int $ID_PRODUCTO
 * @property int $ID_COTIZACION
 * @property string $UNIDAD
 * @property int $CANTIDAD
 * @property int $TOTAL
 * @property Cotizacion $cotizacion
 * @property Producto $producto
 */
class Detalle_C extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'detalle_cotizacion';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_DETALLE_COTIZACION';

    /**
     * @var array
     */
    protected $fillable = ['ID_PRODUCTO', 'ID_COTIZACION', 'UNIDAD', 'CANTIDAD', 'TOTAL'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cotizacion()
    {
        return $this->belongsTo('App\Cotizacion', 'ID_COTIZACION', 'ID_COTIZACION');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
}
