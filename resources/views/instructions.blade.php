<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        @if(!isset($download))
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @endif

    </head>

    <body>

    @if(!isset($download))
        <div class="top-0 left-0 px-6 py-3 flex items-center border-b-2 border-black border-opacity-5 w-full">
            <h4 class=" border-r-2 border-black border-opacity-20 text-blue-600 font-extrabold text-xl pr-6 mr-6">
                <a href="http://localhost">
                    Záverečné zadanie</a>
            </h4>
            <h3 class="pr-6">
                <a href="{{ route("logs") }}" class="text-black hover:text-blue-500">
                    Logy
                </a>
            </h3>

            <h3 class="pr-6">
                <a href="{{ route("instructions") }}" class="text-black hover:text-blue-500">
                    Inštrukcie
                </a>
            </h3>
            @if (isset($secondLanguage) && isset($currentLanguage))
            <h3>

                <a href="{{ route("changeLang", ["lang" => $currentLanguage]) }}"
                    class="text-black hover:text-blue-600 underline text-opacity-50 mr-1">{{ $currentLanguage }}</a>
                /
                <a href="{{ route("changeLang", ["lang" => $secondLanguage]) }}"
                    class="ml-1 text-black hover:text-blue-600">{{ $secondLanguage }}</a>
            </h3>
            @endif
            
        </div>
        @endif


        <div>
            <h4>API enpoints:</h4>
            <ul>
                <li>/octave -> vykoná zadaný príkaz v octave a vráti response</li>
                <li>/octaveAnimation -> vykoná preddefinovaný príkaz pre animáciu a vráti x,y,t ...</li>
                <li>/CSV -> stiahne CSV logov</li>
                <li>/mail -> pošle mail</li>
            </ul>
        </div>

        @if(!isset($download))
        <form action="{{ route("downloadPDF") }}" method="get"
            class="flex items-center max-w-md mx-auto bg-white rounded-lg">
            @csrf
            <div>
                <button type="submit"
                    class="flex items-center bg-blue-500 justify-center w-12 h-12 text-white rounded-r-lg"
                    :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                    :disabled="search.length == 0">
                    {{ __("Download PDF") }}
                </button>
            </div>
        </form>
        @endif



    </body>

</html>