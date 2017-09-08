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
    
    public function UpdateAccount($data)
    {
        try
        {
            extract($data);
            if(trim($password) != '')
            {
                $password = sha1($password);
                $sql = "UPDATE app_users
                        SET lastname = ?,
                        firstname = ?,
                        address = ?,
                        mobile = ?,
                        username = ?,
                        password = ?
                        WHERE id = ?
                        ";
                $stmt = $this->pdo->query($sql,array($lastname,$firstname,$address,$mobile,$username,$password,$id));
                return $stmt;
            }
            else
            {
                $sql = "UPDATE app_users
                        SET lastname = ?,
                        firstname = ?,
                        address = ?,
                        mobile = ?,
                        username = ?
                        WHERE id = ?
                        ";
                $stmt = $this->pdo->query($sql,array($lastname,$firstname,$address,$mobile,$username,$id));
                return $stmt;
            }
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function CheckIfUsernameExist($username,$id)
    {
        try
        {
            $additional_query = '';
            if($id != null)
            {
                $additional_query = "AND id != $id AND enabled = 1";
            }
            $sql = "SELECT id from app_users 
                    where username = ?
                    $additional_query";
            $stmt = $this->pdo->query($sql,array($username));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function CheckIfNumberExist($number,$id)
    {
        try
        {
            $additional_query = '';
            if($id != null)
            {
                $additional_query = "AND id != $id AND enabled = 1";
            }
            $sql = "SELECT id from app_users 
                    where mobile = ?
                    $additional_query";
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
                    GROUP BY cr.id
                    ORDER BY cr.id DESC";
            $stmt = $this->pdo->query($sql,array($id));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetCommentsById($id) {
        try
        {
            $sql = "SELECT crc.*, CONCAT(au.firstname,' ',au.lastname) as user_name FROM crime_report_comments as crc
                    INNER JOIN app_users as au
                    ON au.id = crc.user_id
                    WHERE crc.crime_report_id = ?
                    ORDER BY crc.id";
            $stmt = $this->pdo->query($sql,array($id));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function AddComment($data) {
        try
        {
            extract($data);
            $date_added = date('Y-m-d H:i:s');
            $sql = "INSERT INTO crime_report_comments
                    SET crime_report_id = ?,
                    user_id = ?,
                    comment = ?,
                    date_added = ?";
            $stmt = $this->pdo->query($sql,array($id,$user_id,$comment,$date_added));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetUserById($id)
    {
        try
        {
            $sql = "SELECT id,firstname,lastname,mobile,address,username FROM app_users WHERE id = ?";
            $stmt = $this->pdo->query($sql,array($id));
            $result = $stmt->result();
            return (array) $result[0];
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetBlotterYears() {
        try
        {
            $sql = "SELECT DISTINCT(YEAR(date_of_incident)) as years 
                    FROM blotter 
                    WHERE enabled = 1 
                    ORDER BY years DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetCrimeAnalysisByDateRange($date_from,$date_to) {
        try
        {
            $sql = "SELECT c.crime as label,(SELECT COUNT(id) FROM blotter WHERE incident = c.crime
                    AND (date_of_incident >= ? AND date_of_incident <= ?)) as value 
                    FROM crimes as c
                    ORDER BY c.crime";
            $stmt = $this->pdo->query($sql,array($date_from,$date_to));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetCrimeAnalysisByDay($day) {
        try
        {
            $sql = "SELECT c.crime as label,(SELECT COUNT(id) FROM blotter WHERE incident = c.crime
                    AND date_of_incident = ?) as value 
                    FROM crimes as c
                    ORDER BY c.crime";
            $stmt = $this->pdo->query($sql,array($day));
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