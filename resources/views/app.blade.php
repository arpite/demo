<!DOCTYPE html>
<html
	lang="{{ str_replace('_', '-', app()->getLocale()) }}"
	class="overflow-y-scroll"
>
	<head>
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"
		/>
		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="{{ asset('fonts/inter/inter.css') }}" />

		<link rel="stylesheet" href="/vendor/arpite/arpite.css" />
		<script src="/vendor/arpite/arpite.js" defer></script>

		<style>
			:root {
				--arpite-primary-50: 239 246 255;
				--arpite-primary-100: 219 234 254;
				--arpite-primary-200: 191 219 254;
				--arpite-primary-300: 147 197 253;
				--arpite-primary-400: 96 165 250;
				--arpite-primary-500: 59 130 246;
				--arpite-primary-600: 37 99 235;
				--arpite-primary-700: 29 78 216;
				--arpite-primary-800: 30 64 175;
				--arpite-primary-900: 30 58 138;
			}
		</style>
	</head>
	<body class="font-base antialiased">
		@inertia

		<script>
			/**
			 * Prefill demo login details for demo purposes.
			 */
			if (window.location.pathname === '/auth/login') {
				const setFieldValue = (name, value) => {
					const input = document.querySelector('input[name="' + name + '"]');
					const nativeInputValueSetter = Object.getOwnPropertyDescriptor(window.HTMLInputElement.prototype, "value").set;
					nativeInputValueSetter.call(input, value);
					input.dispatchEvent(new Event('change', { bubbles: true }));
				}

				window.addEventListener('load', () => {
					setFieldValue('email', 'demo@example.com');
					setFieldValue('password', 'demo');
				});
			}
		</script>
	</body>
</html>