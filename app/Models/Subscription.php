<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Subscription
 * @package App\Models
 * @version March 18, 2023, 12:37 pm UTC
 *
 * @property string $name
 * @property string $description
 * @property string $image
 */
class Subscription extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'subscriptions';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'image',
        'price',
        'month'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'image' => 'string',
        'price' => 'string',
        'month' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'image' => 'required',
        'price' => 'required',
        'month' => 'required'
    ];


}
