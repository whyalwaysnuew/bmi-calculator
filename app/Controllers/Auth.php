<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->auth = new AuthModel;

    }
    
    public function index()
    {
        if(session()->get('user_id')){
            return redirect()->to(base_url('/'));
        }


        $data = [
            'title' => 'Auth | BMI Calculator',
            'ajax' => 'auth',
        ];

        return view('auth/index', $data);
    }

    public function login()
    {
        $data = $this->request->getPost();

        $user = $this->auth->getDataUser($data['username']);

        if($user && password_verify($data['password'], $user->password))
        {
            $userData = [
                'id' => $user->id,
                'username' => $user->username,
                'name' => $user->name,
                'age' => $user->age,
                'height' => $user->height,
                'weight' => $user->weight,
                'gender' => $user->gender,
                'gender' => $user->gender
            ];

            session()->set($userData);

            $data = [
                'response' => 200,
                'message' => 'Login Success!'
            ];

        } else {
            $data = [
                'response' => 500,
                'message' => 'Account doesn\'t match any data!'
            ];
        }

        echo json_encode($data);

    }

    public function register()
    {
        $data = $this->request->getPost();

        $usernameChecked = $this->auth->checkUsername($data['username']);

        if(@$data){
            if($data['password'] != $data['password_2'])
            {
                $data = [
                    'response' => 400,
                    'message' => 'Confirmed Password doesn\'t match!'
                ];
            } else {
                if(@$usernameChecked)
                {
                    $data = [
                        'name' => $data['name'],
                        'username' => $data['username'],
                        'password' => password_hash($data['password'], PASSWORD_BCRYPT),
                        'gender' => $data['gender'],
                        'weight' => $data['weight'],
                        'height' => $data['height'],
                        'age' => $data['age'],
                    ];
    
                    $result = $this->auth->register($data);
    
                    if($result){
                        $data = [
                            'response' => 200,
                            'message' => 'Account Has Been Registered!'
                        ];
                    } else {
                        $data =[
                            'response' => 500,
                            'message' => 'Something went wrong! Please register again.'
                        ];
                    }
                } else {
                    $data = [
                            'response' => 400,
                            'message' => 'Username has been registered!'
                        ];
                }
            }
        } else {
            $data = [
                'response' => 500,
                'message' => 'Something went wrong! Please try again.'
            ];
        }

        echo json_encode($data);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(base_url('auth'));
    }

    public function isLogin()
    {

    }
}