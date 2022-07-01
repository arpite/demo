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
        <link rel="stylesheet" href="{{ asset("/vendor/arpite/arpite.css") }}" />
    </head>
    <body class="font-sans antialiased">
        @inertia
        <script src="{{ asset("/vendor/arpite/arpite.js") }}"></script>
        <script>
            // Prefill login details for demo purposes
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
