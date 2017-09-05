<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webservice extends CI_Controller {
    
    public function __construct() 
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
        $this->load->model('WebserviceModel','model');
    }
    
    public function index()
    {
        echo "iCrime Web Service";
    }

    public function Signin()
    {
        $json_data = array();
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $username = $_POST['username'];
            $password = sha1($_POST['password']);

            $stmt = $this->model->AuthenticateUser($username,$password);
            if(count($stmt) > 0)
            {
                if($stmt[0]->is_citizen == 1)
                {
                    $json_data['type'] = 'c';
                }
                else
                {
                    $json_data['type'] = 'a';
                }
                $json_data['id'] = $stmt[0]->id;
                $json_data['success'] = TRUE;
            }
            else
            {
                $json_data['success'] = FALSE;
                $json_data['message'] = 'Login failed';
            }
        }
        else
        {
            $json_data['success'] = FALSE;
            $json_data['message'] = 'Invalid Action';
        }

        echo json_encode($json_data);
        exit;
    }
    
    public function GetStations()
    {
        $json_data = array();
        $json_data['list'] = array();
        $stmt = $this->model->GetStations();
        foreach($stmt->result() as $row)
        {
            array_push($json_data['list'], $row);
        }
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }
    
    public function GetBlotters()
    {
        $json_data = array();
        $json_data['list'] = array();
        $stmt = $this->model->GetBlotters();
        foreach($stmt->result() as $row)
        {
            $row->date_of_incident = date("M d o", strtotime($row->date_of_incident));
            $row->time_of_incident = date("h:i a", strtotime($row->time_of_incident));
            
            array_push($json_data['list'], $row);
        }
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }
    
    public function GetWanteds()
    {
        $json_data = array();
        $json_data['list'] = array();
        $stmt = $this->model->GetWantedList();
        foreach($stmt->result() as $row)
        {
            $img = FCPATH."images/uploads/".$row->image;
            if(!file_exists($img) || (trim($row->image) == ''))
            {
                $row->image = 'img/wanted_default.png';
            }
            else
            {
                $row->image = 'http://'.$_SERVER['HTTP_HOST'].'/images/uploads/'.$row->image;
            }
            
            array_push($json_data['list'], $row);
        }
        
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }
    
    public function UploadFromCam()
    {
        $file = $_GET['filename'].'.jpg';
        move_uploaded_file($_FILES["file"]["tmp_name"], FCPATH.'images/reports/'.$file);
    }
    
    public function SubmitReport()
    {
        $json_data = array();
        if(trim($_POST['image']) != '')
        {
            $_POST['image'] = $_POST['image'].'.jpg';
        }
        
        $json_data['success'] = $this->model->SubmitReport($_POST);
        echo json_encode($json_data);
        exit;
    }
    
    public function Register()
    {
        $json_data = array();
        if($this->isUsernameAvailable($_POST['username']))
        {
            if($this->isNumberAvailable($_POST['mobile']))
            {
                $id = $this->model->Register($_POST);
                $json_data['id'] = $id;
                $json_data['type'] = 'c';
                if($id > 0)
                {
                    $json_data['success'] = TRUE;
                }
                else
                {
                    $json_data['success'] = FALSE;
                    $json_data['message'] = "Error in inserting to the database";
                }
            }
            else
            {
                $json_data['success'] = FALSE;
                $json_data['message'] = "Mobile number is already in used.";
            }
        }
        else
        {
            $json_data['success'] = FALSE;
            $json_data['message'] = "Username is already in used.";
        }
        echo json_encode($json_data);
        exit;
    }
    
    public function isUsernameAvailable($username)
    {
        $is_exist = $this->model->CheckIfUsernameExist($username);
        if(!empty($is_exist->result()))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function isNumberAvailable($username)
    {
        $is_exist = $this->model->CheckIfNumberExist($username);
        if(!empty($is_exist->result()))
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    
    public function GetReportHistory()
    {
        $id = $_POST['id'];
        $json_data = array();
        $json_data['list'] = array();
        $stmt = $this->model->GetReportHistoryByUser($id);
        foreach ($stmt->result() as $row)
        {
            $row->date_reported = date("M d o", strtotime($row->date_reported));
            
            $img = FCPATH."images/reports/".$row->image;
            if(!file_exists($img) || (trim($row->image) == ''))
            {
                $row->image = '';
            }
            else
            {
                $row->image = 'http://'.$_SERVER['HTTP_HOST'].'/images/reports/'.$row->image;
            }
            
            array_push($json_data['list'], $row);
        }
        if(!empty($json_data['list']))
        {
            $json_data['success'] = TRUE;
        }
        else
        {
            $json_data['success'] = FALSE;
            $json_data['message'] = "No history found.";
        }
        echo json_encode($json_data);
        exit;
    }
    
    public function GetReportComments()
    {
        $id = $_POST['id'];
        $json_data = array();
        $json_data['success'] = TRUE;
        $json_data['comments'] = array();
        $stmt = $this->model->GetCommentsById($id);
        foreach($stmt->result() as $row)
        {
            $row->date_added = date("M d o", strtotime($row->date_added));
            array_push($json_data['comments'],$row);
        }
        echo json_encode($json_data);
        exit;
    }
    
    public function PostComment()
    {
        $json_data = array();
        $json_data['success'] = $this->model->AddComment($_POST);
        echo json_encode($json_data);
        exit;
    }
}
