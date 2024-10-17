<?php namespace App\Libraries;

class Hashh{

	public static function make($input){ 
		return password_hash($input,PASSWORD_BCRYPT);
	}

}	

?>