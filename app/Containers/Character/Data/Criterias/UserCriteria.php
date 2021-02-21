<?php

namespace App\Containers\Character\Data\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class UserCriteria.
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class UserCriteria extends Criteria
{

    /**
     * @var string
     */
    private $user;

    /**
     * UserCriteria constructor.
     *
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * @param                            $model
     * @param PrettusRepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('user_id', $this->user->id);
    }
}
