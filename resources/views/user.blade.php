<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href={{ URL::asset('app.css') }} type="text/css">
</head>

<body class="antialiased">
    <div>
        <h2>{{ $user->name }}</h2>
        <p><b>Username:</b>{{ $user->username }}</p>
        <p><b>Email:</b> {{ $user->email }}</p>
        <p><b>Full Address:</b> {{ $user->streetFull }}</p>
    </div>
</body>

</html>
