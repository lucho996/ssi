<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $RUT
 * @property string $NOMBRE
 * @property string $DIRECCION
 * @property string $CIUDAD
 * @property int $TELEFONO
 * @property string $CORREO
 */
class Proveedor extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'proveedor';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'RUT';

    /**
     * @var array
     */
    protected $fillable = ['NOMBRE', 'DIRECCION', 'CIUDAD', 'TELEFONO', 'CORREO'];

}
