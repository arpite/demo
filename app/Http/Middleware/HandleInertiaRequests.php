<?php

namespace App\Http\Middleware;

use Domain\Team\Models\User;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
	/** @var string */
	protected $rootView = "app";

	/**
	 * @param  \Illuminate\Http\Request  $request
	 * @return string|null
	 */
	public function version(Request $request)
	{
		return parent::version($request);
	}

	/**
	 * @param  \Illuminate\Http\Request  $request
	 * @return array<mixed>
	 */
	public function share(Request $request)
	{
		/** @var User|null $user */
        $user = auth()->check() ? auth()->user() : null;

        return array_merge(parent::share($request), [
            "user" => $user?->only("email", "name"),
            "balance" => null,
        ]);
	}
}