<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); 
        $this->load->model('AdminModel','model');
        $this->load->helper('url');
    }
    public function index()
    {
        $this->load->view('Admin/AdminHeader');
        $this->load->view('Admin/Admin');
        $this->load->view('Admin/AdminFooter');
    }

    public function AppUsers()
    {
        $data = array();
        $data['list'] = '';
        $stmt = $this->model->GetAppUsers();
        foreach($stmt->result() as $row)
        {
            $data['list'] .= $this->load->view('Admin/AppUsersList',$row,TRUE);
        }

        $this->load->view('Admin/AdminHeader');
        $this->load->view('Admin/AppUsers',$data);
        $this->load->view('Admin/AdminFooter');
    }

    public function AppUsersAjax()
    {
        $data = array();
        $data['list'] = '';
        $stmt = $this->model->GetAppUsers();
        foreach($stmt->result() as $row)
        {
            $data['list'] .= $this->load->view('Admin/AppUsersList',$row,TRUE);
        }

        $data['success'] = TRUE;
        echo json_encode($data);
        exit;
    }

    public function AddAppUser()
    {
        $json_data = array();
        $json_data['success'] = $this->model->AddAppUser($_POST);;
        echo json_encode($json_data);
        exit;
    }

    public function UpdateAppUser()
    {
        $json_data = array();
        $json_data['success'] = $this->model->UpdateAppUser($_POST);;
        echo json_encode($json_data);
        exit;
    }

    public function DeleteAppUser()
    {
        $json_data = array();
        $json_data['success'] = $this->model->DeleteAppUser($_POST['id']);
        echo json_encode($json_data);
        exit;
    }

    public function GetAppUserById()
    {
        $json_data = array();
        $json_data['info'] = $this->model->GetAppUserById($_POST['id']);
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }

    public function Stations()
    {
        $data = array();
        $data['list'] = '';
        $stmt = $this->model->GetStations();
        foreach($stmt->result() as $row)
        {
            $data['list'] .= $this->load->view('Admin/Stations/StationsList',$row,TRUE);
        }

        $data['district_list'] = $this->BuildDistrictList();

        $this->load->view('Admin/AdminHeader');
        $this->load->view('Admin/Stations/Stations',$data);
        $this->load->view('Admin/AdminFooter');
    }

    public function BuildDistrictList()
    {
        $list = '';
        $stmt = $this->model->GetDistricts();
        foreach($stmt->result() as $row)
        {
            $list .= $this->load->view('Admin/Stations/DistrictList',$row,TRUE);
        }

        return $list;
    }

    public function AddStation()
    {
        $json_data = array();
        $json_data['success'] = $this->model->AddStation($_POST);
        echo json_encode($json_data);
        exit;
    }

    public function StationsAjax()
    {
        $json_data = array();
        $json_data['list'] = '';
        $stmt = $this->model->GetStations();
        foreach($stmt->result() as $row)
        {
            $json_data['list'] .= $this->load->view('Admin/Stations/StationsList',$row,TRUE);
        }
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }

    public function GetStationById()
    {
        $json_data = array();
        $json_data['info'] = $this->model->GetStationById($_POST['id']);
        $json_data['info']['edit_id'] = $json_data['info']['id'];
        $json_data['info']['submit'] = 'Update';
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }

    public function UpdateStation()
    {
        $json_data = array();
        $json_data['success'] = $this->model->UpdateStation($_POST);;
        echo json_encode($json_data);
        exit;
    }

    public function DeleteStation()
    {
        $json_data = array();
        $json_data['success'] = $this->model->DeleteStation($_POST['id']);
        echo json_encode($json_data);
        exit;
    }
    
    public function WantedList()
    {
        $data = array();
        $data['list'] = '';
        $stmt = $this->model->GetWantedList();
        foreach($stmt->result() as $row)
        {
            $data['list'] .= $this->load->view('Admin/Wanted/WantedList',$row,TRUE);
        }

        $this->load->view('Admin/AdminHeader');
        $this->load->view('Admin/Wanted/Wanted',$data);
        $this->load->view('Admin/AdminFooter');
    }
    
    public function AddWanted()
    {
        $id = $this->model->AddWanted($_POST);
        $this->SaveImage();
    }
    
    public function SaveImage()
    {
        $status = array();
        $status['message'] = '';
        
        $target_dir = FCPATH.'images/uploads/';
        
        $target_file = $target_dir . basename($_FILES["upload_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["upload_image"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $status['message'] .= "File is not an image. ";
                $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            $status['message'] .= "Sorry, file already exists. ";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["upload_image"]["size"] > 500000) {
            $status['message'] .= "Sorry, your file is too large. ";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $status['message'] .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $status['message'] .= "Sorry, your file was not uploaded. ";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["upload_image"]["tmp_name"], $target_file)) {
                $status['message'] = "The file ". basename( $_FILES["upload_image"]["name"]). " has been uploaded.";
            } else {
                $status['message'] .= "Sorry, there was an error uploading your file. ";
            }
        }
        
        if($uploadOk)
        {
            $status['success'] = TRUE;
        }
        else
        {
            $status['success'] = FALSE;
        }
        
        return $status;
    }
}
