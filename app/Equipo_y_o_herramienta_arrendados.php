<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_EQ_ARRENDADOS
 * @property int $ID_PRODUCTO
 * @property string $NOMBRE
 * @property string $MARCA
 * @property int $VALOR
 * @property string $UNIDAD
 * @property int $CANTIDAD
 * @property int $VALOR_TOTAL
 * @property Producto $producto
 */
class Equipo_y_o_herramienta_arrendados extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_EQ_ARRENDADOS';

    /**
     * @var array
     */
    protected $fillable = ['ID_PRODUCTO', 'NOMBRE', 'MARCA', 'VALOR', 'UNIDAD', 'CANTIDAD', 'VALOR_TOTAL'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
}
