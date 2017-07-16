<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webservice extends CI_Controller {

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
            $this->load->model('WebserviceModel','model');
        }
	public function index()
	{
	}
        
        public function Signin()
        {
            $json_data = array();
            if(isset($_POST['username']) && isset($_POST['password']))
            {
                $username = $_POST['username'];
                $password = sha1($_POST['password']);
                
                $valid = $this->model->AuthenticateUser($username,$password);
                if($valid)
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
