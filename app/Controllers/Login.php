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
                'msg' => "員工編號未填寫"
            ];
            return $this->response->setJSON($response);
        } else {
            $db = \Config\Database::connect();
            $sql = "SELECT E.EmpID, E.EmpName, E.OrgID, S.DutyID, DR.DutyName, 
                        D.ActualOnDutyTime, D.ActualOffDutyTime,
                        DR.RegularOnDutyTime, DR.RegularOffDutyTime
                    FROM EMPLOYEE E
                    LEFT JOIN DUTY D ON D.EmpID = E.EmpID AND D.ActualOffDutyTime IS NULL
                    LEFT JOIN ORGANIZATION O ON O.OrgID = E.OrgID
                    LEFT JOIN SCHEDUL S ON S.EmpID = E.EmpID 
                    LEFT JOIN DUTYRULE DR ON DR.DutyID = S.DutyID
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
            } elseif (empty($results[0]['ActualOnDutyTime'])) {
                $data = [
                    'DutyID' => $results[0]['DutyID'],
                    'EmpID' => $this->request->getVar('EMPID'),
                    'OrgID' => $results[0]['OrgID'],
                    'ActualOnDutyTime' => date('Y-m-d H:i:s', time())
                ];
                if ($db->table('DUTY')->insert($data)) {
                    $_msg = sprintf('%s %s %s <br />簽到成功！<br />簽到時間：%s', 
                        $results[0]['DutyName'],
                        $results[0]['EmpID'], 
                        $results[0]['EmpName'],
                        $data['ActualOnDutyTime']);
                    $response = [
                        'success' => true,
                        'msg' => $_msg
                    ];
                    if (date_format(date_create($data['ActualOnDutyTime']), 'Hi') > 
                        $results[0]['RegularOnDutyTime']) {
                        $response['msg'] += '<br />您已經遲到'
                        .diffHours($data['ActualOnDutyTime'], sprintf('%s %s00', date_format(date_create($data['ActualOnDutyTime']), 'Y-m-d'), $results[0]['RegularOnDutyTime']))
                        .'分鐘';
                    }
                } else {
                    $response = [
                        'success' => false,
                        'msg' => "資料庫寫入失敗"
                    ];
                }
            } elseif (!empty($results[0]['ActualOnDutyTime'])) {
                $data = [
                    'DutyID' => $results[0]['DutyID'],
                    'EmpID' => $this->request->getVar('EMPID'),
                    'OrgID' => $results[0]['OrgID'],
                    'ActualOffDutyTime' => date('Y-m-d H:i:s', time()),
                ];
                if ($db->table('DUTY')->where(['EmpID' => $results[0]['EmpID'],'ActualOnDutyTime' => $results[0]['ActualOnDutyTime']])->update($data)) {
                    $_msg = sprintf('%s %s %s <br />簽退成功！<br />簽到時間：%s<br />簽退時間：%s', 
                        $results[0]['DutyName'],
                        $results[0]['EmpID'], 
                        $results[0]['EmpName'],
                        $results[0]['ActualOnDutyTime'],
                        $data['ActualOffDutyTime']);
                    $response = [
                        'success' => true,
                        'msg' => $_msg
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
        
        function getSeconds($time)
        {
            $seconds = date_format(date_create($time), 'H') * 60 * 60;
            $seconds += date_format(date_create($time), 'i') * 60;
            return $seconds;
        }

        function diffHours($STime, $ETime)
        {
            return (getSeconds($STime) - getSeconds($ETime)) / 60;
        }
    }
}
