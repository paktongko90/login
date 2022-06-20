<?php

namespace App\Controllers;
use App\Models\UsersModel;

class Dashboard extends BaseController
{
    public function index(){
        $userModel = New UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $data = [
            'title' => 'Dashboard',
            'userInfo' => $userInfo 

        ];
        return view('dashboard/index',$data);
    }
}
