<?php

namespace App\Containers\Character\Tasks;

use App\Containers\Character\Data\Repositories\CharacterRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class DeleteCharacterTask
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class DeleteCharacterTask extends Task
{

    protected $repository;

    public function __construct(CharacterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
