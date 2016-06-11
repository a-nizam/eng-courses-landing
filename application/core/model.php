<?php

class Model
{
	public function connectDB () {
		$mysqli = new mysqli(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
		$mysqli->set_charset('utf8');
		return $mysqli;
	}
	public function get_data()
	{

	}
}