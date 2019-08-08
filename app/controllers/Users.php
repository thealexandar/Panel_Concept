<?php
    class Users extends Controller{
        public function __constructor(){

        }

        public function register(){
            // Chech for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'country' => trim($_POST['country']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'country_err' => ''
                ];

                // Validite Name
                if(empty($data['name'])){
                    $data['name_err'] = 'Please Enter Name';
                }

                // Validite Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please Enter Email';
                }

                // Validite Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please Enter Password';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Validite Confirm Password
                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please Confirm Password';
                } else {
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){

                }


            } else {
                // Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'country' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'country_err' => ''
                ];

                // Load view
                $this->view('users/register', $data);
            }
        }

        public function login(){
            // Chech for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
            } else {
                // Load form
                $this->view('users/login');
            }
        }
    }