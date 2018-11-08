<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $ID_CARGA_FAMILIAR
 * @property int $RUTP
 * @property int $RUT
 * @property string $NOMBRE
 * @property string $FECHA_NACIMIENTO
 * @property Personal $personal
 */
class Carga_Familiar extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'carga_familiar';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_CARGA_FAMILIAR';

    /**
     * @var array
     */
    protected $fillable = ['RUTP', 'RUT', 'NOMBRE', 'FECHA_NACIMIENTO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personal()
    {
        return $this->belongsTo('App\Personal', 'RUTP', 'RUTP');
    }
}
