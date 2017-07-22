<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session'); 
        $this->load->model('AdminModel','model');
        $this->load->helper('url');
        if(!session_id())
        {
            session_start();
        }
        
        $this->load->library('AuthLogin');
        if($GLOBALS['method'] != 'login')
        {
            if(!$this->authlogin->checkIfLogin('admin'))
            {
                header("location: /admin/login");
            }
        }
    }
    
    public function Login()
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $user_data = null;
            $stmt = $this->model->login($_POST['username'],$_POST['password']);
            foreach($stmt->result() as $row)
            {
                $user_data = (array) $row;
            }

            if($user_data != null)
            {
                $_SESSION['admin']['login'] = TRUE;
                $_SESSION['admin']['user_id'] = $user_data['id'];
                $_SESSION['admin']['session_id'] = session_id();
                $this->authlogin->SetSessionId($user_data['id'],session_id());
                header("location:/admin");
            }
            else
            {
                $this->load->view('Admin/Login');
            }
        }
        else
        {
            $this->load->view('Admin/Login');
        }
    }
    
    public function Logout()
    {
        unset($_SESSION['admin']);
        header("location: /admin/login");
    }

    public function index()
    {
        $this->AppUsers();
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
        
        if(isset($_SESSION['message']))
        {
            $data['showMessage'] = 'true';
            $data = array_merge($data,$_SESSION['message']);
            unset($_SESSION['message']);
        }
        else
        {
            $data['showMessage'] = 'false';
            $data['title'] = '';
            $data['message'] = '';
            $data['type'] = '';
        }
        
        $data['region_list'] = $this->BuildRegions();

        $this->load->view('Admin/AdminHeader');
        $this->load->view('Admin/Wanted/Wanted',$data);
        $this->load->view('Admin/AdminFooter');
    }
    
    public function BuildRegions()
    {
        $list = '';
        $stmt = $this->model->GetRegions();
        foreach ($stmt->result() as $row)
        {
            $list .= $this->load->view('Admin/Wanted/RegionList',$row,TRUE);
        }
        return $list;
    }
    
    public function ProcessWanted()
    {
        if($_POST['submit'] == 'Submit')
        {
            $this->AddWanted();
        }
        else if($_POST['submit'] == 'Update')
        {
            $this->UpdateWanted();
        }
    }
    
    public function AddWanted()
    {
        $id = $this->model->AddWanted($_POST);
        if($id > 0)
        {
            if(trim($_FILES["upload_image"]["tmp_name"]) != '')
            {
                $result = $this->SaveImage($id);
                if($result['success'])
                {
                    $this->model->SetWantedImage($id,$result['filename']);
                }
            }

            $msg = array();
            $msg['title'] = 'Good job!';
            $msg['type'] = 'success';
            $msg['message'] = 'Wanted successfully saved.';
            $msg['url'] = '/admin/wantedList';
            $this->Message($msg);
        }
        else
        {
            $msg = array();
            $msg['title'] = 'Error!';
            $msg['type'] = 'error';
            $msg['message'] = 'Failed to save to the database.';
            $msg['url'] = '/admin/wantedList';
            $this->Message($msg);
        }
    }
    
    public function UpdateWanted()
    {
        $id = $_POST['edit_id'];
        $success = $this->model->UpdateWanted($_POST);
        if($success)
        {
            if(trim($_FILES["upload_image"]["tmp_name"]) != '')
            {
                $result = $this->SaveImage($id);
                if($result['success'])
                {
                    $this->model->SetWantedImage($id,$result['filename']);
                }
                else
                {
                    $msg = array();
                    $msg['title'] = 'Can\'t update wanted photo.!';
                    $msg['type'] = 'error';
                    $msg['message'] = $result['message'];
                    $msg['url'] = '/admin/wantedList';
                    $this->Message($msg);
                    exit;
                }
            }

            $msg = array();
            $msg['title'] = 'Good job!';
            $msg['type'] = 'success';
            $msg['message'] = 'Wanted successfully updated.';
            $msg['url'] = '/admin/wantedList';
            $this->Message($msg);
        }
        else
        {
            $msg = array();
            $msg['title'] = 'Error!';
            $msg['type'] = 'error';
            $msg['message'] = 'Failed to save to the database.';
            $msg['url'] = '/admin/wantedList';
            $this->Message($msg);
        }
    }
    
    public function Message($msg)
    {
        $_SESSION['message'] = $msg;
        header("location: /admin/wantedList");
        exit;
    }
    
    public function SaveImage($id)
    {
        $status = array();
        $status['message'] = '';
        
        $target_dir = FCPATH.'images/uploads/';
        $filename = $id.'_'.basename($_FILES["upload_image"]["name"]);
        $target_file = $target_dir.$filename;
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
            $status['message'] .= "Sorry, your file is too large (maximum of 5mb). ";
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
        
        $status['filename'] = $filename;
        return $status;
    }
    
    public function GetWantedById()
    {
        $json_data = array();
        $json_data['info'] = $this->model->GetWantedById($_POST['id']);
        $json_data['info']['edit_id'] = $json_data['info']['id'];
        $json_data['info']['submit'] = 'Update';
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }
    
    public function DeleteWanted()
    {
        $json_data = array();
        $json_data['success'] = $this->model->DeleteWanted($_POST['id']);
        echo json_encode($json_data);
        exit;
    }
    
    public function WantedListAjax()
    {
        $json_data = array();
        $json_data['list'] = '';
        $stmt = $this->model->GetWantedList();
        foreach($stmt->result() as $row)
        {
            $json_data['list'] .= $this->load->view('Admin/Wanted/WantedList',$row,TRUE);
        }
        
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }
}
