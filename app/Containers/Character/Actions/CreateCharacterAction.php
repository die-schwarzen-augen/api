<?php

namespace App\Containers\Character\Actions;

use App\Containers\Character\Models\Character;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\UnstorableValueException;

/**
 * Class CreateCharacterAction
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class CreateCharacterAction extends Action
{
    /**
     * @param Request $request
     * @return Character
     * @throws UnstorableValueException
     */
    public function run(Request $request): Character
    {
        $data = $request->sanitizeInput([
            'name',
            'description',
            'notes',
        ]);

        $character = $this->call('Character@CreateCharacterTask', [$data]);

        $character->user()->associate($this->call('Authentication@GetAuthenticatedUserTask'));
        $character->save();

        return $character;
    }
}
