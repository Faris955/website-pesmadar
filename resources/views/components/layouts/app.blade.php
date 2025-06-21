<!DOCTYPE html>
<html lang="en" theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesmadar Form Daftar</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @filamentStyles
</head>

<body class="bg-gray-100">

    <!-- Konten halaman akan disisipkan di sini -->
    {{ $slot }}

    @livewireScripts
    @filamentScripts
</body>

</html>
