<?php

namespace App\Containers\Character\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class DeleteCharacterAction
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class DeleteCharacterAction extends Action
{
    public function run(Request $request)
    {
        return $this->call('Character@DeleteCharacterTask', [$request->id]);
    }
}
