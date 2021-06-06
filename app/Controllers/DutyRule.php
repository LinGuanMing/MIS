<?php

namespace App\Controllers;

class DutyRule extends BaseController
{
	public function index()
	{
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM DUTYRULE";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['title'] = '班別資料維護';
        $data['dutys'] = $results;

        echo view('templates/header', $data);
		echo view('DutyRule/listDutyRule');
        echo view('templates/footer');
	}

    // add user form
	public function create()
    {
        echo view('templates/header');
		echo view('DutyRule/addDutyRule');
        echo view('templates/footer');
    }

    // insert data
    public function store()
    {
        $db = \Config\Database::connect();
        $data = [
            'DutyID' => $this->request->getVar('DutyID'),
            'DutyName'  => $this->request->getVar('DutyName'),
            'RegularOnDutyTime'  => $this->request->getVar('RegularOnDutyTime'),
            'RegularOffDutyTime'  => $this->request->getVar('RegularOffDutyTime')
        ];
        $db->table('DUTYRULE')->insert($data);

        return $this->response->redirect(base_url('/DutyRule'));
    }

    // show single user
    public function singleDutyRule($id = null)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM DUTYRULE WHERE DutyID = '$id'";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['duty_obj'] = $results[0];
        echo view('templates/header', $data);
        echo view('DutyRule/editDutyRule');
        echo view('templates/footer');
    }

    // update user data
    public function update()
    {
        $db = \Config\Database::connect();
        $id = $this->request->getVar('DutyID');
        $data = [
            'DutyName'  => $this->request->getVar('DutyName'),
            'RegularOnDutyTime'  => $this->request->getVar('RegularOnDutyTime'),
            'RegularOffDutyTime'  => $this->request->getVar('RegularOffDutyTime')
        ];
        $db->table('DUTYRULE')->where(['DutyID' => $id])->update($data);
        return $this->response->redirect(base_url('/DutyRule'));
    }
 
    // delete user
    public function delete($id = null)
    {
        $db = \Config\Database::connect();
        $data['duty'] = $db->table('DUTYRULE')->where(['DutyID' => $id])->delete();
        return $this->response->redirect(base_url('/DutyRule'));
    }
}
