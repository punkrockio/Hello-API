<?php

namespace App\Containers\Demo\Providers;

use App\Kernel\Provider\Abstracts\ServiceProviderAbstract;

/**
 * Class DemoServiceProvider.
 *
 * The Main Service Provider of this Module.
 * Will be automatically registered in the framework after
 * adding the Module name to containers config file.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class DemoServiceProvider extends ServiceProviderAbstract
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Container internal Service Provides.
     *
     * @var array
     */
    private $containerServiceProviders = [
        // ...
    ];

    /**
     * Perform post-registration booting of services.
     */
    public function boot()
    {
        $this->registerServiceProviders($this->containerServiceProviders);
    }

    /**
     * Register bindings in the container.
     */
    public function register()
    {

    }
}
