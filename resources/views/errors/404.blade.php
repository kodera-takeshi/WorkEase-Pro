<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>404 Not Found</title>
</head>
<body>
<!--
-   404 Not Found Page
-   References : https://flowrift.com/c/404/Pa6NX?view=preview
-->
<div class="bg-white py-6 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
        <div class="flex flex-col items-center">
            <!-- logo - start -->
{{--            <a href="/" class="mb-8 inline-flex items-center gap-2.5 text-2xl font-bold text-black md:text-3xl" aria-label="logo">--}}
{{--                <svg width="95" height="94" viewBox="0 0 95 94" class="h-auto w-6 text-indigo-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path d="M96 0V47L48 94H0V47L48 0H96Z" />--}}
{{--                </svg>--}}

{{--                Flowrift--}}
{{--            </a>--}}
            <!-- logo - end -->

            <p class="mb-4 text-sm font-semibold uppercase text-indigo-500 md:text-base">That’s a 404</p>
            <h1 class="mb-2 text-center text-2xl font-bold text-gray-800 md:text-3xl">Page not found</h1>

            <p class="mb-12 max-w-screen-md text-center text-gray-500 md:text-lg">お探しのページが見つかりません。</p>

            <a href="{{ route('home') }}" class="inline-block rounded-lg bg-gray-200 px-8 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-300 focus-visible:ring active:text-gray-700 md:text-base">
                ホームに移動
            </a>
        </div>
    </div>
</div>


</body>
</html>
