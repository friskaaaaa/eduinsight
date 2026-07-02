<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>EduInsight</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

    @include('layouts.sidebar')

    <div class="ml-64">

        @include('layouts.topbar')

        <main class="p-8">

            @yield('content')

        </main>

    </div>

</body>

</html>