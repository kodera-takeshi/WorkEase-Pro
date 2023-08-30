<!--
    todo:キャンセルボタン
    ・処理動作アイコンの追加
 -->
@if($status == '処理中')
<a
    href="#cancel-status_{{ $id }}"
    class="block rounded-lg rounded-full bg-yellow-500 text-white py-2 px-4 w-3/5 my-2 mx-auto mx-auto text-center font-bold"
>
    キャンセル
</a>
@else
    <a
        class="block rounded-lg rounded-full bg-gray-500 text-white py-2 px-4 w-3/5 my-2 mx-auto mx-auto text-center font-bold"
    >
        キャンセル
    </a>
@endif

