<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')：TC-App</title>
</head>
@component('admin.components.header')
<body>
<h1 class="text-3xl font-bold underline">
    Hello world!
</h1>
@yield('body')
</body>
</html>
