<?php 
namespace App\Libraries;
use App\Models\UsersModel;

class Auth{

	public $user;

	public function __construct(){
		$this->user = new UsersModel();
	}

	public function getData(){
		return $this->user->findAll();
	}
	
}	
 ?>