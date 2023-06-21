<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class data
 * @package App\Models
 * @version June 21, 2023, 6:38 am UTC
 *
 * @property string $user_id
 * @property string $kota_origin
 * @property string $kota_destinasi
 * @property string $kendaraan
 * @property string $harga
 */
class data extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'data';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'kota_origin',
        'kota_destinasi',
        'kendaraan',
        'harga'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'string',
        'kota_origin' => 'string',
        'kota_destinasi' => 'string',
        'kendaraan' => 'string',
        'harga' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'kota_origin' => 'required',
        'kota_destinasi' => 'required',
        'kendaraan' => 'required',
        'harga' => 'required'
    ];

    
}
