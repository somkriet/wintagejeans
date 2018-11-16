<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model
{


    public function validateHasMember($email)
    {
        //. $this->db->escape(
        $query = $this->db->query('SELECT * FROM application_member WHERE email = "' . $email . '"');
        return $query->num_rows();
    }

    public function getMemberDetail($email, $password)
    {
        $query = $this->db->query('SELECT * FROM users WHERE email ="'. $email . '" AND password ="' .$password . '"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getMemberByID($member_id)
    {
        $query = $this->db->query('SELECT * FROM application_member WHERE member_id = ' . $member_id);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getMemberDetailByEmail($email)
    {
        $query = $this->db->query('SELECT * FROM application_member WHERE email = "' . $email . '"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getOrderHistoryByMemberID($member_id)
    {
        $query = $this->db->query('SELECT * FROM application_order WHERE member_id = "' . $member_id . '" AND open = 1 ORDER BY timestamp DESC LIMIT 10');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function getAddressByMemberID($member_id)
    {
        $query = $this->db->query('SELECT * FROM application_address WHERE member_id = "' . $member_id . '"');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }

    public function register($email, $password, $firstname, $lastname, $fbuid)
    {
        $data = array(
            'email'    => $email,
            'fbuid'    => $fbuid,
            'password' => $password,
            'fname'    => $firstname,
            'lname'    => $lastname
        );
        $this->db->insert('application_member', $data);
        $member_id = $this->db->insert_id();
        return $member_id;
    }

    public function updateprofile($email, $firstname, $lastname, $member_id)
    {
        $data = array(
            'email' => $email,
            'fname' => $firstname,
            'lname' => $lastname
        );
        $this->db->where('member_id', $member_id);
        $this->db->update('application_member', $data);
    }

    public function updatepassword($password, $member_id)
    {
        $data = array(
            'password' => $password
        );
        $this->db->where('member_id', $member_id);
        $this->db->update('application_member', $data);
    }
}