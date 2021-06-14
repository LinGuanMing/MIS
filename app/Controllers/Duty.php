<?php

namespace App\Controllers;

class Duty extends BaseController
{
	public function index()
	{
        $db = \Config\Database::connect();
        $sql = "SELECT D.*, R.DutyName, E.EmpName, O.OrgName
                FROM DUTY D
                LEFT JOIN DUTYRULE R ON R.DutyID = D.DutyID
                LEFT JOIN EMPLOYEE E ON E.EmpID = D.EmpID
                LEFT JOIN ORGANIZATION O ON O.OrgID = D.OrgID";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['title'] = '員工出勤資料';
        $data['dutys'] = $results;

        echo view('templates/header', $data);
		echo view('Duty/listDuty');
        echo view('templates/footer');
	}

    // add user form
	public function create()
    {
        echo view('templates/header');
		echo view('Duty/addDuty');
        echo view('templates/footer');
    }

    // insert data
    public function store()
    {
        $db = \Config\Database::connect();
        $data = [
            'DutyID' => $this->request->getVar('DutyID'),
            'EmpID'  => $this->request->getVar('EmpID'),
            'OrgID'  => $this->request->getVar('OrgID'),
            'ActualOnDutyTime'  => $this->request->getVar('ActualOnDutyTime'),
            'ActualOffDutyTime'  => $this->request->getVar('ActualOffDutyTime')
        ];
        if ($this->request->getVar('OrgID') != '')
        {
            $data['OrgID'] = $this->request->getVar('OrgID');
        }
        else
        {
            $data['OrgID'] = NULL;
        }
        $db->table('DUTY')->insert($data);

        return $this->response->redirect(base_url('/Duty'));
    }

    // show single user
    public function singleDuty($id = null)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM DUTY D
                LEFT JOIN DUTYRULE R ON R.DutyID = D.DutyID
                LEFT JOIN EMPLOYEE E ON E.EmpID = D.EmpID
                LEFT JOIN ORGANIZATION O ON O.OrgID = D.OrgID
                WHERE D.EmpID = $id AND D.ActualOnDutyTime";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['duty_obj'] = $results[0];
        echo view('templates/header', $data);
        echo view('Duty/editDuty');
        echo view('templates/footer');
    }

    // update user data
    public function update()
    {
        $db = \Config\Database::connect();
        $id = $this->request->getVar('EmpID');
        $sdate = $this->request->getVar('ActualOnDutyTime');
        $data = [
            'DutyID' => $this->request->getVar('DutyID'),
            'OrgID'  => $this->request->getVar('OrgID'),
            'ActualOnDutyTime'  => $this->request->getVar('ActualOnDutyTime'),
            'ActualOffDutyTime'  => $this->request->getVar('ActualOffDutyTime')
        ];
        if ($this->request->getVar('OrgID') != '')
        {
            $data['OrgID'] = $this->request->getVar('OrgID');
        }
        else
        {
            $data['OrgID'] = NULL;
        }
        $db->table('DUTY')->where(['EmpID' => $id, 'ActualOnDutyTime' => $sdate])->update($data);
        return $this->response->redirect(base_url('/Duty'));
    }
 
    // delete user
    public function delete($id, $sdate)
    {
        $db = \Config\Database::connect();
        $data['duty'] = $db->table('DUTY')->where(['EmpID' => $id, 'ActualOnDutyTime' => $sdate])->delete();
        return $this->response->redirect(base_url('/Duty'));
    }
}