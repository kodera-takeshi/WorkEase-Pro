<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>【@yield('title')】WorkEase-Pro</title>
</head>

@yield('header')

<body>
@yield('body')
</body>
<style>
    /* CSSコード */
    .toggle_input {
        position: absolute;
        left: 0;
        top: 0;
        z-index: 5;
        opacity: 0;
        cursor: pointer;
    }

    .toggle_label {
        width: 45px;
        height: 20px;
        background: #ccc;
        position: relative;
        display: inline-block;
        border-radius: 40px;
        transition: 0.4s;
        box-sizing: border-box;
    }

    .toggle_label:after {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        border-radius: 100%;
        left: 0;
        top: 0;
        z-index: 2;
        background: #fff;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        transition: 0.4s;
    }

    .toggle_input:checked + .toggle_label {
        background-color: #4BD865;
    }

    .toggle_input:checked + .toggle_label:after {
        left: 25px;
    }

    .toggle_button {
        position: relative;
        width: 45px;
        height: 20px;
        margin: auto;
    }
</style>
<script>

</script>
</html>
