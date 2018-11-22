<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int $ID_MANO_OBRA
 * @property int $ID_PRODUCTO
 * @property int $RUTP
 * @property int $CANTIDAD_HORAS
  * @property int $H_H
 * @property int $TOTAL_MANO_OBRA
 * @property Producto $producto
 * @property Personal $personal
 */
class Mano_Obra extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'mano_de_obra';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_MANO_OBRA';
    /**
     * @var array
     */
    protected $fillable = ['ID_PRODUCTO', 'RUTP', 'CANTIDAD_HORAS','H_H', 'TOTAL_MANO_OBRA','USER_C'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personal()
    {
        return $this->belongsTo('App\Personal', 'RUTP', 'RUTP');
    }
}