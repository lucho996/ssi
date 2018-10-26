<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $RUTP
 * @property string $CONTRASENA
 * @property string $RE_CONTRASENA
 * @property string $FECHA_REGISTRO
 * @property Personal $personal
 */
class Usuarios extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'RUTP';

    /**
     * @var array
     */
    protected $fillable = ['CONTRASENA', 'RE_CONTRASENA', 'FECHA_REGISTRO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personal()
    {
        return $this->belongsTo('App\Personal', 'RUTP', 'RUTP');
    }
}
