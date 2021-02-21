<?php

namespace App\Containers\Character\Tasks;

use App\Containers\Character\Data\Repositories\CharacterRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class FindCharacterByIdTask
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class FindCharacterByIdTask extends Task
{

    protected $repository;

    public function __construct(CharacterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
