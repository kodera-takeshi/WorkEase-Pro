@extends('user.authentications.template')

@section('title', 'Sign In')

@section('body')
    <!--
        Base:Tailwind Components 【ContactSections】
        https://tailwindui.com/components/marketing/sections/contact-sections
    -->
    <div class="isolate bg-white px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]"
             aria-hidden="true">
            <div
                class="relative left-1/2 -z-10 aspect-[1155/678] w-[36.125rem] max-w-none -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-40rem)] sm:w-[72.1875rem]"
                style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Let’s Join to My Office</h2>
            <p class="mt-2 text-lg leading-8 text-gray-600">あなたも自分のオフィスに参加しましょう</p>
            <p class="mt-2 text-lg leading-8 text-gray-600">
                オフィスを登録していない方は、
                <a class="text-blue-600 underline decoration-blue-600" href="{{ route('signup') }}">サインアップ</a>
                してください。
            </p>
        </div>
        <input type="number" name="companyCode" id="companyCode">
        <button id="companyCheck">データを取得</button>
        <div id="result"></div>
    </div>

    <script>
        const companyCode = document.getElementById('companyCode'); // 企業コード
        const companyCheckButton = document.getElementById('companyCheck'); // 企業コード認証ボタン
        const resultDiv = document.getElementById('result'); // メッセージ表示区画

        // 企業コード認証ボタンが押下されたときのイベントリスナー。
        companyCheckButton.addEventListener('click', async () => {
            try {
                // 企業コードが入力されていない場合
                if (!companyCode.value) {
                    throw new Error('企業コードを入力してください。');
                }
                // データを取得するAPIのURLを指定
                const apiUrl = '/api/company-check/' + companyCode.value;
                // 非同期通信を行う
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error('サーバーエラー: ' + response.status);
                }
                const data = await response.json();
                if (Array.isArray(data) && data.length === 0) {
                    throw new Error('企業コードと一致する企業がありません。');
                }
                // 取得したデータを表示
                resultDiv.textContent = '取得したデータ: ' + JSON.stringify(data);
            } catch (error) {
                // エラーメッセージを表示
                resultDiv.textContent = error.message;
            }
        });
    </script>
@endsection
