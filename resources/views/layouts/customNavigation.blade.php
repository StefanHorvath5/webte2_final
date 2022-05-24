<div class="top-0 left-0 px-6 py-3 flex items-center border-b-2 border-black border-opacity-5 w-full">
    <h4 class=" border-r-2 border-black border-opacity-20 text-blue-600 font-extrabold text-xl pr-6 mr-6">
        <a href="{{ route("welcome") }}">
            {{ __('Final task') }}</a>
    </h4>
    <h3 class="pr-6">
        <a href="{{ route("logs") }}" class="text-black hover:text-blue-500">
            {{-- <form action="{{ route("logs") }}" method="get" class="flex max-w-md mx-auto bg-white rounded-lg">
            @csrf
            <input type="hidden" name="apikey" value="{{ env('MIX_API_KEY') }}">
            <div>
                <button type="submit" class="text-black hover:text-blue-500"> --}}
                    {{ __("Logs") }}
                    {{-- </button>
            </div>
        </form> --}}
        </a>
    </h3>

    <h3 class="pr-6">
        <a href="{{ route("instructions") }}" class="text-black hover:text-blue-500">
            {{-- <form action="{{ route("logs") }}" method="get" class="flex max-w-md mx-auto bg-white rounded-lg">
            @csrf
            <input type="hidden" name="apikey" value="{{ env('MIX_API_KEY') }}">
            <div>
                <button type="submit" class="text-black hover:text-blue-500"> --}}
                    {{ __("Instructions") }}
                    {{-- </button>
            </div>
        </form> --}}
        </a>
    </h3>
    <h3 class="pr-6">
        <a href="{{ route("documentation") }}" class="text-black hover:text-blue-500">
            {{ __("Documentation") }}
        </a>
    </h3>
    @if (isset($secondLanguage) && isset($currentLanguage))
    <h3>

        @if($currentLanguage == "SK")
        🇸🇰
        @endif
        @if($currentLanguage == "EN")
        🇬🇧
        @endif
        <a href="{{ route("changeLang", ["lang" => $currentLanguage]) }}"
            class="text-black hover:text-blue-600 underline text-opacity-50 mr-1">{{ $currentLanguage }}</a>
        /
        <a href="{{ route("changeLang", ["lang" => $secondLanguage]) }}"
            class="ml-1 text-black hover:text-blue-600">{{ $secondLanguage }}</a>
        @if($currentLanguage == "EN")
        🇸🇰
        @endif
        @if($currentLanguage == "SK")
        🇬🇧
        @endif
    </h3>
    @endif

</div>