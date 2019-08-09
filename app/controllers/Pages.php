<?php
    class Pages extends Controller {
        public function __construct() {
            $this->postModel = $this->model('Test');

            if(!isset($_SESSION['user_id'])) {
                redirect('users/login');
            }
        }

        public function index() {
            $records = $this->postModel->getRecords();
            $link = URLROOT.$_SERVER['REQUEST_URI'];
            $pieces = explode("/", $link);
            $last = array_pop($pieces);
            $data = [
                'title' => 'welcome',
                'records' => $records,
                'link' => $last
            ];

            $this->view('pages/index', $data);
        }

        public function about() {
            $data = [
                'title' => 'About Us'
            ];
            $this->view('pages/about', $data);
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