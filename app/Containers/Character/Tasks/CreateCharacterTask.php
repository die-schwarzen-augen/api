<?php

namespace App\Containers\Character\Tasks;

use App\Containers\Character\Data\Repositories\CharacterRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

/**
 * Class CreateCharacterTask
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class CreateCharacterTask extends Task
{

    protected $repository;

    /**
     * CreateCharacterTask constructor.
     * @param CharacterRepository $repository
     */
    public function __construct(CharacterRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator|Collection|mixed
     */
    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
