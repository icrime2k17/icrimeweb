<?php
//$sql = "INSERT INTO users(username,password) values(?,?)";
//        $this->pdo->query($sql, array('jethrotest', 'acosta'));
        
Class WebserviceModel extends CI_Model {

    Public function __construct() {
        parent::__construct();
        $this->pdo = $this->load->database('pdo', true);
    }

    public function GetUsers() {
        try
        {
            $sql = "SELECT * FROM app_users";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function AuthenticateUser($username,$password) 
    {
        try
        {
            $sql = "SELECT id FROM app_users where username = ? and password = ?";
            $stmt = $this->pdo->query($sql,array($username,$password));
            return $stmt->result();
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetStations()
    {
        try
        {
            $sql = "SELECT * FROM stations 
                    WHERE enabled = 1
                    ORDER BY station";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetWantedList()
    {
        try
        {
            $sql = "SELECT w.id,w.lastname,w.firstname,w.middlename,w.alias,r.region,w.offenses,w.reward 
                    FROM wanted as w
                    LEFT JOIN region as r
                    ON w.region = r.id
                    WHERE enabled = 1
                    ORDER BY lastname,firstname";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }

}

?> 