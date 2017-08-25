<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('WelcomeModel','model');
    }
    
    public function index()
    {
        $data = array();
        $data['current_month'] = date('m');
        $data['years'] = $this->BuildBlotterYears();
        $this->load->view('welcome_message',$data);
    }
    
    public function BuildBlotterYears()
    {
        $options = '<option value="">Select Year</option>';
        $current_year = date('Y');
        $years = $this->model->GetBlotterYears();
        foreach ($years->result() as $y)
        {
            if($current_year == $y->years)
            {
                $options .= '<option value="'.$y->years.'" selected>'.$y->years.'</option>';
            }
            else
            {
                $options .= '<option value="'.$y->years.'">'.$y->years.'</option>';
            }
        }
        return $options;
    }
}
