<?php
    class Pages extends Controller {
        public function __construct() {
            $this->postModel = $this->model('User');

            if(!isset($_SESSION['user_id'])) {
                redirect('users/login');
            }
        }

        public function index() {
            $link = URLROOT.$_SERVER['REQUEST_URI'];
            $pieces = explode("/", $link);
            $last = array_pop($pieces);

            $countries  = $this->postModel->getCountryCount();
            $roles      = $this->postModel->getUserRole();
            $userCount  = $this->postModel->getAllUsersCount();
            $users      = $this->postModel->getAllUsersLimit();
            $data = [
                'title' => 'welcome',
                'countries' => $countries,
                'link' => $last,
                'roles' => $roles,
                'userCount' => $userCount,
                'users' => $users
            ];
            $this->view('pages/index', $data);
        }
        // Load JSON data
        public function data() {
            $this->loadJson('data');
        }
        // Load JSON data
        public function roles() {
            $this->loadJson('roles');
        }

        public function users() {
            $link   = URLROOT.$_SERVER['REQUEST_URI'];
            $pieces = explode("/", $link);
            $last   = array_pop($pieces);

            $pagination = $this->postModel->pagination();
            $users  = $this->postModel->getAllUsers();

            $data = [
                'title' => 'users',
                'link' => $last,
                'users' => $users,
                'pagination' => $pagination
            ];
            $this->view('pages/users', $data);
        }


    }