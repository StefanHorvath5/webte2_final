<x-guest-layout>
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @if (isset($secondLanguage))
        <a href="{{ route("changeLang", ["lang" => $secondLanguage]) }}"
            class="text-sm text-gray-700 dark:text-gray-500 underline">{{ $secondLanguage }}</a>

        @endif
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
                    <h3>
                        {{ __("General use") }}
                    </h3>
                    <!-- <form action="{{ route("execQuery") }}" method="get"
                        class="flex items-center max-w-md mx-auto bg-white rounded-lg"> -->
                        @csrf
                        <!-- <input type="hidden" name="apikey" value="{{ env('API_KEY') }}"> -->
                        <div class="w-full border-2 h-32 focus-within:border-lime-400">
                            <textarea 
                                id="inputCommand"
                                type="text" class="w-full h-full px-4 py-1 text-gray-800 focus:outline-none"
                                rows="10" placeholder="{{ __("Query...") }}" name="query"></textarea>
                        </div>
                        <div>
                            <button
                                id="submitCommand"
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
                    <!-- </form> -->
                    <div id="outputDiv">

                    </div>
                    <!-- <h3>
                        {{ __("For animation (insert only r value [f.e. 0.1])") }}
                    </h3>
                    <form action="{{ route("animationQuery") }}" method="get"
                        class="flex items-center max-w-md mx-auto bg-white rounded-lg">
                        @csrf
                        <input type="hidden" name="apikey" value="{{ env('API_KEY') }}">
                        <div class="w-full border-2 h-32 focus-within:border-lime-400">
                            <textarea type="text" class="w-full h-full px-4 py-1 text-gray-800 focus:outline-none"
                                rows="1" placeholder="{{ __("r value...") }}" name="query"></textarea>
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
                    <br><br> -->


                    <h3>
                        {{ __("Logs page") }}
                    </h3>
                    <form action="{{ route("logs") }}" method="get"
                        class="flex items-center max-w-md mx-auto bg-white rounded-lg">
                        @csrf
                        <input type="hidden" name="apikey" value="{{ env('API_KEY') }}">
                        <div>
                            <button type="submit"
                                class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-r-lg"
                                :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                                :disabled="search.length == 0">
                                {{ __("Logs") }}
                            </button>
                        </div>
                    </form>


                   
                    <h3>
                        {{ __("Instructions page") }}
                    </h3>

                    <form action="{{ route("instructions") }}" method="get"
                        class="flex items-center max-w-md mx-auto bg-white rounded-lg">
                        @csrf
                        <input type="hidden" name="apikey" value="{{ env('API_KEY') }}">
                        <div>
                            <button type="submit"
                                class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-r-lg"
                                :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                                :disabled="search.length == 0">
                                {{ __("Go to instructions") }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    <div id="animationDiv">
        <button id="animationButton">
            spusti animaciu
        </button>
        <div id="simulationAnim" style="border: black 1px solid; margin-left: 79px"></div>
        <div id="simulaciaGraf"></div>
    </div>
</x-guest-layout>