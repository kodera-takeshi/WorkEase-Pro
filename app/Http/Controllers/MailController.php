<?php

namespace App\Http\Controllers;

use App\Service\MailService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index()
    {
        return view('user.mail.index');
    }

    public function send(Request $request)
    {
        MailService::send($request);
    }
}
