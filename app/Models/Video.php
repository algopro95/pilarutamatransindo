<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Video
 * @package App\Models
 * @version March 18, 2023, 12:34 pm UTC
 *
 * @property integer $playlist_id
 * @property string $title
 * @property string $body
 * @property string $video
 * @property string $image
 */
class Video extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'videos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'playlist_id',
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
        'playlist_id' => 'integer',
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
        'playlist_id' => 'required',
        'title' => 'required',
        'body' => 'required',
        'video' => 'required',
        'image' => 'required'
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class);
    }

    
}
