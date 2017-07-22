<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
   
class AuthLogin {

    public function checkIfLogin($mode) 
    {
        if(!session_id())
        {
            session_start();
        }
        
        if($mode == 'admin')
        {
            if(isset($_SESSION['admin']))
            {
                if($_SESSION['admin']['login'])
                {
                    $user_id = $_SESSION['admin']['user_id'];
                    $session_id = $_SESSION['admin']['session_id'];

                    $this->pdo = $this->load->database('pdo', true);
                    try
                    {
                        $sql = "SELECT * FROM app_users 
                                WHERE id = ? 
                                AND session_id = ?
                                AND enabled = 1";
                        $stmt = $this->pdo->query($sql,array($user_id,$session_id));
                        $result = $stmt->result();
                        $data =  (array) $result[0];
                        if(count($data) > 0)
                        {
                            return TRUE;
                        }
                        else
                        {
                            return FALSE;
                        }
                    } 
                    catch (Exception $ex) 
                    {
                        return FALSE;
                    }

                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                return FALSE;
            }
        }
        else if ($mode == 'app') 
        {
        
        }
    }
}

?>
	