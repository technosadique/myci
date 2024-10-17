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
	
/* http://localhost/myci/wsdl/customer_list
http://localhost/myci/wsdl/customer_update
http://localhost/myci/wsdl/customer_detail
http://localhost/myci/wsdl/customer_delete
http://localhost/myci/wsdl/customer_add
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
		$userid=1;
		$token='123456';
		
		if($userid!='' && $token!=''){
			$id=7;
			$model=new WsdlModel();
			$customer_detail=$model->customer_detail($id);
			//echo '<pre>'; print_r($customer_detail);
			$data = array("result" => 1,'customer_detail'=>$customer_detail,);
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
	
	
	
	
	function customer_update(){
		$userid=1;
		$token='123456';
		 if($userid!='' && $token!=''){
			$first_name='mohd';
			$last_name='arif';
			$phone='9999999999';
			$id=1;
			$customer=array(
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'phone'=>$phone,
				'id'=>$id,
			);
		
		
		$model=new WsdlModel();
		$model->customer_update($customer);
		$msg='Updated successfully';
		$data = array("result" => 1, "msg" => $msg);
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
	
	function customer_add(){
		$userid=1;
		$token='123456';
		 if($userid!='' && $token!=''){
			$first_name='watson';
			$last_name='watson';
			$phone='7777774444';
			$id=1;
			$customer=array(
				'first_name'=>$first_name,
				'last_name'=>$last_name,
				'phone'=>$phone,				
			);		
		$model=new WsdlModel();
		$last_insert_id=$model->customer_add($customer);	
		
		$msg='Added successfully';
		$data = array("result" => 1, "msg" => $msg,'id'=>$last_insert_id);
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
	
	function customer_delete(){
		$userid=1;
		$token='123456';
		if($userid!='' && $token!=''){			
			$id=33;	
			
			$model=new WsdlModel();
			$model->customer_delete($id);
			$msg='Deleted successfully';
			$data = array("result" => 1, "msg" => $msg);
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
}
