<?php

namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
use mysqli;

class HelperModel extends Model
{
    protected $db;


    // Return the table data (parameter $columns => comma seperated string value )
    // Order  [id,asc] or [id,desc] => [column_name,type]
    public function get_list($table, $where = "", $select = "", $order_by = [], $group_by = '')
    {

        $builder = $this->db->table($table);

        if ($select != "")
            $builder->select($select);

        if ($where != "")
            $builder->where($where);

        if (!empty($order_by)) {
            $builder->orderBy($order_by[0], $order_by[1]);
        }

        if ($group_by != "")
            $builder->groupBy($group_by);

        $res = $builder->get()->getResultArray();
        //echo $this->db->getLastQuery();
        return $res;
    }

    // Return the single row table data (parameter $columns => comma seperated string value )
    // Order  [id,asc] or [id,desc] => [column_name,type]
    public function get_single_row($table, $where = "", $select = "", $order_by = [])
    {
        $builder = $this->db->table($table);

        if ($select != "")
            $builder->select($select);

        if ($where != "")
            $builder->where($where);

        if (!empty($order_by)) {
            $builder->orderBy($order_by[0], $order_by[1]);
        }
        $res = $builder->limit(1)->get()->getResultArray();
       //echo $this->db->getLastQuery();
        return (!empty($res) ? $res[0] : $res);
    }

    //Get all rows from table
    public function get_all_rows($table, $where = "", $select = "")
    {
        $builder = $this->db->table($table);

        if ($select != "")
            $builder->select($select);

        if ($where != "")
            $builder->where($where);

        $res = $builder->get()->getResultArray();
        return (!empty($res) ? $res[0] : $res);
    }

    // Inserting single record
    public function insert_single_record($table, $data)
    {
        $builder = $this->db->table($table);
        $result = $builder->insert($data);

        return $result;
    }    
}
