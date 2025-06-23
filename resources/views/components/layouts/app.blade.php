<!DOCTYPE html>
<html lang="en" theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persmadar Form Daftar</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @livewireStyles

</head>

<body class="bg-gray-100">

    <!-- Konten halaman akan disisipkan di sini -->
    {{ $slot }}

    @livewireScripts

</body>

</html>
