<x-guest-layout>
    @include('layouts.customNavigation')
    {{-- @if (Route::has('login')) --}}
    {{-- <div class="top-0 left-0 px-6 py-3 flex items-center border-b-2 border-black border-opacity-5 w-full">
        <h4 class=" border-r-2 border-black border-opacity-20 text-blue-600 font-extrabold text-xl pr-6 mr-6">
            {{ __('Final task') }}
    </h4>
    <h3 class="pr-6">
        <form action="{{ route("logs") }}" method="get" class="flex max-w-md mx-auto bg-white rounded-lg">
            @csrf
            <input type="hidden" name="apikey" value="{{ env('MIX_API_KEY') }}">
            <div>
                <button type="submit" class="text-black hover:text-blue-500">
                    {{ __("Logs") }}
                </button>
            </div>
        </form>

    </h3>
    @if (isset($secondLanguage))
    <h3>
        <a href="{{ route("changeLang", ["lang" => $secondLanguage]) }}"
            class="text-black hover:text-blue-600">{{ $secondLanguage }}</a>
    </h3>
    @endif

    </div> --}}
    {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
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
    </div> --}}
    {{-- @endif --}}
    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <h3>
                        {{ __("General use") }}
                    </h3>
                    <!-- <form action="{{ route("execQuery") }}" method="get"
                        class="flex items-center max-w-md mx-auto bg-white rounded-lg"> -->
                    @csrf
                    <!-- <input type="hidden" name="apikey" value="{{ env('MIX_API_KEY') }}"> -->
                    <div class="flex items-center">
                        <div class="w-4/5 border-2 h-32 focus-within:border-lime-400 mr-6">
                            <textarea id="inputCommand" type="text"
                                class="w-full h-full px-4 py-1 text-gray-800 focus:outline-none" rows="10"
                                placeholder="{{ __("Query...") }}" name="query"></textarea>
                        </div>
                        <div>
                            <button id="submitCommand"
                                class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-lg"
                                :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                                :disabled="search.length == 0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- </form> -->
                    <div class="mt-2">
                        <h5>Output: </h5>
                        <div id="outputDiv">

                        </div>
                    </div>
                    {{-- <hr class="mt-6 mb-4"> --}}
                    <!-- <h3>
                        {{ __("For animation (insert only r value [f.e. 0.1])") }}
                    </h3>
                    <form action="{{ route("animationQuery") }}" method="get"
                        class="flex items-center max-w-md mx-auto bg-white rounded-lg">
                        @csrf
                        <input type="hidden" name="apikey" value="{{ env('MIX_API_KEY') }}">
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


                    {{-- <h3>
                        {{ __("Logs page") }}
                    </h3>
                    <form action="{{ route("logs") }}" method="get"
                        class="flex items-center max-w-md mx-auto bg-white rounded-lg">
                        @csrf
                        <input type="hidden" name="apikey" value="{{ env('MIX_API_KEY') }}">
                        <div>
                            <button type="submit"
                                class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-r-lg"
                                :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                                :disabled="search.length == 0">
                                {{ __("Logs") }}
                            </button>
                        </div>
                    </form> --}}



                    {{-- <div class="flex">
                        <h3>
                            {{ __("Instructions page") }}
                    </h3>

                    <form action="{{ route("instructions") }}" method="get"
                        class="flex items-center max-w-md mx-auto bg-white rounded-lg">
                        @csrf
                        <input type="hidden" name="apikey" value="{{ env('MIX_API_KEY') }}">
                        <div>
                            <button type="submit"
                                class="flex items-center bg-blue-500 justify-center h-12 text-white rounded-lg p-4">
                                {{ __("Go to instructions") }}
                            </button>
                        </div>
                    </form>
                </div> --}}
                <hr class="mt-6 mb-4">
                <div id="animationDiv">
                    <div class="flex">
                        <div class="mr-5">
                            <label for="rValue h-10 pr-2">
                                R:
                            </label>
                            <input type="number" value="0.1" max="0.2" min="-0.2" id="rValue"
                                class="w-24 h-10 rounded-lg" step="0.01">
                        </div>
                        <button id="animationButton"
                            class="flex items-center bg-blue-500 justify-center h-10 text-white rounded-lg px-6 py-2">
                            {{ __("Start animation") }}
                        </button>
                    </div>
                    <div class="flex mt-3">
                        <div class="mr-3">
                            <label for="animationCheckbox">{{ __("Animation") }}</label>
                            <input type="checkbox" name="animationCheckbox" id="animationCheckbox">
                        </div>
                        <div>

                            <label for="animationCheckbox">{{ __("Graph") }}</label>
                            <input type="checkbox" name="graphCheckbox" id="graphCheckbox">
                        </div>
                    </div>
                    <div id="simulationAnim" class="mx-12 my-6 border-black border-2 border-solid">
                    </div>
                    <div id="graphContainer">
                        <div id="simulaciaGraf"></div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <script src="{{ asset('js/animation.js') }}" defer></script>
    <script src="{{ asset('js/outputCAS.js') }}" defer></script>
</x-guest-layout>