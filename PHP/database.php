<?php

/*
 * To change this template use Tools | Templates.
 */

/**
 * Description of newPHPClass
 *
 * @author rsymonds
 */
class database {
    private $host, $username, $password, $database;
    public $link;


    
    function getConnection() {
    		$host = 'localhost';
    		$username = 'northryd_admin';
    		$password = 'n0rthryde';
    		$database = 'northryd_news';
        
			if (!$link = mysql_connect($host,$username,$password)) {
				die(mysql_errno().' : '.mysql_error());
			}
			
			if (!mysql_select_db($database)) {
				die(mysql_errno().' : '.mysql_error());
			}

    }

    function closeConnection() {
    	mysql_close($link);
    }
}

?>