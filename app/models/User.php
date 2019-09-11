<?php
    class User {
        private $db;
        private $total_records_per_page = 9;

        public function __construct(){
            $this->db = new Database;
        }

        public function register($data){
            $this->db->query('INSERT INTO users (name, email, password, country) VALUES (:name, :email, :password, :country)');

            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':country', $data['country']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function login($email, $password){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if(password_verify($password, $hashed_password)){
                return $row;
            } else {
                return false;
            }
        }

        public function findUserByEmail($email){
            $this->db->query('SELECT * FROM users WHERE email = :email');
            $this->db->bind(':email', $email);

            $row = $this->db->single();

            return $row;

            //Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        public  function getAllUsers(){
            $this->db->query("SELECT * FROM users");
            $rows = $this->db->resultSet();
            return $rows;
        }

        public  function getAllUsersLimit(){
            $this->db->query("SELECT * FROM users LIMIT 5");
            $rows = $this->db->resultSet();
            return $rows;
        }

        public function getAllUsersCount(){
            $this->db->query("SELECT COUNT(id) registered_users FROM users");
            $res = $this->db->resultSet();
            return $res;

        }

        public function getCountryCount(){
            $this->db->query("SELECT country, COUNT(country) AS Total FROM users GROUP BY country LIMIT 20");
            $res = $this->db->resultSet();

            $json = json_encode($res);
            file_put_contents(APPROOT . '/data/data.json', $json);

        }

        public function getUserRole(){
            $this->db->query("SELECT role, COUNT(role) AS Total FROM users GROUP BY role");
            $res = $this->db->resultSet();
            $json = json_encode($res);
            file_put_contents(APPROOT . '/data/roles.json', $json);
        }

        public function pagination(){
            $data = array();
            // Get page number
            if(isset($_GET['page_no']) && $_GET['page_no']!=""){
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }

            // Calculate offset value and set prev and next page variables
            $offset = ($page_no-1) * $this->total_records_per_page;
            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";

            // Get total number of pages
            $total_records = $this->countTotalRecords();
            $total_no_of_pages = ceil($this->countTotalRecords() / $this->total_records_per_page);
            $second_last = $total_no_of_pages -1;

            // Fetching limit and offset clause for pagination
            $this->db->query("SELECT * FROM users ORDER BY created_at DESC LIMIT :offset, :total_records_per_page");
            $this->db->bind(':offset', $offset);
            $this->db->bind(':total_records_per_page', $this->total_records_per_page);
            $res = $this->db->resultSet();
            $data = [
                'page_no'           => $page_no,
                'previous'          => $previous_page,
                'next'              => $next_page,
                'total_records'     => $total_records,
                'total_no_of_pages' => $total_no_of_pages,
                'second_last'       => $second_last,
                'user_data'         => $res
            ];
            return $data;

        }

        // Get total records
        public function countTotalRecords(){
            $this->db->query("SELECT COUNT(*) AS total_records FROM users");
            $res = $this->db->resultSet();
            $total_records = $res[0]->total_records;
            return $total_records;
        }

        public function getUserById($id){
            $this->db->query("SELECT * FROM users WHERE id = :id");
            $this->db->bind(':id', $id);
            $row = $this->db->single();

            return $row;
        }

        public function adduser($data){
            $this->db->query('INSERT INTO users (name, email, password, country, role) VALUES (:name, :email, :password, :country, :role)');

            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':role', $data['role']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function updateUser($data){
            $this->db->query("UPDATE users SET name = :name, email = :email, password = :password, country = :country, role = :role WHERE id = :id");

            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':country', $data['country']);
            $this->db->bind(':role', $data['role']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function deleteUser($id){
            $this->db->query('DELETE * FROM users WHERE id = :id');
            $this->db->bind(':id', $id);

            return $this->db->execute();

            // if($this->db->execute()){
            //     return true;
            // } else {
            //     return false;
            // }
        }


    }