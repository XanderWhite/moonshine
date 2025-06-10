<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techart.Web</title>
   <link rel="stylesheet" href="/assets/css/reset.css">
   <link rel="stylesheet" href="/assets/css/fonts.css">
   <link rel="stylesheet" href="/assets/css/main.css">

</head>
<body>
    <div class="page">
        <h1 class="visually-hidden">Галактический вестник</h1>
        @include('partials.header')
        <main class="main">
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
</body>
</html>