<?php

namespace App\Containers\Character\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class CharacterRepository
 */
class CharacterRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'name' => 'ilike',
    ];

}
