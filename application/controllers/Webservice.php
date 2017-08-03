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
}
