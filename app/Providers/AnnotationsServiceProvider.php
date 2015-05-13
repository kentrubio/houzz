<?php namespace App\Providers;

use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;

class AnnotationsServiceProvider extends ServiceProvider {

    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [
    ];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = true;

}
