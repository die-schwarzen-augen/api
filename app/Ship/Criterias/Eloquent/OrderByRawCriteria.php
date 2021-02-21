<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Illuminate\Support\Str;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class OrderByRawCriteria
 *
 * @package App\Ship\Criterias\Eloquent
 * @author  Johannes Schobel <johannes.schobel@googlemail.com>
 */
class OrderByRawCriteria extends Criteria
{


    private $raw;

    /**
     * OrderByRawCriteria constructor.
     * @param $raw
     */
    public function __construct($raw)
    {
        $this->raw = $raw;
    }

    /**
     * @param                                                   $model
     * @param PrettusRepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->orderByRaw($this->raw);
    }

}
