<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        // Index page
        public function users() {
            $link   = URLROOT.$_SERVER['REQUEST_URI'];
            $pieces = explode("/", $link);
            $last   = array_pop($pieces);

            $pagination = $this->userModel->pagination();
            $adduser = $this->addNewUser();

            $data = [
                'link' => $last,
                'pagination' => $pagination,
                'adduser' => $adduser
            ];
            $this->view('users/users', $data);
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
                } else {
                    // Check Email
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
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

                // Validate Country
                if(empty($data['country'])){
                    $data['country_err'] = 'Please Enter Country';
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['country_err'])){
                    // Validated

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if($this->userModel->register($data)){
                        flash('register_success', 'You are registered and can log in');
                        redirect('users/login');
                    } else {
                        die('Something went wrong');
                    }

                } else {
                    // Load view with errors
                    $this->view('users/register', $data);
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

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Validite Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please Enter Email';
                }

                // Validite password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please Enter Password';
                }

                // Check for user/email
                if($this->userModel->findUserByEmail($data['email'])){
                    // User found
                } else {
                    // User not found
                    $data['email_err'] = 'No user found';
                }

                // Make sure errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])){
                    // Validated
                    // Check and set logged in user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if($loggedInUser){
                        // Create Session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password incorrect';
                        $this->view('users/login', $data);
                    }
                } else {
                    // Load view with errors
                    $this->view('users/login', $data);
                }

            } else {
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                // Load form
               $this->view('users/login', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            $_SESSION['user_email'] = $user->email;
            $_SESSION['user_country'] = $user->country;
            redirect('pages/index');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_country']);
            session_destroy();
            redirect('users/login');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            } else {
                return false;
            }
        }

        public function addNewUser(){
            // Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'name'      => trim($_POST['name']),
                    'email'     => trim($_POST['email']),
                    'password'  => trim($_POST['password']),
                    'country'   => trim($_POST['country']),
                    'role'      => $_POST['role'],
                    'email_err' => ''
                ];

                // Validite Name
                if(empty($data['name'])){
                    $data['name_err'] = 'Please Enter Name';
                }

                // Validite Email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please Enter Email';
                } else {
                    // Check Email
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'Email is already taken';
                    }
                }

                // Validite Password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please Enter Password';
                } elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                // Validate Country
                if(empty($data['country'])){
                    $data['country_err'] = 'Please Enter Country';
                }

                // Make sure errors are empty
                if(empty($data['email_err'])){
                    // Hash passowrd
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Add user
                    if($this->userModel->adduser($data)) {
                        flash('add_success', 'User added');
                        redirect('users/users');
                    } else {
                        die('something went wrong');
                    }
                } else {
                    // Load view with errors
                    return $data;
                }
            } else {
                // Init data
                $data =[
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'country' => '',
                    'role' => '',
                    'email_err' => ''
                ];

                 // Load view
                 return $data;
            }
        }


    }