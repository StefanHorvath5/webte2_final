<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <h1>Hi</h1>

    instructions here

    <h3>bye for now</h3>

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