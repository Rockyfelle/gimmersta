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
    <table>
        <tr>
            <th>Namn</th>
            <th>Användarnamn</th>
            <th>Mejl</th>
            <th>Gata</th>
            <th>Öppna</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['username'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['street'] }}</td>
                <td>
                    <button onClick="load({{ $user['id'] }})" class="border border-primary" id={{ $user['id'] }}>
                        Läs mer
                    </button>
                </td>
            <tr>
        @endforeach
    </table>
    <div id="user">
        <i>Please select a user to view</i>
    </div>
</body>

<script>
    function load(id) {
        window.location.href = '/user/' + id;
    }
</script>
@if (request()->get('id'))
    <script>
        load({{ request()->get('id') }});
    </script>
@endif

</html>
