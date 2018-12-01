<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_OT
 * @property string $ID_PRODUCTO
 * @property date $FECHA_INICIO
 * @property date $FECHA_TERMINO
 * @property string $OBS
 */

class Orden_trabajo extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'orden_trabajo';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_OT';

    /**
     * @var array
     */
    protected $fillable = ['ID_PRODUCTO', 'FECHA_INICIO','FECHA_TERMINO','OBS'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function producto()
    {
        return $this->hasMany('App\Producto', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
   
}