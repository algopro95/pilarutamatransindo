<?php

namespace App\Repositories;

use App\Models\PlaylistUser;
use App\Repositories\BaseRepository;

/**
 * Class PlaylistUserRepository
 * @package App\Repositories
 * @version March 18, 2023, 12:44 pm UTC
*/

class PlaylistUserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'playlist_id',
        'subscription_id',
        'start_date',
        'status'
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
        return PlaylistUser::class;
    }
}
