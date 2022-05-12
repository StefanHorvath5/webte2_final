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
                    <form action="{{ route("execQuery") }}" method="get"
                        class="flex items-center max-w-md mx-auto bg-white rounded-lg">
                        @csrf
                        <input type="hidden" name="apikey" value="aaaaaaaaaaaaaaaaaaaaaa">
                        <div class="w-full border-2 h-32 focus-within:border-lime-400">
                            <textarea type="text" class="w-full h-full px-4 py-1 text-gray-800 focus:outline-none"
                                rows="10" placeholder="Query..." name="query"></textarea>
                        </div>
                        <div>
                            <button type="submit"
                                class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-r-lg"
                                :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                                :disabled="search.length == 0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-guest-layout>