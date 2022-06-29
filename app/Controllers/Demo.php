<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Demo extends BaseController
{
    public function index(){
        return view('demo/index');
    }

    public function index2(){
        return view('demo/index2');
    }

    public function index2_post(){
        return view('demo/index2');
    }

    public function index3($id){
        $data['id'] = $id;
        return view('demo/index3', $data);
    }

    public function index4($id1, $id2){
        $data['id1'] = $id1;
        $data['id2'] = $id2;

        return view('demo/index4', $data);
    }
}
