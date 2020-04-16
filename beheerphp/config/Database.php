<?php
class Database {
	private $_connection;
	private static $_instance; //Enigste Instance
	private $_host = "localhost";
	private $_username = "festivaluser";
	private $_password = "tsdf8E6f";
	private $_database = "festival";
	/*
	Als je instance van database wilt
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // Als er geen instance is eentje aanmaken
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	public function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username,	$this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
				 E_USER_ERROR);
		}
	}
	// Geen duplicatie van database
	private function __clone() { }
	// msqli connectie
	public function getConnection() {
		return $this->_connection;
	}
}


?>