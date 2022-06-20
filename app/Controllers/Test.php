<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Auth;

class Test extends BaseController
{
    public $user;

    public function __construct(){
        $this->user = new Auth();
    }

    public function index()
    {
        $data = $this->user->getData();
        print_r($data);
    }
}
