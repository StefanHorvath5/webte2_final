<x-guest-layout>

    @include('layouts.customNavigation')
    <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8 pt-8">
        <div class="flex">
            <h3>
                {{ __("Download CSV of logs") }}
            </h3>
            <form action="{{ route("CSV") }}" method="get"
                class="flex items-center max-w-md mx-auto bg-white rounded-lg">
                @csrf
                <input type="hidden" name="apikey" value="{{ env('MIX_API_KEY') }}">
                <div>
                    <button type="submit"
                        class="flex items-center bg-blue-500 justify-center h-12 text-white rounded-lg p-6">
                        <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg> -->
                        {{ __("Get CSV") }}
                    </button>
                </div>
            </form>
        </div>

        <hr class="my-4">
        <div class="flex">
            <h3>
                {{ __("Send mail with CSV logs") }}
            </h3>
            <form action="{{ route("mailSend") }}" method="post"
                class="flex items-center max-w-md mx-auto bg-white rounded-lg">
                @csrf
                <input type="hidden" name="apikey" value="{{ env('MIX_API_KEY') }}">
                <div>
                    <button type="submit"
                        class="flex items-center bg-blue-500 justify-center h-12 text-white rounded-lg p-6">
                        {{ __("Send mail") }}
                    </button>
                </div>
            </form>
        </div>

        <hr class="my-4">
        <div>{{ __("Logs") }}:</div>
        <div class="max-w-12 overflow-auto">
            @foreach(App\Models\Log::all() as $log)
            <pre>
                {{ $log }}
            </pre>
            <hr />
            @endforeach
        </div>
    </div>
</x-guest-layout>