@extends('user.template')

@section('title', 'メール')

@section('header_title', 'メール')

@section('main')
<div class="w-4/6 mx-auto">
    <form action="{{ route('mail.send') }}" method="post">
        @csrf
        <!-- メールタイプ -->
        <div class="flex justify-center items-center">
            <label for="type" class="font-semibold leading-6 text-gray-900 w-1/6">メールタイプ</label>
            <select
                id="type"
                name="type"
                class="block w-5/6 rounded-sm cursor-pointer focus:outline-none"
            >
                <option selected>選択してください</option>
                <option value="1">有給申請</option>
                <option value="2">早出申請</option>
                <option value="3">残業申請</option>
                <option value="4">休日出勤申請</option>
            </select>
        </div>
        <!-- From -->
        <div id="from-form" class="flex justify-center items-center mt-3">
            <label for="from" class="font-semibold leading-6 text-gray-900 w-1/6">From</label>
            <select
                id="from"
                name="from"
                class="block w-5/6 rounded-sm cursor-pointer focus:outline-none"
            >
                <!-- todo:セッションから情報をセット -->
                <option value="1" selected>小寺剛史</option>
            </select>
        </div>
        <!-- To -->
        <div id="to-form" class="flex justify-center items-center mt-3">
            <label for="to" class="font-semibold leading-6 text-gray-900 w-1/6">To</label>
            <div class="flex justify-end w-1/6 pr-2">
                <label for="to-checkbox" class="mr-1">グループを選択</label>
                <input type="checkbox" name="toCheckbox" id="to-checkbox">
            </div>
            <div id="to" class="w-4/6">
                <select
                    id="to-select"
                    name="to[]"
                    multiple
                    class="block w-full rounded-sm cursor-pointer focus:outline-none"
                >
                    <option value="1">山田サトシ</option>
                    <option value="2">鈴木サトル</option>
                    <option value="3">田中サトミ</option>
                    <option value="4">斉藤サトコ</option>
                </select>
            </div>
            <div id="to-group" class="w-4/6" style="display: none;">
                <select
                    id="to-group-select"
                    name="toGroup[]"
                    multiple
                    class="block w-full rounded-sm cursor-pointer focus:outline-none"
                >
                    <option value="1">山田サトシG</option>
                    <option value="2">鈴木サトルG</option>
                    <option value="3">田中サトミG</option>
                    <option value="4">斉藤サトコG</option>
                </select>
            </div>
        </div>
        <!-- Cc -->
        <div id="cc-form" class="flex justify-center items-center mt-3">
            <label for="cc" class="font-semibold leading-6 text-gray-900 w-1/6">Cc</label>
            <div class="flex justify-end w-1/6 pr-2">
                <label for="cc-checkbox" class="mr-1">グループを選択</label>
                <input type="checkbox" name="ccCheckbox" id="cc-checkbox">
            </div>
            <div id="cc" class="w-4/6">
                <select
                    id="cc-select"
                    name="cc[]"
                    multiple
                    class="block w-full rounded-sm cursor-pointer focus:outline-none"
                >
                    <option value="1">山田タケシ</option>
                    <option value="2">鈴木タケル</option>
                    <option value="3">田中タケミ</option>
                    <option value="4">斉藤タケコ</option>
                </select>
            </div>
            <div id="cc-group" class="w-4/6" style="display: none;">
                <select
                    id="cc-group-select"
                    name="ccGroup[]"
                    multiple
                    class="block w-full rounded-sm cursor-pointer focus:outline-none"
                >
                    <option value="1">山田タケシG</option>
                    <option value="2">鈴木タケルG</option>
                    <option value="3">田中タケミG</option>
                    <option value="4">斉藤タケコG</option>
                </select>
            </div>
        </div>
        <!-- Bcc -->
        <div id="bcc-form" class="flex justify-center items-center mt-3">
            <label for="bcc" class="font-semibold leading-6 text-gray-900 w-1/6">Bcc</label>
            <div class="flex justify-end w-1/6 pr-2">
                <label for="bcc-checkbox" class="mr-1">グループを選択</label>
                <input type="checkbox" name="bccCheckbox" id="bcc-checkbox">
            </div>
            <div id="bcc" class="w-4/6">
                <select
                    id="bcc-select"
                    name="bcc[]"
                    multiple
                    class="block w-full rounded-sm cursor-pointer focus:outline-none"
                >
                    <option value="1">山田マサシ</option>
                    <option value="2">鈴木マサル</option>
                    <option value="3">田中マサミ</option>
                    <option value="4">斉藤マサコ</option>
                </select>
            </div>
            <div id="bcc-group" class="w-4/6" style="display: none;">
                <select
                    id="bcc-group-select"
                    name="bccGroup[]"
                    multiple
                    class="block w-full rounded-sm cursor-pointer focus:outline-none"
                >
                    <option value="1">山田マサシG</option>
                    <option value="2">鈴木マサルG</option>
                    <option value="3">田中マサミG</option>
                    <option value="4">斉藤マサコG</option>
                </select>
            </div>
        </div>
        <!-- 日付 -->
        <div id="date-form" class="flex justify-center items-center mt-3">
            <label for="date" class="font-semibold leading-6 text-gray-900 w-1/6">日付</label>
            <div class="flex justify-end w-1/6 pr-2">
                <label for="date-checkbox" class="mr-1">期間で指定</label>
                <input type="checkbox" name="dateCheckbox" id="date-checkbox">
            </div>
            <div id="date" class="flex w-4/6">
                <input type="date" name="date" class="block w-full rounded-sm cursor-pointer focus:outline-none p-1" style="border: 1px solid #d0d0d0; border-radius: 3px;">
            </div>
            <div id="period" class="flex w-4/6 items-center" id="dates" style="display: none;">
                <input
                    type="date"
                    id="date-from"
                    name="dateFrom"
                    class="block w-2/5 rounded-sm cursor-pointer focus:outline-none p-1"
                    style="border: 1px solid #d0d0d0; border-radius: 3px;"
                >
                <label for="date-to" class="font-semibold leading-6 text-gray-900 w-1/5 text-center">〜</label>
                <input
                    type="date"
                    id="date-to"
                    name="dateTo"
                    class="block w-2/5 rounded-sm cursor-pointer focus:outline-none p-1"
                    style="border: 1px solid #d0d0d0; border-radius: 3px;"
                >
            </div>
        </div>
        <!-- 時間 -->
        <div id="time-form" class="flex justify-center items-center mt-3">
            <label for="time-from" class="font-semibold leading-6 text-gray-900 w-1/6">時間</label>
            <input
                type="time"
                id="time-from"
                name="timeFrom"
                class="block w-2/6 rounded-sm cursor-pointer focus:outline-none p-1"
                style="border: 1px solid #d0d0d0; border-radius: 3px;"
            >
            <label for="time-to" class="font-semibold leading-6 text-gray-900 w-1/6 text-center">〜</label>
            <input
                type="time"
                id="time-to"
                name="timeTo"
                class="block w-2/6 rounded-sm cursor-pointer focus:outline-none p-1"
                style="border: 1px solid #d0d0d0; border-radius: 3px;"
            >
        </div>
        <div class="mt-10">
            <button type="submit"
                    class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                送信
            </button>
        </div>
    </form>
</div>
<link
    href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css"
    rel="stylesheet"
/>
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
<script>
    /* DOMの取得 */
    const mailType = document.getElementById('type');
    const fromForm = document.getElementById('from-form');
    const toForm = document.getElementById('to-form');
    const toCheckbox = document.getElementById('to-checkbox');
    const to = document.getElementById('to');
    const toGroup = document.getElementById('to-group');
    const ccForm = document.getElementById('cc-form');
    const ccCheckbox = document.getElementById('cc-checkbox');
    const cc = document.getElementById('cc');
    const ccGroup = document.getElementById('cc-group');
    const bccForm = document.getElementById('bcc-form');
    const bccCheckbox = document.getElementById('bcc-checkbox');
    const bcc = document.getElementById('bcc');
    const bccGroup = document.getElementById('bcc-group');
    const dateForm = document.getElementById('date-form');
    const dateCheckbox = document.getElementById('date-checkbox');
    const date = document.getElementById('date');
    const period = document.getElementById('period');
    const timeForm = document.getElementById('time-form');
    /* select style */
    const settings = {};
    new TomSelect('#type', settings);
    new TomSelect('#from', settings);
    new TomSelect('#to-select', settings);
    new TomSelect('#to-group-select', settings);
    new TomSelect('#cc-select', settings);
    new TomSelect('#cc-group-select', settings);
    new TomSelect('#bcc-select', settings);
    new TomSelect('#bcc-group-select', settings);
    /* toのグループ選択にチェックされたときのイベントリスナー */
    toCheckbox.addEventListener('change', ()=> {
        changeElement(to);
        changeElement(toGroup);
    });
    /* ccのグループ選択にチェックされたときのイベントリスナー */
    ccCheckbox.addEventListener('change', ()=> {
        changeElement(cc);
        changeElement(ccGroup);
    });
    /* bccのグループ選択にチェックされたときのイベントリスナー */
    bccCheckbox.addEventListener('change', ()=> {
        changeElement(bcc);
        changeElement(bccGroup);
    });
    /* 日付の期間指定にチェックされたときのイベントリスナー */
    dateCheckbox.addEventListener('change', ()=> {
        changeElement(date);
        changeElement(period);
    });
</script>
@endsection
