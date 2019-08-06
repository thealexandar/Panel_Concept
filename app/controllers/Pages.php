<?php
    class Pages extends Controller {
        public function __construct() {
            $this->postModel = $this->model('Test');
        }

        public function index() {
            $records = $this->postModel->getRecords();
            $data = [
                'title' => 'welcome',
                'records' => $records
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
            $data = [
                'title' => 'users'
            ];
            $this->view('pages/users', $data);
        }
    }