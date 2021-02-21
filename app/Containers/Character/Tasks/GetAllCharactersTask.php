<?php

namespace App\Containers\Character\Tasks;

use App\Containers\Character\Data\Criterias\UserCriteria;
use App\Containers\Character\Data\Repositories\CharacterRepository;
use App\Containers\User\Models\User;
use App\Ship\Parents\Tasks\Task;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class GetAllCharactersTask
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class GetAllCharactersTask extends Task
{

    protected $repository;

    /**
     * GetAllCharactersTask constructor.
     * @param CharacterRepository $repository
     */
    public function __construct(CharacterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        return $this
            ->repository
            ->with($this->with)
            ->withCount($this->withCount)
            ->paginate();
    }

    /**
     * @param User|null $user
     * @throws RepositoryException
     */
    public function byUser(?User $user)
    {
        if ($user) $this->repository->pushCriteria(new UserCriteria($user));
    }
}
