<x-guest-layout>
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
        <a href="{{ url('/dashboard') }}"
            class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Dashboard') }}</a>
        @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Log in') }}</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}"
            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ __('Register') }}</a>
        @endif
        @endauth
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h4>
                        {{ __('Welcome') }} - {{ __('Final task') }}
                    </h4>
                </div>
            </div>
        </div>
</x-guest-layout>