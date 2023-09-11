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
        <!-- 企業コードチェック　-->
        <div class="mx-auto mt-16 max-w-xl sm:mt-20" id="companyForm">
            <div class="sm:col-span-2">
                <label for="companyCode" class="block text-sm font-semibold leading-6 text-gray-900">企業コード</label>
                <input
                    type="number"
                    name="companyCode"
                    id="companyCode"
                    placeholder="企業コードを入力してください"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                >
                <div id="result" style="color: red;"></div>
            </div>
            <div class="mt-10">
                <button
                    id="companyCheck"
                    class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                >
                    次へ
                </button>
            </div>
        </div>
        <!-- Joinフォーム　-->
        <form id="joinForm" action="{{ route('join.create') }}" method="post" class="mx-auto mt-16 max-w-xl sm:mt-20" style="display: none;">
            @csrf
            <div class="sm:col-span-2">
                <label for="companyCode" class="block text-sm font-semibold leading-6 text-gray-900">企業コード</label>
                <input
                    type="number"
                    name="company"
                    id="company"
                    class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                    readonly
                >
                <div id="result" style="color: red;"></div>
            </div>
            <div class="sm:col-span-2 mt-2.5">
                <label for="name" class="block text-sm font-semibold leading-6 text-gray-900">名前</label>
                <div>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        required
                    >
                </div>
            </div>
            <div class="sm:col-span-2 mt-2.5">
                <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">メールアドレス</label>
                <div>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        required
                    >
                </div>
            </div>
            <div class="sm:col-span-2 mt-2.5">
                <label for="password" class="block text-sm font-semibold leading-6 text-gray-900">パスワード</label>
                <div>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        autocomplete="password"
                        placeholder="半角英数字の8文字以上で入力してください"
                        class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                        required
                    >
                </div>
            </div>
            <div class="mt-10">
                <button type="submit"
                        class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Join
                </button>
            </div>
        </form>
    </div>

    <script>
        /* DOMの取得 */
        const companyForm = document.getElementById('companyForm'); // 企業コードフォーム
        const companyCode = document.getElementById('companyCode'); // 企業コード
        const companyCheckButton = document.getElementById('companyCheck'); // 企業コード認証ボタン
        const resultDiv = document.getElementById('result'); // メッセージ表示区画
        const joinForm = document.getElementById('joinForm'); // メッセージ表示区画
        const companyInput = document.getElementById('company'); // メッセージ表示区画
        /* 表示・非表示の切り替え */
        let changeElement = (el)=> {
            if(el.style.display==''){
                el.style.display='none';
            }else{
                el.style.display='';
            }
        }
        /* 企業コード認証ボタンが押下されたときのイベントリスナー */
        companyCheckButton.addEventListener('click', async () => {
            try {
                // 企業コードが入力されていない場合
                if (!companyCode.value) {
                    throw new Error('企業コードを入力してください。');
                }
                // データを取得するAPIのURLを指定
                const apiUrl = '/api/company-check/' + companyCode.value;
                // 非同期通信を行う
                const response = await fetch(apiUrl)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('サーバーエラー: ' + response.status);
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data == undefined) {
                            throw new Error('データが見当たりませんでした。');
                        }
                        return data;
                    })
                    .catch(error => {
                        return [];
                    });
                // エラー表示
                if (Array.isArray(response) && response.length === 0) {
                    throw new Error('一致する企業が存在しません');
                }
                // 企業コードチェックを非表示
                changeElement(companyForm);
                // joinフォームを表示
                changeElement(joinForm);
                // 企業コードのフォームに値をセット
                companyInput.value = response.company_code;
            } catch (error) {
                // エラーメッセージを表示
                resultDiv.textContent = error.message;
            }
        });
    </script>
@endsection
