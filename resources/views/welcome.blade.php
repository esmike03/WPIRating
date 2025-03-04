<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('images/logowestpoint2.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <title>WPI Rating Sheet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100 font-['Open_Sans']">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <!-- Customer Card -->
        <div class="bg-white shadow-lg rounded-2xl p-6 w-64 text-center hover:scale-105 hover:text-green-500 transition-transform cursor-pointer"
            onclick="window.location.href='{{ route('customer.rate') }}'">
            <i class="fa fa-user text-4xl"></i>
            <h2 class="text-xl font-bold ">Customer</h2>
        </div>

        <!-- Agent Card -->
        <div class="bg-white shadow-lg rounded-2xl p-6 w-64 text-center hover:scale-105 hover:text-green-500 transition-transform cursor-pointer"
            onclick="window.location.href='{{ route('agent.rate') }}'">
            <i class="fa fa-user-tie text-4xl"></i>
            <h2 class="text-xl font-bold ">Agent</h2>
        </div>
    </div>
</body>

</html>
