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
        'App\Http\Controllers\Auth\AuthController',
        'App\Http\Controllers\HomeController',
        'App\Http\Controllers\LanguageController',
        'App\Http\Controllers\User\UploadController',
        'App\Http\Controllers\User\ContactController',
        'App\Http\Controllers\User\ProfileController',
        'App\Http\Controllers\User\BookController',
        'App\Http\Controllers\User\ProjectController',
        'App\Http\Controllers\User\SocialMediaController',
        'App\Http\Controllers\User\AdvancedSettingsController',
        'App\Http\Controllers\User\MessageController',
    ];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = true;

}
