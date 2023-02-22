<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pix Planeta') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
    
            <div class="flex justify-center">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>
            <section class="">
            <div class="h-3/4 w-max flex flex-auto">
            <div class="flex-1">Zona 01</div>
            
            </div>
        </section>
       
       
    
</body>
</html>