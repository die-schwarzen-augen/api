<?php

namespace App\Containers\Character\Providers;

use App\Containers\Character\Models\Character;
use App\Containers\Character\Policies\CharacterPolicy;
use App\Ship\Parents\Providers\MainProvider;
use Illuminate\Support\Facades\Gate;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *
 * @author Sebastian Weckend <sebastian.weckend@posteo.de>
 */
class MainServiceProvider extends MainProvider
{
    /**
     * @var array|string[]
     */
    protected array $policies = [
        Character::class => CharacterPolicy::class,
    ];

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public array $serviceProviders = [
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $aliases = [
    ];

}
