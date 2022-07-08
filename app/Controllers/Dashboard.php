<?php

namespace App\Controllers;
use App\Models\UsersModel;
use App\Libraries\MyAuth;

class Dashboard extends BaseController
{
    public $myauth;

    public function __construct(){
        $this->myauth = new MyAuth();
    }

    public function index(){
        /*$userModel = New UsersModel();
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $userModel->find($loggedUserID);
        $data = [
            'title' => 'Dashboard',
            'userInfo' => $userInfo 

        ];*/

        $data = [
            'pageTitle' => 'Dashboard',
            'userInfo' => $this->myauth->isLoggedin()
        ];
        
        return view('dashboard/index',$data);
        //print_r($data);
    }
}
