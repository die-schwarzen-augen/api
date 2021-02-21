<?php

namespace App\Containers\Character\UI\API\Requests;

use App\Containers\Character\Data\Transporters\CreateCharacterTransporter;
use App\Ship\Parents\Requests\Request;

/**
 * Class CreateCharacterRequest.
 */
class CreateCharacterRequest extends Request
{

    /**
     * Define which Roles and/or Permissions has access to this request.
     *
     * @var  array
     */
    protected $access = [
        'permissions' => '',
        'roles'       => '',
    ];

    /**
     * @return  array
     */
    public function rules()
    {
        return [
            'name'          => 'required|min:3',
            'description'   => '',
            'notes'         => '',
        ];
    }

    /**
     * @return  bool
     */
    public function authorize()
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
