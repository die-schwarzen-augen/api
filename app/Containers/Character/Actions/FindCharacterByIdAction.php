<?php

namespace App\Containers\Character\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\UnstorableValueException;

/**
 * Class FindCharacterByIdAction
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class FindCharacterByIdAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     * @throws UnstorableValueException
     */
    public function run(Request $request)
    {
        return $this->call('Character@FindCharacterByIdTask', [$request->id]);
    }
}
