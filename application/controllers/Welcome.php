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
        $data['wanted_list'] = $this->BuildWantedList();
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
        $json_data['caption'] = "From " . date("M d Y", strtotime($date_from)) . ' To ' . date("M d Y", strtotime($date_to));
        echo json_encode($json_data);
        exit;
    }
    
    public function GetCrimeAnalysisByYear()
    {
        $date_from = date('Y-m-d',strtotime($_POST['year'].'-1-1'));
        $date_to = date('Y-m-d',strtotime($_POST['year'].'-12-31'));
        $json_data = array();
        $content = $this->model->GetCrimeAnalysisByDateRange($date_from,$date_to);
        $json_data['content'] = $content->result();
        $json_data['success'] = TRUE;
        $json_data['caption'] = "From " . date("M d Y", strtotime($date_from)) . ' To ' . date("M d Y", strtotime($date_to));
        echo json_encode($json_data);
        exit;
    }
    
    public function GetCrimeAnalysisByWeek()
    {
        $week_data = explode('-', $_POST['week']);
        $year = $week_data[0];
        $week = $week_data[1];
        $week = ltrim($week, 'W');

        $date_from = date('Y-m-d', strtotime($year."W".str_pad($week,2,"0",STR_PAD_LEFT)));
        $date_to =  date('Y-m-d', strtotime("+6 days", strtotime($date_from)));
        
        $json_data = array();
        $content = $this->model->GetCrimeAnalysisByDateRange($date_from,$date_to);
        $json_data['content'] = $content->result();
        $json_data['success'] = TRUE;
        $json_data['caption'] = "From " . date("M d Y", strtotime($date_from)) . ' To ' . date("M d Y", strtotime($date_to));
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
        $json_data['caption'] = "Date: " . date("M d Y", strtotime($day));
        echo json_encode($json_data);
        exit;
    }
    
    public function BuildWantedList()
    {
        $wanted_list = '';
        $list = $this->model->GetWantedList();
        foreach ($list->result() as $row)
        {
            $img = FCPATH."images/uploads/".$row->image;
            if(!file_exists($img) || (trim($row->image) == ''))
            {
                $row->image = '/images/wanted_default.png';
            }
            else
            {
                $row->image = '/images/uploads/'.$row->image;
            }
            
            $wanted_list .= $this->load->view('HomePage/WantedList',$row,TRUE);
        }
        
        return $wanted_list;
    }
}
