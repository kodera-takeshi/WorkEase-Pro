<?php

namespace App\Service;

class EmployeeService
{
    static function signupEmployeeRecord($name, $email, $password, $company_id, $office_id)
    {
        return [
            'name' => $name,
            'email' => $email,
            'password' => PasswordService::hash($password),
            'birthday' => null,
            'company_id' => $company_id,
            'office_id' => $office_id,
            'managerial_position_id' => null,
            'employee_status_id' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
            'del_flg' => false
        ];
    }

    static function session($request, $employee)
    {
        $session_param = [
            'id' => $employee->id,
            'name' => $employee->name,
            'email' => $employee->email,
            'birthday' => $employee->birthday,
            'company_id' => $employee->company_id,
            'office_id' => $employee->office_id,
            'managerial_position_id' => $employee->managerial_position_id,
            'employee_status_id' => $employee->employee_status_id,
        ];
        $request->session()->put('user', $session_param);
    }
}
