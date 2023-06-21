<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Order
 * @package App\Models
 * @version March 18, 2023, 12:39 pm UTC
 *
 * @property integer $user_id
 * @property integer $playlist_id
 * @property integer $subscription_id
 * @property string $amount
 * @property string $status
 */
class Order extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'playlist_id',
        'subscription_id',
        'amount',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'playlist_id' => 'integer',
        'subscription_id' => 'integer',
        'amount' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'playlist_id' => 'required',
        'subscription_id' => 'required',
        'amount' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    
}
