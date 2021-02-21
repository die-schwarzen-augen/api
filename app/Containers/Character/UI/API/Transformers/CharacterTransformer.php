<?php

namespace App\Containers\Character\UI\API\Transformers;

use App\Containers\Character\Models\Character;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Ship\Parents\Transformers\Transformer;
use League\Fractal\Resource\Item;

class CharacterTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'user',
    ];

    /**
     * @param Character $entity
     *
     * @return array
     */
    public function transform(Character $entity)
    {
        $response = [
            'object'        => 'Character',
            'id'            => $entity->getHashedKey(),
            'name'          => $entity->name,
            'description'   => $entity->description,
            'notes'         => $entity->notes,
            'created_at'    => $entity->created_at,
            'updated_at'    => $entity->updated_at,
        ];

        $response = $this->ifAdmin([
            'real_id'       => $entity->id,
            'user_id'       => $entity->getHashedKey('user_id'),
        ], $response);

        return $response;
    }

    /**
     * @param Character $entity
     * @return Item
     */
    public function includeUser(Character $entity): Item
    {
        return $this->item($entity->user, new UserTransformer());
    }
}
