<?php

namespace App\Providers;

use App\Pages\DashboardPage\DashboardPage;
use Arpite\Component\Enums\Icon;
use Arpite\Core\Utilities\Notification;
use Arpite\Layout\Layouts\LeftSideLayout;
use Arpite\Page\Objects\NavigationItem;
use Arpite\Page\Resolvers\LayoutResolver;
use Arpite\Page\Resolvers\NavigationResolver;
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

		$this->app->singleton(NavigationResolver::class, function () {
			return new NavigationResolver([
				NavigationItem::fromPage(DashboardPage::class)->setIcon(
					Icon::HOME
				),
			]);
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
			"resetFormIdentifier" => fn() => Session::get(
				"resetFormIdentifier"
			),
			"csrfToken" => fn() => csrf_token(),
		]);
	}
}
