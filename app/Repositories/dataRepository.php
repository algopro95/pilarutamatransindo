<?php

namespace App\Repositories;

use App\Models\data;
use App\Repositories\BaseRepository;

/**
 * Class dataRepository
 * @package App\Repositories
 * @version June 21, 2023, 6:38 am UTC
*/

class dataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'kota_origin',
        'kota_destinasi',
        'kendaraan',
        'harga'
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
        return data::class;
    }
}
