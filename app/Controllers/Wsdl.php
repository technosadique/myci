<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\WsdlModel;

class Wsdl extends BaseController
{
	 protected $helpers = [];

    public function __construct()
    {
        helper(['url', 'form', 'custom']);
        $session = \Config\Services::session();
    }
	
/* 
using POSTMAN
http://localhost/myci/wsdl/customer_detail?id=2 (GET,params)
http://localhost/myci/wsdl/customer_list(GET)
http://localhost/myci/wsdl/customer_add(POST,BODY,form-data)
http://localhost/myci/wsdl/customer_update(POST,BODY,form-data)
http://localhost/myci/wsdl/customer_delete?id=49(DELETE,params)
 */	
	
	
	function customer_list(){
		
		$userid=1;
		$token='123456';
		
		if($userid!='' && $token!=''){
			
			$model=new WsdlModel();
			$customer_list=$model->customer_list();
			//echo '<pre>'; print_r($customer_list);
			$data = array("result" => 1,'customer_list'=>$customer_list,);
			header('Content-type: application/json');
			echo json_encode($data);
			
		}
		else{
			$err_msg = "userId and Token is required.";
			$data = array("result" => 104, "err_msg" => $err_msg);
			header('Content-type: application/json');
			echo json_encode($data);
		}
		
	}
	
	
	
	function customer_detail(){	
		
			$id=$_GET['id'];
			if($id == ''){
			$msg='Id is required';
			$data = array("result" => 104, "msg" => $msg);
			header('Content-type: application/json');
			echo json_encode($data);die;
			}
			$model=new WsdlModel();
			$customer_detail=$model->customer_detail($id);
			//echo '<pre>'; print_r($customer_detail);
			$data = array("result" => 1,'customer_detail'=>$customer_detail,);
			header('Content-type: application/json');
			echo json_encode($data);		
	}
	
	
	
	
	function customer_update(){	
		if($_POST['first_name'] == ''){
			$msg='first name is required';
			$data = array("result" => 104, "msg" => $msg);
			header('Content-type: application/json');
			echo json_encode($data);die;
		}
		if($_POST['last_name'] == ''){
			$msg='last name is required';
			$data = array("result" => 104, "msg" => $msg);
			header('Content-type: application/json');
			echo json_encode($data);die;
		}
		if($_POST['phone'] == ''){
			$msg='phone is required';
			$data = array("result" => 104, "msg" => $msg);
			header('Content-type: application/json');
			echo json_encode($data);die;
		}
		
		$customer=array(
			'first_name'=>$_POST['first_name'],
			'last_name'=>$_POST['last_name'],
			'phone'=>$_POST['phone'],			
			'id'=>$_POST['id'],			
		);		
		
		$model=new WsdlModel();
		$model->customer_update($customer);
		$msg='Updated successfully';
		$data = array("result" => 1, "msg" => $msg);
		header('Content-type: application/json');
		echo json_encode($data);
		
	}
	
	function customer_add(){
		
		if($_POST['first_name'] == ''){
			$msg='first name is required';
			$data = array("result" => 104, "msg" => $msg);
			header('Content-type: application/json');
			echo json_encode($data);die;
		}
		if($_POST['last_name'] == ''){
			$msg='last name is required';
			$data = array("result" => 104, "msg" => $msg);
			header('Content-type: application/json');
			echo json_encode($data);die;
		}
		if($_POST['phone'] == ''){
			$msg='phone is required';
			$data = array("result" => 104, "msg" => $msg);
			header('Content-type: application/json');
			echo json_encode($data);die;
		}
			$customer=array(
				'first_name'=>$_POST['first_name'],
				'last_name'=>$_POST['last_name'],
				'phone'=>$_POST['phone'],			
			);	
			
			
		$model=new WsdlModel();
		$last_insert_id=$model->customer_add($customer);	
		
		$msg='Added successfully';
		$data = array("result" => 1, "msg" => $msg,'id'=>$last_insert_id);
		header('Content-type: application/json');
		echo json_encode($data);
		
	}
	
	function customer_delete(){
		
			$id=$_GET['id'];	
			if($id == ''){
			$msg='Id is required';
			$data = array("result" => 104, "msg" => $msg);
			header('Content-type: application/json');
			echo json_encode($data);die;
			}
		
			
			$model=new WsdlModel();
			$model->customer_delete($id);
			$msg='Deleted successfully';
			$data = array("result" => 1, "msg" => $msg);
			header('Content-type: application/json');
			echo json_encode($data);
		
		
	}
}
