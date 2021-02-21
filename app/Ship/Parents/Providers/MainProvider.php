<?php

namespace App\Ship\Parents\Providers;

use Apiato\Core\Abstracts\Providers\MainProvider as AbstractMainProvider;
use Illuminate\Support\Facades\Gate;

/**
 * Class MainProvider.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class MainProvider extends AbstractMainProvider
{
    /**
     * The policy mappings for the container.
     *
     * @var array
     */
    protected array $policies = [];

    /**
     * Register the container's policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        foreach ($this->policies() as $key => $value) {
            Gate::policy($key, $value);
        }
    }

    /**
     * Get the policies defined on the provider.
     *
     * @return array
     */
    public function policies()
    {
        return $this->policies;
    }

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        parent::boot();

        $this->registerPolicies();
    }

    /**
     * Register anything in the container.
     */
    public function register()
    {
        parent::register();
    }

}
