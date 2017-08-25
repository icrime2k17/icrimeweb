<?php
Class WelcomeModel extends CI_Model {

    Public function __construct() {
        parent::__construct();
        $this->pdo = $this->load->database('pdo', true);
    }
    
    public function GetBlotterYears() {
        try
        {
            $sql = "SELECT DISTINCT(YEAR(date_of_incident)) as years 
                    FROM blotter 
                    WHERE enabled = 1 
                    ORDER BY years DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
}
?>