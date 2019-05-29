<?php
	class Database{
		private static $_dbName='db_ecomm';
		private static $_dbHost='localhost';
		private static $_dbUser='root';
		private static $_dbPass='';
		private static $_cont=null;

		public function __construc(){
			die('Init function is not allowed');
		}

		// One connection through whole application
		public static function connect(){
			if( self::$_cont == null ){
				try{
					self::$_cont=new PDO("mysql:host=".self::$_dbHost.";dbname=".self::$_dbName,self::$_dbUser,self::$_dbPass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				}catch( PDOException $e ){
					die($e->getMessage());
				}
			}
			return self::$_cont;
		}

		//Close connection
		public static function disconnect()
		{
			self::$_cont=null;
		}
	}
?>