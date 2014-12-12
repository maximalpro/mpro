<?php

class SOCIAL2
{
    //публичные переменные бд
    public $dbo=null;
    
    //подключаем бд (параметры необязательные)
    public function sdb($db_host=null, $db_user=null, $db_pass=null, $db_name=null)
    {
        if(!$db_host) $db_host=_S2_DB_HOST_;
        if(!$db_name) $db_name=_S2_DB_NAME_;
        if(!$db_user) $db_user=_S2_DB_USER_;
        if(!$db_pass) $db_pass=_S2_DB_PASS_;
        
        try {
            $this->$dbo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
        } catch (PDOException $e) {
            die("Error!: " . $e->getMessage() . "<br/>");
        }
    }
    
    function login($l, $p, $ip=0, $try=0) 
    {
        if($try>5) return 13;
        
        if(1) return 5;
    }
    
    public function auth($l, $p)
    {
        switch($this->login($l, $p))
        {
            case 5:
                die('logged');
                break;
            default:
                break;
        }
    }
}

?>