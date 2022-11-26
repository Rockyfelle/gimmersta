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
    @php
        use GuzzleHttp\Client;
        // Download Raw Products
        $client = new Client();
        $res = $client->get('http://jsonplaceholder.typicode.com/users');
        $users = json_decode($res->getBody(), 2);
        
    @endphp
    <table>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Street</th>
        </tr>
        @foreach ($users as $user)
            <tr onClick="load({{ $user['id'] }})" class="border border-primary" id={{ $user['id'] }}>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['username'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['address']['street'] }}</td>
            <tr>
        @endforeach
    </table>
    <div id="user">
        <i>Please select a user to view</i>
    </div>
</body>

<script>
    function load(id) {
        const users = {!! json_encode($users) !!};
        const user = users.find(x => x.id === id);
        document.getElementById("user").innerHTML = `
		<div>
			<h2>${user.name}</h2>
			<p><b>Username:</b> ${user.username}</p>
			<p><b>Email:</b> ${user.email}</p>
			<p><b>Full Address:</b> ${user.address.street}, ${user.address.suite}, ${user.address.city}, ${user.address.zipcode}</p>
		</div>`;
        window.history.pushState(user.name, 'Title', '/?id=' + id);
    }
</script>
@if (request()->get('id'))
    <script>
        load({{ request()->get('id') }});
    </script>
@endif

</html>
