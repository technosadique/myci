<?php namespace App\Controllers;
use App\Libraries\MyLib;



class Mytest extends BaseController
{   
    public function __construct()
    {
		helper(['hello','myhelper']);
    }
	
	
	
	public function index(){
		$a=new MyLib();
		$a->mytest();
		
		hello();
		welcome();
		
	}
	
}