<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        //$this->load->library('Encryptdecrypt');
    }

    public function getSiteDetails() {
        $query = $this->db->get('site_details');
        return $query->row_array();
    }

    public function updateSiteDetails($data) {
        $query = $this->db->update('site_details', $data);
        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function insert_concept($data){
        $this->db->insert('concepts', $data);
    }

   public function get_concepts() {
        $query = $this->db->get('concepts');
        return $query->result_array();
    }
    public function insert_and_return($tbl,$val){
                       $this->db->insert($tbl,$val); 
                       $data = $this->db->insert_id();
                       return $data;
               }
    public function display($tbl)
    {
        $query = $this->db->query("SELECT  * FROM $tbl ");
        $result = $query->result_array();
         return $result;
    }
     
    public function delete_Data($ID_TNM,$ID,$tbl_name){

         $this->db->where($ID_TNM, $ID);
         $this->db->delete($tbl_name);
    }

    function update_Data($ID,$val,$tbl_name) {

        $this->db->where($ID, $val[$ID]);
        $this->db->update($tbl_name, $val);

        if($this->db->affected_rows() == 1){
          return True;
        }
        else{
          return False;
        }
    }
    function get_record_where($tbl,$clm,$val){

         $row = $this->db->get_where($tbl, array($clm => $val))->result_array();
         return $row;
    }

    function showresult($val)
    {
        $query=$this->db->query("select * from showdetails WHERE show_id='$val'");
        $result = $query->result_array();
        return $result;
    }

    public function  genre($tbl,$clm,$val)
    {

        $query=$this->db->query("select * from  $tbl WHERE $clm='$val'");

           $result = $query->result_array();
           return $result;

    }
    function category($val)
    {
        $query=$this->db->query("select * from registration WHERE category='$val'");
          $result = $query->result_array();
           return $result;

    }
    public function writer($tbl,$clm,$val)
    {
        $query=$this->db->query("select * from $tbl WHERE $clm='$val'");
          $result = $query->result_array();
           return $result;

    }
   public function expdate($val)
      {
     $query=$this->db->query("select * from domain_registration WHERE exp_date='$val'");
     $result = $query->result_array();
    return $result;

      }
    function frpadetail($tbl)
    {
        $query=$this->db->query("SELECT `title`, `frapa_reg_code` , `frapa_reg_date` , `frapa_exp_date` FROM  $tbl ");
         $result = $query->result_array();
        return $result;
    }
    function iftpcdetail($tbl)
    {
        $query=$this->db->query("SELECT `title`, `tm_reg_code` , `tm_reg_date` , `tm_exp_date` FROM  $tbl ");
         $result = $query->result_array();
        return $result; 
    }
    function fwadetail($tbl)
    {
        $query=$this->db->query("SELECT `title`,`fwa_reg_code` , `fwa_reg_date` , `fwa_exp_date` FROM  $tbl ");
         $result = $query->result_array();
        return $result; 
    }
    function iprdetails($tbl)
    {
        $query=$this->db->query("SELECT `title`, `cr_reg_code` , `cr_reg_date` , `image`, `status`  FROM  $tbl ");
         $result = $query->result_array();
        return $result; 
    }

    function copyrightdetails($tbl)
    {
         $query=$this->db->query("SELECT `title`, `diaryno`, `application_date` , `reg_diary_no` , `Confirmation_date`  FROM  $tbl ");
         $result = $query->result_array();
        return $result; 
    }
     function searchshowresult($val)
     {

        $query=$this->db->query("select * from showdetails WHERE show_id='$val'");
        $result = $query->result_array();
        return $result;
    }
    function searchbytitle($tbl,$val)
    {
        $query=$this->db->query("select * from $tbl where title='$val'");
          $result = $query->result_array();
        return $result;
    }
    function searchbywriterdata($val)
    {
             $query=$this->db->query("select * from registration where writer='$val'");
          $result = $query->result_array();
        return $result;
    }
    function frpa_count($tbl)
    {
            $query=$this->db->query("SELECT frapa_exp_date FROM $tbl WHERE frapa_exp_date =DATE_ADD(CURDATE(), INTERVAL + 2 DAY)");

            $result=  $query->num_rows();
                 return $result;
    }

    function iftpc_count($tbl)
    {
        $query=$this->db->query("SELECT tm_exp_date FROM $tbl WHERE tm_exp_date =DATE_ADD(CURDATE(), INTERVAL + 2 DAY)");

            $result=  $query->num_rows();
                 return $result;
    }
     function trademark_count($tbl)
    {
        $query=$this->db->query("SELECT cr_exp_date FROM $tbl WHERE cr_exp_date =DATE_ADD(CURDATE(), INTERVAL + 2 DAY)");

            $result=  $query->num_rows();
                 return $result;
    }

    function domain_count($tbl)
    {
        $query=$this->db->query("SELECT exp_date FROM $tbl WHERE exp_date =DATE_ADD(CURDATE(), INTERVAL + 2 DAY)");

            $result=  $query->num_rows();
                 return $result;
    }
    function count_iftc_data($title)
    { if($title)
        {
            $abc="and title='$title' ";
        }
        else
        {
            $abc="";
        }

          $query=$this->db->query("SELECT * FROM registration WHERE tm_exp_date =DATE_ADD(CURDATE(), INTERVAL + 2 DAY) $abc");
          $result = $query->result_array();
        return $result;
    }
    function count_domain_expire_data($domanin_name)
    {
        if($domanin_name)
        {
            $abc=" and domanin_name='$domanin_name' ";
        }
        else
        {
            $abc="";
        }
        $query=$this->db->query("SELECT * FROM domain_registration WHERE exp_date =DATE_ADD(CURDATE(), INTERVAL + 2 DAY) $abc");
          $result = $query->result_array();
        return $result;
    }
    function count_trademark_expire_data($title)
    {
        if($title)
        {
            $abc="and title='$title' ";
        }
        else
        {
            $abc="";
        }
         $query=$this->db->query("SELECT * FROM registration WHERE cr_exp_date =DATE_ADD(CURDATE(), INTERVAL + 2 DAY) $abc");
          $result = $query->result_array();
        return $result;
    }
    function count_frpa_expire_data($title)
    {

        if($title)
        {
            $abc="and title='$title' ";
        }
        else
        {
            $abc="";
        }
         $query=$this->db->query("SELECT * FROM registration WHERE frapa_exp_date =DATE_ADD(CURDATE(), INTERVAL + 2 DAY) $abc");
          $result = $query->result_array();
        return $result;
    }
    function  title_search_Data($tbl,$val)
    {
        // echo $tbl;
        // echo $val; exit;
        $query=$this->db->query("SELECT * FROM $tbl WHERE title like '%".$val."%' OR discription like '%".$val."%'");
        $result = $query->result_array();
        return $result;
    }
  
     
}
?>

