<?php

namespace App\Service;

use App\Mail\SalariedMail;
use App\Repository\EmployeeGroupMemberRepository;
use App\Repository\EmployeeRepository;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailService
{
    static function send($param)
    {
//        dd([
//                'メールタイプ' => $param->type,
//                'from' => $param->from,
//                'to' => [$param->toCheckbox, $param->to, $param->toGroup],
//                'cc' => [$param->ccCheckbox, $param->cc, $param->ccGroup],
//                'bcc' => [$param->bccCheckbox, $param->bcc, $param->bccGroup],
//                'date' => [$param->dateCheckbox, $param->date, $param->dateFrom, $param->dateTo,],
//                'time' => [$param->timeFrom, $param->timeTo],
//                '理由' => $param->reason
//            ]
//        );
        $type = $param->type;
        $from = EmployeeRepository::get($param->from);
        $param = [
            'name' => $from->name,
            'from' => $from->email,
            'to' => Self::selectMember($param->toCheckbox, $param->to, $param->toGroup),
            'cc' => Self::selectMember($param->ccCheckbox, $param->cc, $param->ccGroup),
            'bcc' => Self::selectMember($param->bccCheckbox, $param->bcc, $param->bccGroup),
            'date' => Self::makeDate($param->dateCheckbox, $param->date, $param->dateFrom, $param->dateTo),
            'time' => $param->timeFrom . ' 〜 ' . $param->timeTo,
            'reason' => $param->reason
        ];
        if ($type == 3){
            Mail::send(new SalariedMail($param));
        }
        return true;
    }

    private static function selectMember($checkbox, $employees, $group)
    {
        $members = [];

        if (empty($employees) && empty($group)) {
            return $members;
        }

        if ($checkbox) {
            foreach ($group as $employee_group_id){
                $group_employees = EmployeeGroupMemberRepository::getMember($employee_group_id);
                foreach ($group_employees as $id) {
                    $member = EmployeeRepository::get($id);
                    $member = $member->email;
                    $members[] = $member;
                }
            }
        } else {
            foreach ($employees as $employee_id) {
                $member = EmployeeRepository::get($employee_id);
                $member = $member->email;
                $members[] = $member;
            }
        }

        return array_unique($members);
    }

    private static function makeDate($checkbox, $date, $date_from, $date_to)
    {
        if ($checkbox) {
            $date = $date_from . '〜' . $date_to;
        }
        return $date;
    }
}
