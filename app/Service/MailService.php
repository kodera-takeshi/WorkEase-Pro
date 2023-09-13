<?php

namespace App\Service;

use App\Repository\EmployeeGroupMemberRepository;
use App\Repository\EmployeeRepository;
use Illuminate\Support\Facades\Mail;

class MailService
{
    static function send($param)
    {
        // 'メールタイプ' => $param->type,
        // 'from' => $param->from,
        // 'to' => [$param->toCheckbox, $param->to, $param->toGroup],
        // 'cc' => [$param->ccCheckbox, $param->cc, $param->ccGroup],
        // 'bcc' => [$param->bccCheckbox, $param->bcc, $param->bccGroup],
        // 'date' => [$param->dateCheckbox, $param->date, $param->dateFrom, $param->dateTo,],
        // 'time' => [$param->timeFrom, $param->timeTo]
        $from = EmployeeRepository::get($param->from);
        $from = $from->email;
        $to = Self::selectMember($param->toCheckbox, $param->to, $param->toGroup);
        $cc = Self::selectMember($param->ccCheckbox, $param->cc, $param->ccGroup);
        $bcc = Self::selectMember($param->bccCheckbox, $param->bcc, $param->bccGroup);

        Mail::from()->to
    }

    private function selectMember($checkbox, $employees, $group)
    {
        $members = [];
        if ($checkbox) {
            foreach ($employees as $id) {
                $member = EmployeeRepository::get($id);
                $member = $member->email;
                $members[] = $member;
            }
        } else {
            foreach ($group as $employee_group_id){
                $group_employees = EmployeeGroupMemberRepository::getMember($employee_group_id);
                foreach ($group_employees as $id) {
                    $member = EmployeeRepository::get($id);
                    $member = $member->email;
                    $members[] = $member;
                }
            }
        }

        return array_unique($members);
    }
}
