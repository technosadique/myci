<?php namespace App\Libraries;

class CustomLib{
	
	public function hello(){
		return "this is custom library";
	}
	
	public static function today(){		
		return 'Todays date: '.date('Y-m-d');
	}
}
