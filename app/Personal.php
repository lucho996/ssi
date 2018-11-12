<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $RUTP
 * @property string $NOMBREP
 * @property string $APELLIDOP
 * @property string $CIUDAD
 * @property string $DIRECCION
 * @property string $ESTADO_CIVIL
 * @property string $TITULO
 * @property string $NOMBRE_CONYUGE
 * @property string $TELEFONO_CONYUGE
 * @property int $TELEFONOP
 * @property string $CORREOP
 * @property string $FECHANACIMIENTO
 * @property string $ESTADO
 * @property string $MOTIVO
 * @property string $LUGAR_TRABAJO
 * @property string $PREVISION
 * @property string $AFP
 * @property int $SUELDO_BASE
 * @property int $GRATIFICACION
 * @property int $MOVILIZACION
 * @property int $COLACION
 * @property string $FECHA_INICIO_CONTRATO
 * @property string $FECHA_TERMINO_CONTRATO
 * @property string $TALLA_ROPA
 * @property int $NZAPATO
 * @property string $UBICACION
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
    public $timestamps = false;

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
    protected $fillable = ['NOMBREP', 'APELLIDOP', 'CIUDAD', 'DIRECCION', 'ESTADO_CIVIL', 'TITULO', 'NOMBRE_CONYUGE', 'TELEFONO_CONYUGE', 'TELEFONOP', 'CORREOP', 'FECHANACIMIENTO', 'ESTADO', 'MOTIVO', 'LUGAR_TRABAJO', 'PREVISION', 'AFP', 'SUELDO_BASE', 'GRATIFICACION', 'MOVILIZACION', 'COLACION', 'FECHA_INICIO_CONTRATO', 'FECHA_TERMINO_CONTRATO', 'TALLA_ROPA', 'NZAPATO'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cargoPersonals()
    {
        return $this->hasMany('App\CargoPersonal', 'RUTP', 'RUTP');
    }
    public function cargos()
    {
        return $this->belongsToMany('App\Cargo','cargo_personal','ID_CARGO', 'RUTP')
        ->withPivot('FECHA_CARGO');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function manoDeObras()
    {
        return $this->hasMany('App\ManoDeObra', 'RUTP', 'RUTP');
    }

    public function Carga_Familiars()
    {
        return $this->hasMany('App\Carga_Familiar', 'RUTP', 'RUTP');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function usuario()
    {
        return $this->hasOne('App\Usuario', 'RUTP', 'RUTP');
    }
}
