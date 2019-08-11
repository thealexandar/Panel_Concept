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
            $users = $this->postModel->getCountryCount();
            $roles = $this->postModel->getUserRole();
            $userCount = $this->postModel->getAllUsersCount();
            $data = [
                'title' => 'welcome',
                'users' => $users,
                'link' => $last,
                'roles' => $roles,
                'userCount' => $userCount
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
            $link = URLROOT.$_SERVER['REQUEST_URI'];
            $pieces = explode("/", $link);
            $last = array_pop($pieces);
            $data = [
                'title' => 'users',
                'link' => $last
            ];
            $this->view('pages/users', $data);
        }


    }