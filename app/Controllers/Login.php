<?php

namespace App\Controllers;

use DateTime;

class Login extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('Login/login');
        echo view('templates/footer');
    }

    public function attend()
    {
        $rules = [
            "EMPID" => "required"
        ];

        if (!$this->validate($rules)) {
            $response = [
                'success' => false,
                'msg' => "員工編號未填寫",
            ];
            return $this->response->setJSON($response);
        } else {
            $db = \Config\Database::connect();
            $data = [
                'DutyID' => '',
                'EmpID' => $this->request->getVar('EMPID'),
                'OrgID' => '',
                'ActualOnDutyTime' => new DateTime(),
            ];
            if ($db->table('DUTY')->insert($data)) {
                $response = [
                    'success' => true,
                    'msg' => "Attend created"
                ];
                return $this->response->setJSON($response);
            } else {
                $response = [
                    'success' => false,
                    'msg' => "資料庫寫入失敗"
                ];

                return $this->response->setJSON($response);
            }
        }
    }
}
