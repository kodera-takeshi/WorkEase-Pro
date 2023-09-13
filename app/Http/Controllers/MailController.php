<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        return view('user.mail.index');
    }

    public function send(Request $request)
    {
        // 'メールタイプ' => $request->type,
        // 'from' => $request->from,
        // 'to' => [$request->toCheckbox, $request->to, $request->toGroup],
        // 'cc' => [$request->ccCheckbox, $request->cc, $request->ccGroup],
        // 'bcc' => [$request->bccCheckbox, $request->bcc, $request->bccGroup],
        // 'date' => [$request->dateCheckbox, $request->date, $request->dateFrom, $request->dateTo,],
        // 'time' => [$request->timeFrom, $request->timeTo]
    }
}
