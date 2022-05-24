@if(!isset($download))
@include('layouts.customNavigation')
@endif
<!DOCTYPE html>
<html lang="{{App::getLocale() == "en" ? "en" : "sk";}}">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        @if(!isset($download))
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @endif

    </head>

    <body>
        <style>
            .instructions {
                font-family: "DeJaVu Sans Mono", monospace;
                margin: auto;
            }

            .endpoint {
                margin-left: 10px;
                font-size: 18px;
                font-weight: bold;
                font-style: italic;
            }

            .params {
                font-weight: bold;
            }

            .descOfEndpoint {
                font-size: 16px;
                margin-left: 10px;
            }

            .post {
                color: lightgreen;
                background-color: rgba(0, 0, 0, 0.685);
            }

            .get {
                color: plum;
                background-color: rgba(0, 0, 0, 0.685);
            }

            .post,
            .get {
                padding: 3px;
                border-radius: 5px;
            }

            ul {
                width: 100%;
                list-style-type: none;
            }

            li {
                margin: 5px;
            }

        </style>


        <div class="instructions" style="width: 75%;padding: 8px;">
            <h2 style="font-size: 24;">{{ __("Instructions") }}</h2>
            <p>{{ __("The webpage allows the users to work with Octave. Inputting Octave commands into the") }}
                <b>{{ __("General use") }}</b>
                {{ __("textbox, allows the user to run standard Octave commands, returning the program's output") }}.
            </p>
            <br>
            <p>{{ __("Clicking on") }} <b>{{ __("Start animation") }}</b>
                {{ __("starts a predefined Octave program, and its' output is shown as an animation. The output is also graphed below") }}.
            </p>
            <br>
            <p>{{ __("On the Logs page the user can view program logs, download them in CSV format, or send them via e-mail") }}.
            </p>
            <br>
            <h4 style="font-size: 16px; font-weight: bold;">
                {{ __("The following endpoints of our Octave API are available for developers") }}:
            </h4>
            <ul>
                <li>
                    <span class="post">POST:</span>&nbsp;
                    <span class="endpoint">/octave</span>
                    <span class="descOfEndpoint">-> {{ __("executes an Octave command returning its' output") }}</span>
                    <span class="params">Body:</span>
                    <span>{{ __("apikey(url param or in body), query") }}</span>
                </li>
                <hr>
                <li>
                    <span class="get">GET: </span>&nbsp;
                    <span class="endpoint">/octaveanimation</span>
                    <span class="descOfEndpoint">->
                        {{ __("runs the predefined Octave animation program, returning the x,y,t values") }}</span>

                    <span class="params">Url params: </span>
                    <span>{{ __("apikey, rValue(optional and between -0.2 and 0.2)") }}</span>
                </li>
                <hr>
                <li>
                    <span class="get">GET: </span>&nbsp;
                    <span class="endpoint">/csv</span>
                    <span class="descOfEndpoint">-> {{ __("downloads the logs in CSV format") }}</span>
                </li>
                <hr>
                <li>
                    <span class="post">POST:</span>&nbsp;
                    <span class="endpoint">/mail</span>
                    <span class="descOfEndpoint">-> {{ __("sends the logs to a preconfigured e-mail adress.") }}</span>
                </li>
            </ul>
        </div>


        @if(!isset($download))
        <form action="{{ route("downloadPDF") }}" method="get"
            class="flex items-center max-w-fit mx-auto bg-white rounded-lg">
            @csrf
            <button type="submit" class="flex items-center bg-blue-500 justify-center h-12 text-white rounded-lg p-6">
                {{ __("Download PDF") }}
            </button>
        </form>
        @endif


    </body>

</html>