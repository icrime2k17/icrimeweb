<?php

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
            $sql = "SELECT id,is_citizen FROM app_users where username = ? and password = ?";
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
    
    public function GetBlotters()
    {
        try
        {
            $sql = "SELECT * FROM blotter 
                    WHERE enabled = 1";
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
            $sql = "SELECT w.id,w.lastname,w.firstname,w.middlename,w.alias,r.region,w.offenses,w.reward,w.image 
                    FROM wanted as w
                    LEFT JOIN region as r
                    ON w.region = r.id
                    WHERE enabled = 1
                    ORDER BY sort,lastname,firstname";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function SubmitReport($data)
    {
        try
        {
            extract($data);
            $date_reported = date("Y-m-d H:i:s");
            $sql = "INSERT INTO crime_reports
                    SET crime = ?,
                    user_id = ?,
                    details = ?,
                    g_lat = ?,
                    g_long = ?,
                    address = ?,
                    image = ?,
                    date_reported = ?,
                    is_flag = 1";
            $stmt = $this->pdo->query($sql,array($crime,$user_id,$details,$g_lat,$g_long,$address,$image,$date_reported));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function Register($data)
    {
        try
        {
            extract($data);
            $password = sha1($password);
            $sql = "INSERT INTO app_users
                    SET lastname = ?,
                    firstname = ?,
                    address = ?,
                    mobile = ?,
                    username = ?,
                    password = ?,
                    enabled = 1,
                    is_citizen  = 1
                    ";
            $stmt = $this->pdo->query($sql,array($lastname,$firstname,$address,$mobile,$username,$password));
            $id = $this->pdo->insert_id();
            return $id;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function CheckIfUsernameExist($username)
    {
        try
        {
            $sql = "SELECT id from app_users where username = ?";
            $stmt = $this->pdo->query($sql,array($username));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function CheckIfNumberExist($number)
    {
        try
        {
            $sql = "SELECT id from app_users where mobile = ?";
            $stmt = $this->pdo->query($sql,array($number));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetReportHistoryByUser($id)
    {
        try
        {
            $sql = "SELECT cr.*, count(crc.crime_report_id) as comment_count 
                    FROM crime_reports as cr 
                    LEFT JOIN crime_report_comments as crc 
                    ON cr.id = crc.crime_report_id 
                    WHERE cr.user_id = ?
                    GROUP BY cr.id";
            $stmt = $this->pdo->query($sql,array($id));
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