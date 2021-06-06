<?php

namespace App\Controllers;

class SchedulRule extends BaseController
{
	public function index()
	{
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM SCHEDUL";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['title'] = '班別資料維護';
        $data['scheduls'] = $results;

        echo view('templates/header', $data);
		echo view('SchedulRule/listSchedulRule');
        echo view('templates/footer');
	}

    // add user form
	public function create()
    {
        echo view('templates/header');
		echo view('SchedulRule/addSchedulRule');
        echo view('templates/footer');
    }

    // insert data
    public function store()
    {
        $db = \Config\Database::connect();
        $data = [
            'EmpID' => $this->request->getVar('EmpID'),
            'OrgID'  => $this->request->getVar('OrgID'),
            'DutyID' => $this->request->getVar('DutyID'),
            'From_Time'  => $this->request->getVar('From_Time'),
            'End_Time'  => $this->request->getVar('End_Time')
        ];
        $db->table('SCHEDUL')->insert($data);

        return $this->response->redirect(base_url('/SchedulRule'));
    }

    // show single user
    public function singleSchedulRule($id = null)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM SCHEDUL WHERE EmpID = '$id'";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['schedul_obj'] = $results[0];
        echo view('templates/header', $data);
        echo view('SchedulRule/editSchedulRule');
        echo view('templates/footer');
    }

    // update user data
    public function update()
    {
        $db = \Config\Database::connect();
        $id = $this->request->getVar('EmpID');
        $data = [
            'DutyID'  => $this->request->getVar('DutyID'),
            'OrgID'  => $this->request->getVar('OrgID'),
            'From_Time'  => $this->request->getVar('From_Time'),
            'End_Time'  => $this->request->getVar('End_Time')
        ];
        $db->table('SCHEDUL')->where(['EmpID' => $id])->update($data);
        return $this->response->redirect(base_url('/SchedulRule'));
    }
 
    // delete user
    public function delete($id = null)
    {
        $db = \Config\Database::connect();
        $data['schedul'] = $db->table('SCHEDUL')->where(['EmpID' => $id])->delete();
        return $this->response->redirect(base_url('/SchedulRule'));
    }
}
