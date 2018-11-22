<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class Model_product extends CI_Model
{
    function __construct()
    {
        parent::__construct();
       
        $this->load->database();
    }


    public function getproduct()
    {
        $query = $this->db->query('SELECT * FROM product WHERE delete_flag = 0');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getproductbyid($pro_id)
    {
        $query = $this->db->query('SELECT * FROM product WHERE product_id = "'.$pro_id.'" AND delete_flag = 0');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

     public function productid_max($year_month)
    {
         $query = $this->db->query('SELECT SUBSTRING(quotation_id, 11,4) AS product_id FROM product WHERE SUBSTRING(product_id, 3,8) = '.$year_month.' ORDER BY product_id DESC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getcategory()
    {
        $query = $this->db->query('SELECT * FROM product_category WHERE delete_flag = 0');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function save($data)
    {
        $this->db->insert('product', $data);
        $product_id = $this->db->insert_id();
        return $product_id;
    }



   
}
?>