<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsersModel;
use App\Libraries\Hash;
use App\Libraries\MyAuth;

class Auth extends BaseController
{

    public $myauth;

    public function __construct(){
        helper(['url','form']);
        
        $this->myauth = new MyAuth();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register(){
        return view('auth/register');
    }

    public function save(){
        //validate request
        // $validation = $this->validate([
        //     'name'      => 'required',
        //     'email'     => 'required|valid_email|is_unique[users.email]',
        //     'password'  => 'required|min_length[5]|max_length[12]',
        //     'cpassowrd' => 'required|min_length[5]|max_length[12]|matches[password]'
        // ]);

        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required'      => 'Your fullname is required'
                ]
            ],
            'email' => [
                'rules'     => 'required|valid_email|is_unique[users.email]',
                'errors'    => [
                    'required'      => 'Your email is required',
                    'valid_email'   => 'Your must enter valid email address',
                    'is_unique'     => 'email already taken'
                ]
            ],
            'password' => [
                'rules'     => 'required|min_length[5]|max_length[12]',
                'errors'    => [
                    'required'      => 'Password is required',
                    'min_length'    => 'Password must have atleast 5 characters in length',
                    'max_length'    => 'Password must not have characters more than 12 in length'
                ]
            ],
             'cpassword' => [
                'rules'     => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors'    => [
                    'required'      => 'Confirm password is required',
                    'min_length'    => 'Password must have atleast 5 characters in length',
                    'max_length'    => 'Password must not have characters more than 12 in length',
                    'matches'       => 'Confirm password not matches to Password'
                ]
            ]
        ]);

        if (!$validation) {
            return view('auth/register',['validation'=>$this->validator]);
        }else{
            //insert register data to database
            $name   = $this->request->getPost('name');
            $email  = $this->request->getPost('email');
            $password   = $this->request->getPost('password');

            $values =[
                'name'     => $name,
                'email'    => $email,
                'password' => Hash::make($password),
                'status'=> '1',
            ];

            $userModel = New UsersModel();
            $query = $userModel->insert($values);
            if (!$query) {
               return redirect()->back()->with('fail','something went wrong');
            }else{
                //return to register page
                return redirect()->to('auth/register')->with('success','User record has been successfully save');

                //redirect user to dashboard once register is successfull
                /*$last_id = $userModel->insertID();//last inserted id
                session()->set('loggedUser', $last_id);
                return redirect()->to('/dashboard');*/
            }
        }
    }

    public function check(){
        //validate user input from login form

        $validation = $this->validate([
            'email' => [
                'rules'     => 'required|valid_email|is_not_unique[users.email]',
                'errors'    => [
                    'required'      => 'Your email is required',
                    'valid_email'   => 'Your must enter valid email address',
                    'is_not_unique'     => 'this email is not register in our system'
                ]
            ],
            'password' => [
                'rules'     => 'required|min_length[5]|max_length[12]',
                'errors'    => [
                    'required'      => 'Password is required',
                    'min_length'    => 'Password must have atleast 5 characters in length',
                    'max_length'    => 'Password must not have characters more than 12 in length'
                ]
            ]
        ]);

        if(!$validation){
            return view('auth/login',['validation'=>$this->validator]);
        }else{
             //check user
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $userModel = New UsersModel();
            $user_info = $userModel->where('email',$email)->first();
            $check_password = Hash::check($password, $user_info['password']);

            if (!$check_password) {
                session()->setFlashdata('fail','Incorrect Password');
                return redirect()->to('/auth')->withInput();
            }else{
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                //$this->myauth->setUserSession($user_id);
                return redirect()->to('/dashboard');
            }
        }
    }

    public function logout(){
        /*if (session()->has('loggedUser')) {
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail','your are logged out');
        }*/

        $this->myauth->logout();
        return redirect()->to('/auth?access=out')->with('fail','your are logged out');

    }
}
