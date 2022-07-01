<?php

namespace App\Providers;

use Arpite\Core\Utilities\Notification;
use Arpite\Layout\Layouts\LeftSideLayout;
use Arpite\Page\Resolvers\LayoutResolver;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LayoutResolver::class, function () {
            return LeftSideLayout::make();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share([
            "baseUrl" => fn() => URL::to("/"),
            "applicationName" => fn() => env("APP_NAME"),
            "notification" => fn() => Notification::getAndClear(),
            "resetFormIdentifier" => fn() => Session::get("resetFormIdentifier"),
            "csrfToken" => fn() => csrf_token(),
        ]);
    }
}
