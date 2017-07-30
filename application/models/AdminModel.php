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
            $sql = "SELECT id,firstname,lastname,position,username,is_admin FROM app_users WHERE id = ?";
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
            if(isset($is_admin) && $is_admin == 'on')
            {
                $is_admin = 1;
            }
            else
            {
                $is_admin = 0;
            }
            
            $password = sha1($password);
            $sql = "INSERT INTO app_users
                    SET username = ?,
                    password = ?,
                    lastname = ?,
                    firstname = ?,
                    position = ?,
                    is_admin = ?
                    ";
            $stmt = $this->pdo->query($sql,array($username,$password,$lastname,$firstname,$position,$is_admin));
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
            if(isset($is_admin) && $is_admin == 'on')
            {
                $is_admin = 1;
            }
            else
            {
                $is_admin = 0;
            }
            
            if(trim($password) == '')
            {
                $sql = "UPDATE app_users
                        SET username = ?,
                        lastname = ?,
                        firstname = ?,
                        position = ?,
                        is_admin = ?
                        WHERE id = ?
                        ";
                $stmt = $this->pdo->query($sql,array($username,$lastname,$firstname,$position,$is_admin,$edit_id));
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
    
    public function UpdateWanted($data)
    {
        try
        {
            extract($data);
            $sql = "UPDATE wanted
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
                    WHERE id = ?
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
                        $sort,
                        $edit_id
                    ));
            return $stmt;
            
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
    
    public function GetWantedById($id)
    {
        try
        {
            $sql = "SELECT * FROM wanted WHERE id = ?";
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
    
    public function DeleteWanted($id)
    {
        try
        {
            $sql = "UPDATE wanted
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
    
    public function GetRegions() {
        try
        {
            $sql = "SELECT * FROM region
                    ORDER BY region";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetBlotters() {
        try
        {
            $sql = "SELECT * FROM blotter
                    WHERE enabled = 1
                    ORDER BY id DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function AddBlotter($data) {
        try
        {
            extract($data);
            $sql = "INSERT INTO blotter
                    SET incident = ?,
                    date_reported = ?,
                    time_reported = ?,
                    date_of_incident = ?,
                    time_of_incident = ?,
                    narrative = ?,
                    place_of_incident = ?,
                    g_lat = ?,
                    g_long = ?,
                    enabled = 1
                    ";
            $stmt = $this->pdo->query($sql,array(
                    $type_of_incident,
                    $date_reported,
                    $time_reported,
                    $date_of_incident,
                    $time_of_incident,
                    $narrative,
                    $place_of_incident,
                    $lat,
                    $long
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
    
    public function UpdateBlotterEntryNumber($id,$number) {
        try
        {
            $sql = "UPDATE blotter
                    SET entry_number = ?
                    WHERE id = ?
                    ";
            $stmt = $this->pdo->query($sql,array($number,$id));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function AddReporting($blotter_id,$data) {
        try
        {
            extract($data);
            if(isset($r_is_victim))
            {
                $r_is_victim = 1;
            }
            else
            {
                $r_is_victim = 0;
            }
            
            $sql = "INSERT INTO reporting
                    SET blotter_id = ?,
                    lname = ?,
                    fname = ?,
                    mname = ?,
                    qualifier = ?,
                    nickname = ?,
                    citizenship = ?,
                    sex = ?,
                    status = ?,
                    birth_date = ?,
                    age = ?,
                    birth_place = ?,
                    phone = ?,
                    mobile = ?,
                    c_address = ?,
                    c_village = ?,
                    c_brgy = ?,
                    c_city = ?,
                    c_province = ?,
                    o_address = ?,
                    o_village = ?,
                    o_brgy = ?,
                    o_city = ?,
                    o_province = ?,
                    hea = ?,
                    occupation = ?,
                    id_presented = ?,
                    email = ?,
                    is_victim = ?
                    ";
            $stmt = $this->pdo->query($sql,array(
                    $blotter_id,
                    $r_lname,
                    $r_fname,
                    $r_mname,
                    $r_qualifier,
                    $r_nickname,
                    $r_citizenship,
                    $r_sex,
                    $r_status,
                    $r_birth_date,
                    $r_age,
                    $r_birth_place,
                    $r_phone,
                    $r_mobile,
                    $r_c_address,
                    $r_c_village,
                    $r_c_brgy,
                    $r_c_city,
                    $r_c_province,
                    $r_o_address,
                    $r_o_village,
                    $r_o_brgy,
                    $r_o_city,
                    $r_o_province,
                    $r_hea,
                    $r_occupation,
                    $r_id_presented,
                    $r_email,
                    $r_is_victim
            ));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function AddSuspect($blotter_id,$data) {
        try
        {
            extract($data);
            if(isset($s_is_officer))
            {
                $s_is_officer = 1;
            }
            else
            {
                $s_is_officer = 0;
            }
            
            if(isset($s_is_wpcr))
            {
                $s_is_wpcr = 1;
            }
            else
            {
                $s_is_wpcr = 0;
            }
            
            if(isset($s_is_uti))
            {
                $s_is_uti = 1;
            }
            else
            {
                $s_is_uti = 0;
            }
            
            $sql = "INSERT INTO suspect
                    SET blotter_id = ?,
                    lname = ?,
                    fname = ?,
                    mname = ?,
                    qualifier = ?,
                    nickname = ?,
                    citizenship = ?,
                    sex = ?,
                    status = ?,
                    birth_date = ?,
                    age = ?,
                    birth_place = ?,
                    phone = ?,
                    mobile = ?,
                    c_address = ?,
                    c_village = ?,
                    c_brgy = ?,
                    c_city = ?,
                    c_province = ?,
                    o_address = ?,
                    o_village = ?,
                    o_brgy = ?,
                    o_city = ?,
                    o_province = ?,
                    hea = ?,
                    occupation = ?,
                    work_address = ?,
                    rtv = ?,
                    email = ?,
                    is_officer = ?,
                    rank = ?,
                    unit_assigned = ?,
                    group_affiliation = ?,
                    is_wpcr = ?,
                    criminal_records = ?,
                    sopc = ?,
                    height = ?,
                    weight = ?,
                    eye_color = ?,
                    eye_desc = ?,
                    hair_color = ?,
                    hair_desc = ?,
                    is_uti = ?,
                    influence = ?
                    ";
            $stmt = $this->pdo->query($sql,array(
                    $blotter_id,
                    $s_lname,
                    $s_fname,
                    $s_mname,
                    $s_qualifier,
                    $s_nickname,
                    $s_citizenship,
                    $s_sex,
                    $s_status,
                    $s_birth_date,
                    $s_age,
                    $s_birth_place,
                    $s_phone,
                    $s_mobile,
                    $s_c_address,
                    $s_c_village,
                    $s_c_brgy,
                    $s_c_city,
                    $s_c_province,
                    $s_o_address,
                    $s_o_village,
                    $s_o_brgy,
                    $s_o_city,
                    $s_o_province,
                    $s_hea,
                    $s_occupation,
                    $s_work_address,
                    $s_rtv,
                    $s_email,
                    $s_is_officer,
                    $s_rank,
                    $s_unit_assigned,
                    $s_group,
                    $s_is_wpcr,
                    $s_criminal_records,
                    $s_sopc,
                    $s_height,
                    $s_weight,
                    $s_eye_color,
                    $s_eye_desc,
                    $s_hair_color,
                    $s_hair_desc,
                    $s_is_uti,
                    $s_influence
            ));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function AddVictim($blotter_id,$data) {
        try
        {
            extract($data);
            $sql = "INSERT INTO victim
                    SET blotter_id = ?,
                    lname = ?,
                    fname = ?,
                    mname = ?,
                    qualifier = ?,
                    nickname = ?,
                    citizenship = ?,
                    sex = ?,
                    status = ?,
                    birth_date = ?,
                    age = ?,
                    birth_place = ?,
                    phone = ?,
                    mobile = ?,
                    c_address = ?,
                    c_village = ?,
                    c_brgy = ?,
                    c_city = ?,
                    c_province = ?,
                    o_address = ?,
                    o_village = ?,
                    o_brgy = ?,
                    o_city = ?,
                    o_province = ?,
                    hea = ?,
                    occupation = ?,
                    work_address = ?,
                    email = ?
                    ";
            $stmt = $this->pdo->query($sql,array(
                    $blotter_id,
                    $v_lname,
                    $v_fname,
                    $v_mname,
                    $v_qualifier,
                    $v_nickname,
                    $v_citizenship,
                    $v_sex,
                    $v_status,
                    $v_birth_date,
                    $v_age,
                    $v_birth_place,
                    $v_phone,
                    $v_mobile,
                    $v_c_address,
                    $v_c_village,
                    $v_c_brgy,
                    $v_c_city,
                    $v_c_province,
                    $v_o_address,
                    $v_o_village,
                    $v_o_brgy,
                    $v_o_city,
                    $v_o_province,
                    $v_hea,
                    $v_occupation,
                    $v_work_address,
                    $v_email
            ));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function AddChildInConflict($blotter_id,$data) {
        try
        {
            extract($data);
            $sql = "INSERT INTO child_in_conflict
                    SET blotter_id = ?,
                    g_name = ?,
                    g_address = ?,
                    g_phone = ?,
                    g_mobile = ?,
                    diversion_mechanism = ?,
                    distinguishing_features = ?
                    ";
            $stmt = $this->pdo->query($sql,array(
                    $blotter_id,
                    $c_g_name,
                    $c_g_address,
                    $c_phone,
                    $c_mobile,
                    $c_diversion_mechanism,
                    $c_distinguishing_features
            ));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function DeleteBlotter($id)
    {
        try
        {
            $sql = "UPDATE blotter
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
    
    public function GetBlotterById($id)
    {
        try
        {
            $sql = "SELECT * FROM blotter WHERE id = ?";
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
    
    public function GetReporterByBlotterId($id)
    {
        try
        {
            $sql = "SELECT * FROM reporting WHERE blotter_id = ?";
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
    
    public function GetSuspectsByBlotterId($id)
    {
        try
        {
            $sql = "SELECT * FROM suspect WHERE blotter_id = ?";
            $stmt = $this->pdo->query($sql,array($id));
            $result = $stmt->result();
            return $result;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }

}
?>