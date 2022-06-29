<?php 
namespace App\Libraries;
use App\Models\UsersModel;
use \Config\Services;

class MyAuth{

	public $user;

	public function __construct(){
		$this->user = new UsersModel();
	}

	public function getData(){
		return $this->user->findAll();
	}

	/**
   *--------------------------------------------------------------------------
   * LOGIN USER
   *--------------------------------------------------------------------------
   *
   * Form validation done in controller
   * Gets the user from DB
   * Checks if their account is activated
   * Sets the user session and logs them in
   * 
   * @param  string $email
   * @return true
   */

	public function LoginUser($email){
		$user = $this->user->where('email',$email)->first();
		

		//check user status activated, 1=active,0 = not active
		if($user['activated'] == 1){
			return true;
		}

		//set user session
		$this->setUserSession($user);

	}

    /**
     *--------------------------------------------------------------------------
     * GET LIST OF USER
     *--------------------------------------------------------------------------
     *
     * retrieve all user
     * 
     * 
     * @return list
     */

    public function getAllUsers(){

        $users = $this->user->findAll();
        return $users;
    }

    /**
     *--------------------------------------------------------------------------
     * GET USER DETAILS
     *--------------------------------------------------------------------------
     *
     * retrieve all user
     * 
     * @param  id
     * @return details
     */

    /*public function getUserDetails($id = false){
        if ($id === false) {
            return $this->findAll();
        }else{
            return $this->getwhere
        }
    }*/

    /**
     *--------------------------------------------------------------------------
     * DELETE USER
     *--------------------------------------------------------------------------
     *
     * DELETE USER
     * 
     * @param  id
     * @return details
     */
    public function deleteUser($id){
        $user = $this->user->delete($id);
    }
     /**
     *--------------------------------------------------------------------------
     * SET USER SESSION
     *--------------------------------------------------------------------------
     *
     * Saves user details to session
     * 
     * @param  array $user_id
     * @return void
     */

    public function setUserSession($user_id){
    	session()->set('loggedUser', $user_id);
        return true;
    }

    /**
     *--------------------------------------------------------------------------
     * GET CURRENT USER SESSION
     *--------------------------------------------------------------------------
     *
     * to get current login user that has been signed in
     * 
     * @param  array $user_id
     * @return void
     */

    public function isLoggedin(){
        $loggedUserID = session()->get('loggedUser');
        $userInfo = $this->user->find($loggedUserID);
        return $userInfo;
    }

    /**
     *--------------------------------------------------------------------------
     * Log Out
     *--------------------------------------------------------------------------
     *
     * remove user from current session LoggedUser
     * 
     */

    public function logout(){
      if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
        }
    }

}	
 ?>