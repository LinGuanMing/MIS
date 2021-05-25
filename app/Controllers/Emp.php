<?php

namespace App\Controllers;

use App\Models\EmpModel;

class Emp extends BaseController
{
	public function index()
	{
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM EMPLOYEE E
                LEFT JOIN ORGANIZATION O ON E.OrgID = O.OrgID";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['title'] = '員工基本資料';
        $data['emps'] = $results;

        echo view('templates/header', $data);
		echo view('Employee/listEmp');
        echo view('templates/footer');
	}

    // add user form
	public function create()
    {
        echo view('templates/header');
		echo view('Employee/addEmp');
        echo view('templates/footer');
    }

    // insert data
    public function store()
    {
        $db = \Config\Database::connect();
        $data = [
            'EmpID' => $this->request->getVar('EmpID'),
            'EmpName'  => $this->request->getVar('EmpName'),
            'Phone'  => $this->request->getVar('Phone')
        ];
        if ($this->request->getVar('OrgID') != '')
        {
            $data['OrgID'] = $this->request->getVar('OrgID');
        }
        if ($this->request->getVar('MgrID') != '')
        {
            $data['MgrID'] = $this->request->getVar('MgrID');
        }
        $db->table('EMPLOYEE')->insert($data);

        return $this->response->redirect(base_url('/Emp'));
    }

    // show single user
    public function singleEmp($id = null)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM EMPLOYEE WHERE EmpID = $id";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['emp_obj'] = $results[0];
        echo view('templates/header', $data);
        echo view('Employee/editEmp');
        echo view('templates/footer');
    }

    // update user data
    public function update()
    {
        $db = \Config\Database::connect();
        $id = $this->request->getVar('EmpID');
        $data = [
            'EmpName'  => $this->request->getVar('EmpName'),
            'Phone'  => $this->request->getVar('Phone')
        ];
        if ($this->request->getVar('OrgID') != '')
        {
            $data['OrgID'] = $this->request->getVar('OrgID');
        }
        if ($this->request->getVar('MgrID') != '')
        {
            $data['MgrID'] = $this->request->getVar('MgrID');
        }
        $db->table('EMPLOYEE')->where('EmpID', $id)->update($data);
        return $this->response->redirect(base_url('/Emp'));
    }
 
    // delete user
    public function delete($id = null)
    {
        $db = \Config\Database::connect();
        $data['emp'] = $db->table('EMPLOYEE')->where('EmpID', $id)->delete();
        return $this->response->redirect(base_url('/Emp'));
    }
}
