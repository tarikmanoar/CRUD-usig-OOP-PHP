<?php 
	include "config.php";
	// class DB{
	// 	private static $dbconn;
	// 	Public static function connection(){
	// 		if (!isset(self::$dbconn)) {
	// 			try{
	// 			self::$dbconn = new PDO('mysql:host='.DB_HOST.';dbconn='.DB_NAME,DB_USER,DB_PASS);
	// 			}catch(PDOException $e){
	// 				echo 'Connection Failed!'.$e->getMessege();
	// 			}
	// 		}
	// 		return self::$dbconn;
	// 	}
	// 	public static function prepare($sql){
	// 		return self::connection()->prepare($sql);
	// 	}
	// }
	class Database{
		public $dbconn;
	    public function __construct(){
	        $this->dbconn= new mysqli("localhost","root","","php_oop");
	        if($this->dbconn){
		    	// echo 'SUCCESS';
		    }else{
		    	echo 'ERROR';
		    }
	    }
	    
	}
	// $db = new Database;
