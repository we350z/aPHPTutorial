<?php
Class Database {
	// Class properties (member variables) must be defined as public, private, or protected
	// var is for backwords compatibility with PHP4 it will be treated as public 
	var $host = 'localhost';  // var keyword
	// Constants cannot change value and differ from normal variables in that you don't use the $ symbol to declare or use them.
	public const database = 'znwdnett_modernbill';
	private const mysql_user = 'znwdnett_modernb';
	protected const mysql_password = 'Green$420';

	public function getHost()
	{
		return $this->host;
	}

	public function getDatabase()
	{
		return $this->database;
	}

	public function getUser()
	{
		return $this->mysql_user;
	}

	public function getPassword()
	{
		return $this->mysql_password;
	}
}
?>