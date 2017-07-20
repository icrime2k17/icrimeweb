<?php
Class AdminModel extends CI_Model {

    Public function __construct() {
        parent::__construct();
        $this->pdo = $this->load->database('pdo', true);
    }

    public function GetAppUsers() {
        try
        {
            $sql = "SELECT * FROM app_users 
                    WHERE enabled = 1
                    ORDER BY lastname,firstname,username";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetAppUserById($id)
    {
        try
        {
            $sql = "SELECT id,firstname,lastname,position,username FROM app_users WHERE id = ?";
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

    public function AddAppUser($data) {
        try
        {
            extract($data);
            $password = sha1($password);
            $sql = "INSERT INTO app_users
                    SET username = ?,
                    password = ?,
                    lastname = ?,
                    firstname = ?,
                    position = ?
                    ";
            $stmt = $this->pdo->query($sql,array($username,$password,$lastname,$firstname,$position));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function DeleteAppUser($id)
    {
        try
        {
            $sql = "UPDATE app_users
                    SET enabled = 0
                    WHERE id = ?
                    ";
            $stmt = $this->pdo->query($sql,array($id));

            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function UpdateAppUser($data) {
        try
        {
            extract($data);
            if(trim($password) == '')
            {
                $sql = "UPDATE app_users
                        SET username = ?,
                        lastname = ?,
                        firstname = ?,
                        position = ?
                        WHERE id = ?
                        ";
                $stmt = $this->pdo->query($sql,array($username,$lastname,$firstname,$position,$edit_id));
            }
            else 
            {
                $password = sha1($password);
                $sql = "UPDATE app_users
                        SET username = ?,
                        password = ?,
                        lastname = ?,
                        firstname = ?,
                        position = ?
                        WHERE id = ?
                        ";
                $stmt = $this->pdo->query($sql,array($username,$password,$lastname,$firstname,$position,$edit_id));
            }
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

    public function GetStations() {
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
    
    public function GetDistricts() {
        try
        {
            $sql = "SELECT distinct(district) as district FROM stations 
                    ORDER BY district";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function AddStation($data) {
        try
        {
            extract($data);
            $sql = "INSERT INTO stations
                    SET station = ?,
                    district = ?,
                    address = ?,
                    g_lat = ?,
                    g_long = ?,
                    phone = ?,
                    chief = ?,
                    chief_phone = ?
                    ";
            $stmt = $this->pdo->query($sql,array($station,$district,$address,$lat,$long,$phone,$chief,$chief_phone));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetStationById($id)
    {
        try
        {
            $sql = "SELECT * FROM stations WHERE id = ?";
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
    
    public function UpdateStation($data) {
        try
        {
            extract($data);
            $sql = "UPDATE stations
                    SET station = ?,
                    district = ?,
                    address = ?,
                    g_lat = ?,
                    g_long = ?,
                    phone = ?,
                    chief = ?,
                    chief_phone = ?
                    WHERE id = ?
                    ";
            $stmt = $this->pdo->query($sql,array($station,$district,$address,$lat,$long,$phone,$chief,$chief_phone,$edit_id));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function DeleteStation($id)
    {
        try
        {
            $sql = "UPDATE stations
                    SET enabled = 0
                    WHERE id = ?
                    ";
            $stmt = $this->pdo->query($sql,array($id));

            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetWantedList() {
        try
        {
            $sql = "SELECT id,lastname,firstname,middlename,alias,region,offenses,reward FROM wanted 
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
    
    public function AddWanted($data)
    {
        try
        {
            extract($data);
            $sql = "INSERT INTO wanted
                    SET lastname = ?,
                    firstname = ?,
                    middlename = ?,
                    region = ?,
                    alias = ?,
                    reward = ?,
                    mcn = ?,
                    mcdate = ?,
                    ccn = ?,
                    offenses = ?,
                    court = ?,
                    synopsis = ?,
                    sex = ?,
                    height = ?,
                    weight = ?,
                    eyes = ?,
                    hair = ?,
                    complexion = ?,
                    other = ?,
                    age = ?,
                    birthdate = ?,
                    birthplace = ?,
                    citizenship = ?,
                    father = ?,
                    mother = ?,
                    address = ?,
                    civilstatus = ?,
                    elementary = ?,
                    secondary = ?,
                    college = ?,
                    sort = ?
                    ";
            $stmt = $this->pdo->query($sql,array(
                        $lastname,
                        $firstname,
                        $middlename,
                        $region,
                        $alias,
                        $reward,
                        $mcn,
                        $mcdate,
                        $ccn,
                        $offenses,
                        $court,
                        $synopsis,
                        $sex,
                        $height,
                        $weight,
                        $eyes,
                        $hair,
                        $complexion,
                        $other,
                        $age,
                        $birthdate,
                        $birthplace,
                        $citizenship,
                        $father,
                        $mother,
                        $address,
                        $civilstatus,
                        $elementary,
                        $secondary,
                        $college,
                        $sort
                    ));
            $id = $this->pdo->insert_id();
            return $id;
            
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function SetWantedImage($id,$filename)
    {
        try
        {
            $sql = "UPDATE wanted 
                SET image = ?
                WHERE id = ?";
            $stmt = $this->pdo->query($sql,array($filename,$id));
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