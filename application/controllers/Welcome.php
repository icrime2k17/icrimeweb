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
    
    public function GetCrimeAnalysisByMonth()
    {
        $date_from = date('Y-m-d',strtotime($_POST['year'].'-'.$_POST['month'].'-1'));
        $date_to = date("Y-m-t", strtotime($date_from));
        $json_data = array();
        $content = $this->model->GetCrimeAnalysisByDateRange($date_from,$date_to);
        $json_data['content'] = $content->result();
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }
    
    public function GetCrimeAnalysisByYear()
    {
        $date_from = date('Y-m-d',strtotime($_POST['year'].'-01-1'));
        $date_to = date('Y-m-d',strtotime($_POST['year'].'-12-31'));
        $json_data = array();
        $content = $this->model->GetCrimeAnalysisByDateRange($date_from,$date_to);
        $json_data['content'] = $content->result();
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }
    
    public function GetCrimeAnalysisByDay()
    {
        $day = $_POST['day'];
        $json_data = array();
        $content = $this->model->GetCrimeAnalysisByDay($day);
        $json_data['content'] = $content->result();
        $json_data['success'] = TRUE;
        echo json_encode($json_data);
        exit;
    }
}
