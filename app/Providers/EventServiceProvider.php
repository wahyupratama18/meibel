<?php

namespace App\Providers;

use App\Models\{
    Category,
    Exercise,
    ExerciseFile,
    Material,
    MaterialFile
};
use App\Observers\{
    CategoryObserver,
    ExerciseFileObserver,
    ExerciseObserver,
    MaterialFileObserver,
    MaterialObserver
};
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Exercise::observe(ExerciseObserver::class);
        ExerciseFile::observe(ExerciseFileObserver::class);
        Material::observe(MaterialObserver::class);
        MaterialFile::observe(MaterialFileObserver::class);
    }
}
