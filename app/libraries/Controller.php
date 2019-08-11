<?php
    // Base controller
    // Loads the models and views
    class Controller{
        // Load model
        public function model($model) {
            // Require model file
            require_once '../app/models/' . $model . '.php';

            // Instatiate model
            return new $model();
        }

        // Load view
        public function view($view, $data = []) {
            // Check for view file
            if(file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                // View does not exists
                die('View does not exists');
            }
        }

        public function loadJson($jsonFile) {
            // Check for view file
            if(file_exists('../app/data/' . $jsonFile . '.json')) {
                require_once '../app/data/' . $jsonFile . '.json';
            } else {
                // View does not exists
                die('View does not exists');
            }
        }
    }