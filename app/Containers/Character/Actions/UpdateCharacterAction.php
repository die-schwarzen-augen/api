<?php

namespace App\Containers\Character\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\UnstorableValueException;

/**
 * Class UpdateCharacterAction
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class UpdateCharacterAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     * @throws UnstorableValueException
     */
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            'name',
            'description',
            'notes',
        ]);

        return $this->call('Character@UpdateCharacterTask', [$request->id, $data]);
    }
}
