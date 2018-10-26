<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_INVENTARIO
 * @property string $NOMBRE
 * @property string $MARCA
 * @property string $UBICACION
 * @property int $VALOR
 * @property string $ESTADO
 */
class Inventario extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'inventario';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_INVENTARIO';

    /**
     * @var array
     */
    protected $fillable = ['NOMBRE', 'MARCA', 'UBICACION', 'VALOR', 'ESTADO'];

}
