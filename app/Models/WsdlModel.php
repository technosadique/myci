<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class WsdlModel extends Model {
    protected $db;   
	
	public function customer_list(){		
		$builder = $this->db->table('customers');
        $builder->select("id,first_name,last_name,phone"); 
		$builder->where("in_deleted", 0);        
        $result =  $builder->get()->getResultArray();	
		//echo $this->db->getLastQuery();die;
        return $result;	
	}	
	
	public function customer_update($post) { 					
		// update 
		$data = array(  
						"first_name"		=> ($post["first_name"])?$post["first_name"]:'',
						"last_name"			=> ($post["last_name"])?$post["last_name"]:'',
						"phone"				=> ($post["phone"])?$post["phone"]:'',																
					);          
	
		$builder = $this->db->table('customers');
		$builder->where('id', $post["id"]);
		$builder->update($data); 
		return 1;		 
	}

	public function customer_delete($id)
    {        
        if (!empty($id)) {
            // delete in mysql db
            $builder = $this->db->table('customers');
            $builder->where('id', $id);
            $builder->update(['in_deleted' => 1]);           
            echo "success";
        }
    }
	
	public function customer_detail($id)
    {        
        if (!empty($id)) {           
            $builder = $this->db->table('customers');
            $builder->select('*');
            $builder->where('id', $id);                   
            $result =  $builder->get()->getResultArray();
			return $result;
        }
    }
   
    
	public function customer_add($post) {     
			
            $data = array(  
							"first_name"		=> ($post["first_name"])?$post["first_name"]:'',
							"last_name"			=> ($post["last_name"])?$post["last_name"]:'',
							"phone"				=> ($post["phone"])?$post["phone"]:'',																
						);            
            $builder = $this->db->table('customers');
            $builder->insert($data);
            $lastInsertId = $this->db->insertId();  
			return $lastInsertId;			  
	}	
}
