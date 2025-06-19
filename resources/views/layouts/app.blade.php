<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techart.Web</title>
    <link rel="stylesheet" href="/assets/css/reset.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/main.css">

    <link rel="stylesheet" href="{{ app('tao.frontend')->assets()->cssUrl('index') }}">
    <script src="{{ app('tao.frontend')->assets()->jsUrl('index') }}"></script>

</head>

<body>
    <div class="page">
        <h1 class="visually-hidden">Галактический вестник</h1>
        <?
        echo app('tao.frontend')->templates()->renderBlock(
            'common/header',
            [
                'text' => 'Галактический вестник',
            ]
        ); ?>
        <main class="main">
            @yield('content')
        </main>
         <?
        echo app('tao.frontend')->templates()->renderBlock(
            'common/footer',
            [
                'text' => '© 2023 — 2412 «Галактический вестник»'
            ]
        ); ?>
    </div>
</body>

</html>