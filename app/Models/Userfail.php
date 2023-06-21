<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * Class User
 * @package App\Models
 * @version March 18, 2023, 12:51 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $orders
 * @property \Illuminate\Database\Eloquent\Collection $playlistUsers
 * @property string $name
 * @property string $last_name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $birth_date
 * @property string $whatsapp
 * @property string $id_name
 * @property string $password
 * @property string $remember_token
 */
class User extends Model
{
    use SoftDeletes;
    use HasFactory, Notifiable;

    use HasFactory;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'last_name',
        'email',
        'email_verified_at',
        'birth_date',
        'whatsapp',
        'id_name',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'birth_date' => 'date',
        'whatsapp' => 'string',
        'id_name' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'email' => 'required|string|max:255',
        'email_verified_at' => 'nullable',
        'birth_date' => 'nullable',
        'whatsapp' => 'nullable|string|max:255',
        'id_name' => 'nullable|string|max:255',
        'password' => 'required|string|max:255',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function orders()
    {
        return $this->hasMany(\App\Models\Order::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function playlistUsers()
    {
        return $this->hasMany(\App\Models\PlaylistUser::class, 'user_id');
    }
}
