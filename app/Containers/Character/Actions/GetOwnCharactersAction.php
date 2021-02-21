<?php

namespace App\Containers\Character\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use Dto\Exceptions\UnstorableValueException;
use Illuminate\Support\Collection;

/**
 * Class GetOwnCharactersAction
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class GetOwnCharactersAction extends Action
{
    /**
     * @param Request $request
     * @return mixed
     * @throws UnstorableValueException
     */
    public function run(Request $request)
    {
        return $this->call('Character@GetAllCharactersTask', [], [
            ['byUser' => [$this->call('Authentication@GetAuthenticatedUserTask')]],
        ]);
    }
}
