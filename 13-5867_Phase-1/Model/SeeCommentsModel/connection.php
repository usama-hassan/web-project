<?php

class connection
{ 
	   private static function getConnection() 
  	 {
  		  $conn = null;
    	  $conn = new mysqli('localhost','root','','tripadvisor');
		  return $conn;
  	 }

  	 public static function connectDatabase() 
  	 {
		  return connection::getConnection();
  	 }
}

?>