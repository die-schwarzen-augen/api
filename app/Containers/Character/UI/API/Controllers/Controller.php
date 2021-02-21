<?php

namespace App\Containers\Character\UI\API\Controllers;

use App\Containers\Character\UI\API\Requests\CreateCharacterRequest;
use App\Containers\Character\UI\API\Requests\DeleteCharacterRequest;
use App\Containers\Character\UI\API\Requests\GetOwnCharactersRequest;
use App\Containers\Character\UI\API\Requests\FindCharacterByIdRequest;
use App\Containers\Character\UI\API\Requests\UpdateCharacterRequest;
use App\Containers\Character\UI\API\Transformers\CharacterTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\UnstorableValueException;
use Illuminate\Http\JsonResponse;

/**
 * Class Controller
 *
 * @package App\Containers\Character\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateCharacterRequest $request
     * @return JsonResponse
     */
    public function createCharacter(CreateCharacterRequest $request): JsonResponse
    {
        $character = $this->transactionalCall('Character@CreateCharacterAction', [$request]);

        return $this->created($this->transform($character, CharacterTransformer::class));
    }

    /**
     * @param FindCharacterByIdRequest $request
     * @return array
     * @throws UnstorableValueException
     */
    public function findCharacterById(FindCharacterByIdRequest $request): array
    {
        $character = $this->call('Character@FindCharacterByIdAction', [$request]);

        return $this->transform($character, CharacterTransformer::class);
    }

    /**
     * @param GetOwnCharactersRequest $request
     * @return array
     */
    public function getOwnCharacters(GetOwnCharactersRequest $request): array
    {
        $characters = Apiato::call('Character@GetOwnCharactersAction', [$request]);

        return $this->transform($characters, CharacterTransformer::class);
    }

    /**
     * @param UpdateCharacterRequest $request
     * @return array
     */
    public function updateCharacter(UpdateCharacterRequest $request): array
    {
        $character = $this->transactionalCall('Character@UpdateCharacterAction', [$request]);

        return $this->transform($character, CharacterTransformer::class);
    }

    /**
     * @param DeleteCharacterRequest $request
     * @return JsonResponse
     */
    public function deleteCharacter(DeleteCharacterRequest $request): JsonResponse
    {
        $this->transactionalCall('Character@DeleteCharacterAction', [$request]);

        return $this->noContent();
    }
}
