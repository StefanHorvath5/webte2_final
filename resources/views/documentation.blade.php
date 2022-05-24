<x-guest-layout>
    @include('layouts.customNavigation')

    <div class="py-8">
        <div class="max-w-screen-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">


                    <h3 class="font-bold text-xl mb-4">{{ __("Documentation") }}</h3>

                    <div class="mb-4">
                        <h5 class="mb-2 font-semibold text-lg">
                            {{ __("Frontend of the application") }}:
                        </h5>
                        <div class="ml-6">
                            <ul>
                                <li class="text-blue-800 hover:text-blue-500">
                                    <a href="{{ route("welcome") }}">{{ route("welcome") }} - {{ __("Main page") }}</a>
                                </li>
                                <li class="text-blue-800 hover:text-blue-500">
                                    <a href="{{ route("downloadPDF") }}">{{ route("downloadPDF") }} -
                                        {{ __("PDF with instructions for api usage") }}</a>
                                </li>
                                <li class="text-blue-800 hover:text-blue-500">
                                    <a href="{{ route("instructions") }}">{{ route("instructions") }} -
                                        {{ __("Instructions for api usage") }}</a>
                                </li>
                                <li class="text-blue-800 hover:text-blue-500">
                                    <a href="{{ route("documentation") }}">{{ route("documentation") }} -
                                        {{ __("Documentation page") }}</a>
                                </li>
                                <li class="text-blue-800 hover:text-blue-500">
                                    <a href="{{ route("logs") }}">{{ route("logs") }} -
                                        {{ __("View, download and send email of logs") }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h5 class="mb-2 font-semibold text-lg">
                            {{ __("Backend of the application (API urls)") }}:
                        </h5>
                        <div class="ml-6">
                            <ul>
                                <li>
                                    POST:<p class="text-red-800 inline">
                                        {{ route("execQuery") }} -
                                    </p>
                                    {{ __("Exec given query in octave cli - requires: apikey, query") }}
                                </li>
                                <li>
                                    GET:<p class="text-red-800 inline">
                                        {{ route("animationQuery") }} -
                                    </p>
                                    {{ __("Exec predefined query in octave cli - requires: apikey, rValue(optional)") }}
                                </li>
                                <li>
                                    GET:<p class="text-red-800 inline">
                                        {{ route("CSV") }} -
                                    </p>
                                    {{ __("Download CSV of logs - requires: apikey") }}
                                </li>
                                <li>
                                    POST:<p class="text-red-800 inline">
                                        {{ route("mailSend") }} -
                                    </p>
                                    {{ __("Send mail of logs to predefined email address - requires: apikey") }}
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5 class="mb-2 font-semibold text-lg">
                            {{ __("Tasks distribution") }}:
                        </h5>
                        <div class="ml-6">
                            <ul>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("Bilingualism") }} -
                                    </p>
                                    Štefan Horváth
                                </li>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("API for CAS secured by API key") }} -
                                    </p>
                                    Adam Juriš, Štefan Horváth
                                </li>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("Animation") }} -
                                    </p>
                                    Peter Bogár
                                </li>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("Graph synchronized with animation") }} -
                                    </p>
                                    Peter Bogár, Adam Juriš, Štefan Horváth
                                </li>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("Api verification using form - specified in task 5") }} -
                                    </p>
                                    Štefan Horváth, Adam Juriš
                                </li>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("Logs and export CSV + sending of emails") }} -
                                    </p>
                                    Adam Juriš
                                </li>


                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("export API description to PDF") }} -
                                    </p>
                                    Adam Juriš, Ľubomír Hoffman, Štefan Horváth
                                </li>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("Synchronized tracking of experiments") }} -
                                    </p>
                                    <p class="text-red-500 inline italic">
                                        {{ __("Not finished") }}
                                    </p>
                                </li>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("Docker") }} -
                                    </p>
                                    Štefan Horváth
                                </li>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("Git usage") }} -
                                    </p>
                                    Štefan Horváth, Adam Juriš, Peter Bogár, Ľubomír Hoffman
                                </li>
                                <li>
                                    <p class="text-purple-900 inline">
                                        {{ __("Finalization of the application") }} -
                                    </p>
                                    Štefan Horváth, Adam Juriš, Peter Bogár, Ľubomír Hoffman
                                </li>


                            </ul>
                        </div>
                    </div>




                </div>

            </div>

        </div>


</x-guest-layout>