<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CustomerModel;

class Customer extends BaseController
{
	 protected $helpers = [];

    public function __construct()
    {
        helper(['url', 'form', 'custom']);
        $session = \Config\Services::session();
    }
	public function index()
	{
		return view('customer-listing');
	}
	
	public function get_customer() { 
        $post = $_POST;
        $model = new CustomerModel();
        // Get form data
        $form_data = [];
		 
        if(isset($post['form_data']) && $post['form_data']!="")
            parse_str($post['form_data'], $form_data);


        // Check for sorting
        $sort = ['id', 'desc'];
        if(isset($post['order']) && !empty($post['order'])){
            $sort = [$form_data["sortcolumn__".$post['order'][0]['column']], $post['order'][0]['dir']];
        }		

	    if (isset($post["column"]) && ($post["column"] == "search_text") && !empty($post["value"])) {
			 $searchtxt = $post["value"];
		 }
		 
        $result = $model->get_customer($form_data, $post['length'], $post['start'], false, $sort, $searchtxt);
		
		//echo '<pre>'; print_r($result); die;
		$result_count=0;		
        
		if(count($result) !=''){ 
        $result_count = $model->get_customer($form_data, "", "", true); 		
		}

        $data = [];
        $seq_no = $post['start'];
        $count=1;		
		
        foreach($result as $row){         
           

            $sub_array = [];
            $sub_array[] = '<div><label class="d-block" for="' . $row['id'] . '"><input type="checkbox" class="checkbox_animated mcheck" value="' . $row["id"] . '" data-id="' . $row["id"] . '"></label></div>';
            
            $sub_array[] = '<div>' .$row["first_name"].'</div>';
            $sub_array[] = '<div>' .$row["last_name"].'</div>';
            $sub_array[] = '<div>' .$row["phone"].'</div>';           
			$sub_array[] = '<td>                    
			<a  href="javascript:void(0);" onclick="gotoedit(' . $row["id"] . ')" class="customer_edit" id="' . $row["id"] . '" ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit text-muted"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></a>                    
			<a href="javascript:void(0)" class="delete" id="' . $row["id"] . '"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-muted"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></td>';
                
            $data[] = $sub_array;		
        }

        $output = array(
            "draw" => intval($post["draw"]) ,
            "recordsTotal" => count($result),
            "recordsFiltered" => $result_count,
            "data" => $data
        );
        
        echo json_encode($output);
    } 

	public function delete_customer() { 
        $model = new CustomerModel();
        echo $model->delete_customer($_POST);
    } 
	
	public function bulkdeletecustomer() {
	$model = new CustomerModel();
	if ($_POST) {
		$data = $model->bulkdeletecustomer($_POST);
		echo $data;
	} 
    }
	
	public function save_data() {        
        $model = new CustomerModel();       
        if ($_POST) {				
			$customer_id = $model->save_data($_POST);
            echo $customer_id;			
        }
    }
	
	public function customer_add(){
        /* if (!$_SESSION['user_id']) {
			$_SESSION['page_url']=base_url().'/currency_add/';
            return redirect()->to(base_url() . '/login');
        } */
        
        $data = [];
        $model = new CustomerModel();    
       
		//$data['customer'] = get_single_row_helper("customers", "id,first_name,last_name,phone", "in_deleted=0");     
       return view('customer-add', $data);     
    }
   
    public function edit_customer_data($id = false) { 
        /* if (!$_SESSION['user_id']) {
			$_SESSION['page_url']=base_url().'/currency_edit/'.$id;
            return redirect()->to(base_url() . '/login');
        } */
        
        $id = isset($id) ? $id : '';
        $data = [];
        $model = new CustomerModel();       
        	
        $data['customer'] = get_single_row_helper("customers", "id,first_name,last_name,phone", "in_deleted=0 and id=".$id);
        //echo "<pre>"; print_r($data); die;
		
		if ($data['customer']['id'] == '') {
            $_SESSION['error'] = 'Customer does not exist.';
            $session = session();
            $session->markAsFlashdata('error');
            return redirect()->to(base_url());
        }
		
        return view('customer-edit', $data);
    }
	
    public function edit_customer(){ 
        $model = new CustomerModel();
		
		//print_r($_POST); die;
        $customer_details = $model->edit_customer($_POST);
        echo json_encode($customer_details);
    }

}
