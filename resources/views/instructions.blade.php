@if(!isset($download))
@include('layouts.customNavigation')
@endif
<!DOCTYPE html>
<html lang="sk">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @if(!isset($download))
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&amp;display=swap"> -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif

</head>

<body>

    <!-- @if(!isset($download))
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
        @endif -->

        <style> .instructions{ font-family:"DeJaVu Sans Mono",monospace; }</style>


    <div class="instructions" style="width: 75%;padding: 8px;">
        <h2 style="font-size: 24;">Inštrukcie</h2>
        <p>Stránka umožňuje pracovať s Octave programom. Je možné zadať do textového poľa <b>Všeobecné používanie</b> vstup, ktorý by ste normálne zadali do Octave. To vám vráti výstup programu.</p>
        <br>
        <p>Ďalej kliknutím na tlačítko <b>Spustiť animáciu</b> sa spustí preddefinovaný Octave príklad a jeho výstup sa zobrazí nižšie ako animácia. Pod animáciou je aj graf výstupu.</p>
        <br>
        <p>Na podstránke logy je možné si stiahnuť logy vo formáte CSV, poprípade ich poslať na preddefinovaný email. Alebo je možné si ich pozrieť priamo na stránke.</p>
        <br>
        <h4 style="font-size: 16px; font-weight: bold;">Pre developerov tu sú endpointy nášho Octave API:</h4>
        <ul>
            <li>/octave -> vykoná zadaný príkaz v octave a vráti výstupné dáta</li>
            <li>/octaveanimation -> vykoná preddefinovaný príkaz pre animáciu a vráti x,y,t</li>
            <li>/csv -> stiahnutie logov v CSV formáte</li>
            <li>/mail -> pošle mail s logmi na nakonfigurovaný email</li>
        </ul>
    </div>

    @if(!isset($download))
    <form action="{{ route("downloadPDF") }}" method="get" class="flex items-center max-w-md mx-auto bg-white rounded-lg">
        @csrf
        <div>
        <button type="submit" class="flex items-center bg-blue-500 justify-center h-12 text-white rounded-lg p-6">
                {{ __("Download PDF") }}
            </button>

            <!-- <button type="submit" class="flex items-center bg-blue-500 justify-center h-12 text-white rounded-lg p-6">
                        {{ __("Send mail") }}
                    </button> -->
        </div>
    </form>
    @endif



</body>

</html>