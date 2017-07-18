<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
        
        public function appusers()
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
}
