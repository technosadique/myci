<?php namespace App\Controllers;
use App\Libraries\Hashh;
use App\Libraries\CustomLib;


class Test extends BaseController
{   
    public function __construct()
    {
		//helper(['myhelper']);
    }
	
	function index(){	
		
		return view('test');
	}
	
	function check(){
		$pwd=$_POST['pwd'];
		echo Hashh::make($pwd);
	}
	
	function today(){
		echo CustomLib::today();
	}
	
	function hello(){   
		$c=new CustomLib(); 
		return $c->hello();
	}
	
	function myhelper(){
		helper(['myhelper']);
		welcome();
	}	
}