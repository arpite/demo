<?php

namespace App\Http\Middleware;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
	/** @var string */
	protected $rootView = "app";

	/**
	 * @param Request $request
	 * @return string|null
	 */
	public function version(Request $request): ?string
	{
		return parent::version($request);
	}

	/**
	 * @param Request $request
	 * @return array<string, mixed>
	 */
	public function share(Request $request): array
	{
		/** @var User|null $user */
		$user = auth()->check() ? auth()->user() : null;

		return array_merge(parent::share($request), [
			"user" => $user?->only("email", "name"),
			"balance" => null,
		]);
	}
}
