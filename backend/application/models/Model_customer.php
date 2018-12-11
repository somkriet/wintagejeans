<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
Class Model_customer extends CI_Model
{
    function __construct()
    {
        parent::__construct();
       
        $this->load->database();
    }


    public function getcustomer()
    {
        $query = $this->db->query('SELECT * FROM customer WHERE delete_flag = 0');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getcolor()
    {
        $query = $this->db->query('SELECT * FROM colors WHERE delete_flag = 0');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getcolorbyid($color_id)
    {
        $query = $this->db->query('SELECT * FROM colors WHERE color_id = "'.$color_id.'" AND delete_flag = 0');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function savecolor($data)
    {
        $this->db->insert('colors', $data);
        $color_save = $this->db->insert_id();
        return $color_save;
    }

    public function updatecolorname($color_id,$data)
    {
        // $this->db->update('colors', $data);
        $this->db->where('color_id', $color_id);
        $this->db->update('colors', $data);
        $color_update = $this->db->insert_id();
        return $color_update;
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
         $query = $this->db->query('SELECT SUBSTRING(product_id, 11,4) AS product_id FROM product WHERE SUBSTRING(product_id, 3,8) = '.$year_month.' ORDER BY product_id DESC');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function deleteproductbyid($product_id,$data)
    {
        $this->db->where('product_id', $product_id);
        $this->db->update('product', $data);
        $delete_pro = $this->db->insert_id();
        return $delete_pro;
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

    public function updateproduct($product_id,$data)
    {
         $this->db->where('product_id', $product_id);
        $this->db->update('product', $data);
        $pro_update = $this->db->insert_id();
        return $pro_update;
    }

}
?>