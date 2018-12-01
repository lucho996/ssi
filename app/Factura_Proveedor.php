<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_FACTURA
 * @property int $RUT
 * @property int $NUMERO_FACTURA
 * @property string $FECHA_INGRESO
 * @property string $RUTA
 * @property Proveedor $proveedor
 */
class Factura_Proveedor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'factura_proveedor';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_FACTURA';

    /**
     * @var array
     */
    protected $fillable = [ 'NUMERO_FACTURA', 'FECHA_INGRESO', 'RUTA'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

}
