<h3>
    {{ __("Download CSV of logs") }}
</h3>
<form action="{{ route("CSV") }}" method="get"
    class="flex items-center max-w-md mx-auto bg-white rounded-lg">
    @csrf
    <input type="hidden" name="apikey" value="{{ env('API_KEY') }}">
    <div>
        <button type="submit"
            class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-r-lg"
            :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
            :disabled="search.length == 0">
            <!-- <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg> -->
            {{ __("Get CSV") }}
        </button>
    </div>
</form>
<br><br>
<h3>
    {{ __("Send mail with CSV logs") }}
</h3>
<form action="{{ route("mailSend") }}" method="post"
    class="flex items-center max-w-md mx-auto bg-white rounded-lg">
    @csrf
    <input type="hidden" name="apikey" value="{{ env('API_KEY') }}">
    <div>
        <button type="submit"
            class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-r-lg"
            :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
            :disabled="search.length == 0">
            {{ __("Send mail") }}
        </button>
    </div>
</form>



<div>
    @foreach(App\Models\Log::all() as $log)
    <pre>
        {{ $log }}
    </pre>
    <hr />
    @endforeach
</div>