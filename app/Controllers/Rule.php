<?php

namespace App\Controllers;

class Rule extends BaseController
{
	public function index()
	{
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM REGULATION";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['title'] = '設定檔維護';
        $data['regs'] = $results;

        echo view('templates/header', $data);
		echo view('Regulation/listRule');
        echo view('templates/footer');
	}

    // add user form
	public function create()
    {
        echo view('templates/header');
		echo view('Regulation/addRule');
        echo view('templates/footer');
    }

    // insert data
    public function store()
    {
        $db = \Config\Database::connect();
        $data = [
            'RuleKind' => $this->request->getVar('RuleKind'),
            'RuleID'  => $this->request->getVar('RuleID'),
            'RuleValue1'  => $this->request->getVar('RuleValue1'),
            'RuleValue2'  => $this->request->getVar('RuleValue2'),
            'RuleValue3'  => $this->request->getVar('RuleValue3'),
            'RuleValue4'  => $this->request->getVar('RuleValue4')
        ];
        $db->table('REGULATION')->insert($data);

        return $this->response->redirect(base_url('/Rule'));
    }

    // show single user
    public function singleRule($kind = null, $id = null)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM REGULATION WHERE RuleKind = '$kind' and RuleID = '$id'";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['reg_obj'] = $results[0];
        echo view('templates/header', $data);
        echo view('Regulation/editRule');
        echo view('templates/footer');
    }

    // update user data
    public function update()
    {
        $db = \Config\Database::connect();
        $kind = $this->request->getVar('RuleKind');
        $id = $this->request->getVar('RuleID');
        $data = [
            'RuleValue1'  => $this->request->getVar('RuleValue1'),
            'RuleValue2'  => $this->request->getVar('RuleValue2'),
            'RuleValue3'  => $this->request->getVar('RuleValue3'),
            'RuleValue4'  => $this->request->getVar('RuleValue4')
        ];
        $db->table('REGULATION')->where(['RuleKind' => $kind, 'RuleID' => $id])->update($data);
        return $this->response->redirect(base_url('/Rule'));
    }
 
    // delete user
    public function delete($kind = null, $id = null)
    {
        $db = \Config\Database::connect();
        $data['reg'] = $db->table('REGULATION')->where(['RuleKind' => $kind, 'RuleID' => $id])->delete();
        return $this->response->redirect(base_url('/Rule'));
    }
}
