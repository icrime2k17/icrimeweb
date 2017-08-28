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
    
    public function GetCrimeAnalysisByDateRange($date_from,$date_to) {
        try
        {
            $sql = "SELECT c.crime as label,(SELECT COUNT(id) FROM blotter WHERE incident = c.crime
                    AND (date_of_incident >= ? AND date_of_incident <= ?)) as value 
                    FROM crimes as c
                    ORDER BY c.crime";
            $stmt = $this->pdo->query($sql,array($date_from,$date_to));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetCrimeAnalysisByDay($day) {
        try
        {
            $sql = "SELECT c.crime as label,(SELECT COUNT(id) FROM blotter WHERE incident = c.crime
                    AND date_of_incident = ?) as value 
                    FROM crimes as c
                    ORDER BY c.crime";
            $stmt = $this->pdo->query($sql,array($day));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetWantedList()
    {
        try
        {
            $sql = "SELECT w.id,w.lastname,w.firstname,w.middlename,w.alias,r.region,w.offenses,w.reward,w.image 
                    FROM wanted as w
                    LEFT JOIN region as r
                    ON w.region = r.id
                    WHERE enabled = 1
                    ORDER BY sort,lastname,firstname";
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