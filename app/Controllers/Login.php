<?php

namespace App\Controllers;

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
            $sql = "SELECT E.EmpID, E.EmpName, E.OrgID, S.DutyID  
                    FROM EMPLOYEE E
                    LEFT JOIN ORGANIZATION O ON E.OrgID = O.OrgID
                    LEFT JOIN SCHEDUL S ON S.EmpID = E.EmpID 
                    WHERE E.EMPID = :EMPID:";
            $query = $db->query($sql, ['EMPID' => $this->request->getVar('EMPID')]);
            $results = $query->getResultArray();
            if (count($results) == 0) {
                $response = [
                    'success' => false,
                    'msg' => "查無員工編號"
                ];
            } elseif (empty($results[0]['OrgID'])) {
                $response = [
                    'success' => false,
                    'msg' => "查無員工歸屬部門"
                ];
            } elseif (empty($results[0]['DutyID'])) {
                $response = [
                    'success' => false,
                    'msg' => "員工尚未設定班別"
                ];
            } else {

                $data = [
                    'DutyID' => 'A',
                    'EmpID' => $this->request->getVar('EMPID'),
                    'OrgID' => $results[0]['OrgID'],
                    'ActualOnDutyTime' => date('Y-m-d H:i:s', time()),
                ];
                if ($db->table('DUTY')->insert($data)) {
                    $response = [
                        'success' => true,
                        'msg' => "Attend created"
                    ];
                } else {
                    $response = [
                        'success' => false,
                        'msg' => "資料庫寫入失敗"
                    ];
                }
            }
            return $this->response->setJSON($response);
        }
    }
}
