<?php
include_once('DbConnection.php');
 
class Vehicle extends DbConnection{

    public function __construct(){

        parent::__construct();
    }
    
        
    public function fetchAll($sql){

        $query = $this->connection->query($sql);
        $data = [];
        while($row = $query->fetch_array()){
            $data[] = $row; 
        }
            
        return $data;       
    }


    public function fetchSingle($sql){

        $query = $this->connection->query($sql);
        
        $row = $query->fetch_array();
            
        return $row;       
    }
    
    public function escape_string($value){
        
        return $this->connection->real_escape_string($value);
    }
}