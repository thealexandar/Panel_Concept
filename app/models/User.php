<?php
    class User {
        private $db;

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

        public function getAllUsersCount(){
            $this->db->query("SELECT COUNT(id) registered_users FROM users");
            $res = $this->db->resultSet();
            return $res;

        }

        public function getCountryCount(){
            $this->db->query("SELECT country, COUNT(country) AS Total FROM users GROUP BY country");
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
    }