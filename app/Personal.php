<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $RUTP
 * @property string $NOMBREP
 * @property string $APELLIDOP
 * @property int $TELEFONOP
 * @property string $CORREOP
 * @property int $HORAHOMBRE
 * @property string $FECHANACIMIENTO
 * @property string $DIRECCION
 * @property string $TIPO
 * @property CargoPersonal[] $cargoPersonals
 * @property ManoDeObra[] $manoDeObras
 * @property Usuario $usuario
 */
class Personal extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'personal';
    public $timestamps =false;

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'RUTP';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['NOMBREP', 'APELLIDOP', 'TELEFONOP', 'CORREOP', 'HORAHOMBRE', 'FECHANACIMIENTO', 'DIRECCION', 'TIPO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cargoPersonals()
    {
        return $this->hasMany('App\CargoPersonal', 'RUTP', 'RUTP');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function manoDeObras()
    {
        return $this->hasMany('App\ManoDeObra', 'RUTP', 'RUTP');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Usuario', 'RUTP', 'RUTP');
    }
}
