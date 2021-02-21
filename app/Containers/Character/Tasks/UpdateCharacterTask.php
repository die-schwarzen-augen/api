<?php

namespace App\Containers\Character\Tasks;

use App\Containers\Character\Data\Repositories\CharacterRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

/**
 * Class UpdateCharacterTask
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class UpdateCharacterTask extends Task
{

    protected $repository;

    public function __construct(CharacterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
