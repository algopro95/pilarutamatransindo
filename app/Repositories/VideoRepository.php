<?php

namespace App\Repositories;

use App\Models\Video;
use App\Repositories\BaseRepository;

/**
 * Class VideoRepository
 * @package App\Repositories
 * @version March 18, 2023, 12:34 pm UTC
*/

class VideoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'playlist_id',
        'title',
        'body',
        'video',
        'image'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Video::class;
    }
}
