<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Научный прогресс</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

@include('partials.header')

<main class="container">
    {{-- сообщения после сохранения/ошибки --}}
    @if (session('success'))
        <p class="flash ok">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p class="flash err">{{ session('error') }}</p>
    @endif

    @yield('content')
</main>

@include('partials.footer')

</body>
</html>
