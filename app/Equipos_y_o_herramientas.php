<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_EH
 * @property int $ID_INVENTARIO
 * @property int $ID_PRODUCTO
 * @property string $UNIDAD_E
 * @property int $CANTIDAD_DIAS_E
 * @property int $VALOR_TOTAL_E
 */
class Equipos_y_o_herramientas extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_EH';
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['ID_INVENTARIO', 'ID_PRODUCTO', 'UNIDAD_E', 'CANTIDAD_DIAS_E', 'VALOR_TOTAL_E'];

}
