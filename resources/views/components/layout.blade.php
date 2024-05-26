<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="">
        <x-nav>
            <div class="flex-shrink-0">
                <a href="/" class="text-md">Beauty Salon Platform</a>
            </div>
            <div class="space-x-5">
                <a href="/" class="">Home</a>
                <a href="/about" class="">About</a>
                <a href="/services" class="">Services</a>
                <a href="/contact" class="">Contact</a>
            </div>
            <div class="space-x-4">
                <a href="/login" class="">Login</a>
                <a href="/register" class="">Register</a>
            </div>
        </x-nav>
        <div class="diagonal-bg flex items-center justify-center min-h-screen">
            <div class="text-center">
                <h1 class="text-4xl font-bold">Le Beauté Just For You</h1>
                <p class="mt-4">Scroll down for some magic.</p>
            </div>
            <img src="{{asset('imgs/model.jpg')}}" alt="" class="model rounded-xl">
        </div>
    </body>
</html>
