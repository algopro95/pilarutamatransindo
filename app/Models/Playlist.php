<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Playlist
 * @package App\Models
 * @version March 18, 2023, 12:26 pm UTC
 *
 * @property integer $category_id
 * @property string $title
 * @property string $body
 * @property string $video
 * @property string $image
 */
class Playlist extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'playlists';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'body',
        'video',
        'image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'body' => 'string',
        'video' => 'string',
        'image' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'required',
        'video' => 'required',
        'image' => 'required'
    ];


}
