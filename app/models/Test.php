<?php

    class Test {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function getRecords(){
            $this->db->query("SELECT category, value1 FROM my_chart_data ORDER BY category ASC");
            $result =  $this->db->resultSet();
            $data = array();
            foreach($result as $row){
                $data[] = $row;
            }
            $json = json_encode($data);

        }
    }