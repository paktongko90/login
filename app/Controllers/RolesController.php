<?php

namespace App\Controllers;
use App\Models\RolesModel;

class RolesController extends BaseController
{
    public function index()
    {
        $roles = new RolesModel();
        $data = [
            'pageTitle' => 'Roles',
            'roles' => $roles->getRoles()
        ];
        return view('roles/index',$data);
    }

    public function createRole(){
        $data['pageTitle'] = 'Create Role';
        return view('roles/createrole',$data);
    }

    public function SaveRole(){
        $role = new RolesModel();
        $data = array(
            'role_name' => $this->request->getPost('role_name')
        );
        $role->saveRole($data);
        return redirect()->to('roles');
    }

    public function editRole($id){
        $role = new RolesModel();
        $data = [
            'pageTitle' => 'Edit Roles',
            'role' => $role->getRoles($id)->getRow()
        ];
        //print_r($data);
        return view('roles/editrole',$data);
    }

    public function updateRole(){
        $role = new RolesModel();
        $id = $this->request->getPost('id');
        $data = array(
            'role_name' => $this->request->getPost('role_name')
        );
        $role->updateRole($data, $id);
        return redirect()->to('/roles');
    }

    public function deleteRole($id){
        $role = new RolesModel();
        $role->deleteRole($id);
        return redirect()->to('/roles');
    }
}