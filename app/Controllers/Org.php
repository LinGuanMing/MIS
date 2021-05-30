<?php

namespace App\Controllers;

use App\Models\EmpModel;

class Org extends BaseController
{
	public function index()
	{
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM ORGANIZATION";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['title'] = '部門基本資料';
        $data['orgs'] = $results;

        echo view('templates/header', $data);
		echo view('Organization/listOrg');
        echo view('templates/footer');
	}

    // add user form
	public function create()
    {
        $db = \Config\Database::connect();
        $sql = "SELECT RuleValue+1 AS OrgID FROM REGULATION
                WHERE RuleKind = 'SEQID'
                AND RuleID = 'ORGID'";
        $db->transStart();
        $query = $db->query($sql);
        $results = $query->getResultArray();
        if (count($results)==0)
        {
            $data['SEQID'] = ['OrgID' => '000001'];
            $REG = [
                'RuleKind' => 'SEQID',
                'RuleID' => 'ORGID',
                'RuleValue' => $data['SEQID']
            ];
            $db->table('REGULATION')->insert($REG);
        }
        else
        {
            $data['SEQID'] = ['OrgID' => str_pad($results[0]['OrgID'], 5, '0', STR_PAD_LEFT)];
            $REG = [
                'RuleKind' => 'SEQID',
                'RuleID' => 'ORGID',
                'RuleValue' => $data['SEQID']
            ];
            $db->table('REGULATION')->where(['RuleKind' => 'SEQID', 'RuleID' => 'ORGID'])->update($REG);
        }
        $db->transComplete();

        echo view('templates/header', $data);
		echo view('Organization/addOrg');
        echo view('templates/footer');
    }

    // insert data
    public function store()
    {
        $db = \Config\Database::connect();
        $data = [
            'OrgID' => $this->request->getVar('OrgID'),
            'OrgName'  => $this->request->getVar('OrgName')
        ];
        if ($this->request->getVar('MgrID') != '')
        {
            $data['MgrID'] = $this->request->getVar('MgrID');
        }
        else
        {
            $data['MgrID'] = NULL;
        }
        $db->table('Organization')->insert($data);

        return $this->response->redirect(base_url('/Org'));
    }

    // show single user
    public function singleOrg($id = null)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM ORGANIZATION WHERE OrgID = $id";
        $query = $db->query($sql);
        $results = $query->getResultArray();
        $db->close();
        $data['org_obj'] = $results[0];
        echo view('templates/header', $data);
        echo view('Organization/editOrg');
        echo view('templates/footer');
    }

    // update user data
    public function update()
    {
        $db = \Config\Database::connect();
        $id = $this->request->getVar('OrgID');
        $data = [
            'OrgName'  => $this->request->getVar('OrgName')
        ];
        if ($this->request->getVar('MgrID') != '')
        {
            $data['MgrID'] = $this->request->getVar('MgrID');
        }
        else
        {
            $data['MgrID'] = NULL;
        }
        $db->table('ORGANIZATION')->where('OrgID', $id)->update($data);
        return $this->response->redirect(base_url('/Org'));
    }
 
    // delete user
    public function delete($id = null)
    {
        $db = \Config\Database::connect();
        $data['org'] = $db->table('ORGANIZATION')->where('OrgID', $id)->delete();
        return $this->response->redirect(base_url('/Org'));
    }
}
