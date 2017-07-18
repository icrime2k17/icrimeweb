<?php
Class AdminModel extends CI_Model {

    Public function __construct() {
        parent::__construct();
        $this->pdo = $this->load->database('pdo', true);
    }

    public function GetAppUsers() {
        try
        {
            $sql = "SELECT * FROM app_users ORDER BY lastname,firstname,username";
            $stmt = $this->pdo->query($sql);
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function GetAppUserById($id)
    {
        try
        {
            $sql = "SELECT id,firstname,lastname,position,username FROM app_users WHERE id = ?";
            $stmt = $this->pdo->query($sql,array($id));
            $result = $stmt->result();
            return (array) $result[0];
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }

    public function AddAppUser($data) {
        try
        {
            extract($data);
            $password = sha1($password);
            $sql = "INSERT INTO app_users
                    SET username = ?,
                    password = ?,
                    lastname = ?,
                    firstname = ?,
                    position = ?
                    ";
            $stmt = $this->pdo->query($sql,array($username,$password,$lastname,$firstname,$position));
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function UpdateAppUser($data) {
        try
        {
            extract($data);
            if(trim($password) == '')
            {
                $sql = "UPDATE app_users
                        SET username = ?,
                        lastname = ?,
                        firstname = ?,
                        position = ?
                        WHERE id = ?
                        ";
                $stmt = $this->pdo->query($sql,array($username,$lastname,$firstname,$position,$edit_id));
            }
            else 
            {
                $password = sha1($password);
                $sql = "UPDATE app_users
                        SET username = ?,
                        password = ?,
                        lastname = ?,
                        firstname = ?,
                        position = ?
                        WHERE id = ?
                        ";
                $stmt = $this->pdo->query($sql,array($username,$password,$lastname,$firstname,$position,$edit_id));
            }
            return $stmt;
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }
    
    public function AuthenticateUser($username,$password) 
    {
        try
        {
            $sql = "SELECT id FROM app_users where username = ? and password = ?";
            $stmt = $this->pdo->query($sql,array($username,$password));
            return $stmt->result();
        } 
        catch (Exception $ex) 
        {
            echo $ex;
            exit;
        }
    }

}

?> 