<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
/**
 * @property int $ID_MATERIAL
 * @property int $ID_PRODUCTO
 * @property int $CANTIDAD
 * @property string $NOMBRE
 * @property int $PRECIO_UNITARIO
 * @property string $DESCRIPCION
 * @property string $ESTADO
 * @property int $TOTAL
 * @property Producto $producto
 * @property OrdenDeCompraMat[] $ordenDeCompraMats
 */
class Material extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'material';
    public $timestamps = false;
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'ID_MATERIAL';
    /**
     * @var array
     */
    protected $fillable = ['ID_PRODUCTO', 'CANTIDAD', 'NOMBRE', 'PRECIO_UNITARIO', 'DESCRIPCION', 'ESTADO', 'TOTAL','USER_C'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function producto()
    {
        return $this->belongsTo('App\Producto', 'ID_PRODUCTO', 'ID_PRODUCTO');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordenDeCompraMats()
    {
        return $this->hasMany('App\OrdenDeCompraMat', 'ID_MATERIAL', 'ID_MATERIAL');
    }
}