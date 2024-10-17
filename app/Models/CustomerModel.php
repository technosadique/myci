<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class CustomerModel extends Model {
    protected $db;   
	
	public function get_customer($form_data, $limit = "", $offset = "", $count_only = false, $order_by = ['id', 'asc'], $searchtxt = ''){		
		
		$builder = $this->db->table('customers');
        $builder->select("id,first_name,last_name,phone");   
		
		if(isset($form_data['searchtxt']) && $form_data['searchtxt'] !=''){
			 $builder->where("(first_name like '%".trim($form_data['searchtxt'])."%' OR last_name like '%".trim($form_data['searchtxt'])."%' OR phone like '%".trim($form_data['searchtxt'])."%')");
		}				

		$builder->where("in_deleted", 0);     
        if($count_only)
            return $builder->countAllResults();
        $builder->orderBy($order_by[0], $order_by[1]);            
        if($limit!="")
            $builder->limit($limit, $offset);  
      
        $result =  $builder->get()->getResultArray();		
        return $result;	
	}	

	public function delete_customer($post)
    {        
        if (!empty($post["id"])) {
            // delete in mysql db
            $builder = $this->db->table('customers');
            $builder->where('id', $post["id"]);
            $builder->update(['in_deleted' => 1]);           
            echo "success";
        }
    }
   
    public function bulkdeletecustomer($post)
    {
        $idArr = explode(',', $post['selectedid']);
        foreach ($idArr as $key => $id) {
            if ($idArr[$key] != '') {
                $data = array("in_deleted" => 1, "id" => $id);                                
                // Delete in mysql db
                $builder = $this->db->table('customers');
                $builder->where(['id' => $id]);
                $builder->update($data);
            }
        }
        return 1;
    }

	public function save_data($post) {			
            
			if (empty($post["customer_id"])) {
            $data = array(  
							"first_name"		=> ($post["first_name"])?$post["first_name"]:'',
							"last_name"			=> ($post["last_name"])?$post["last_name"]:'',
							"phone"				=> ($post["phone"])?$post["phone"]:'',
							"in_deleted"		=> 0,									
						);            
            $builder = $this->db->table('customers');
            $builder->insert($data);
            $lastInsertId = $this->db->insertId();  
			return $lastInsertId;
			}
			  
			else{			
			// edit 
			$data = array(  
							"first_name"		=> ($post["first_name"])?$post["first_name"]:'',
							"last_name"			=> ($post["last_name"])?$post["last_name"]:'',
							"phone"				=> ($post["phone"])?$post["phone"]:'',
							"in_deleted"		=> 0,									
						);          
        
			$builder = $this->db->table('customers');
			$builder->where('id', $post["customer_id"]);
			$builder->update($data); 
			return 1;
		}    
	}	
}
