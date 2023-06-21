<?php

namespace App\Repositories;

use App\Models\Playlist;
use App\Repositories\BaseRepository;

/**
 * Class PlaylistRepository
 * @package App\Repositories
 * @version March 18, 2023, 12:26 pm UTC
*/

class PlaylistRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category_id',
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
        return Playlist::class;
    }
}
