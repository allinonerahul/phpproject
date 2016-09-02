<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        //$this->load->library('Encryptdecrypt');
       // $this->check_isvalidated();
        $this->load->library('excel');
        $this->load->library('upload');

        $noheader = $this->input->get_post('noheader');
        $this->load->model('admin_model', 'admin');
        $this->id = $this->session->userdata('user_id');
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($noheader != 1) {
            $data['user_data'] = $this->session->userdata;
            $data['site_details'] = $this->admin->getSiteDetails();
            

            $getdata=$this->admin->frpa_count('registration');
            $data['result']=$getdata;
           
           $getdata=$this->admin->iftpc_count('registration');
           $data['iftpc']=$getdata;

          $getdata=$this->admin->trademark_count('registration');
           $data['trademark']=$getdata;

           $getdata=$this->admin->domain_count('domain_registration');
           $data['domain']=$getdata;
           // echo '<pre>';
           // print_r($data['domain']);exit;

            $this->load->view('admin-header/header', $data);
            $this->load->view('admin-header/sidebar');
        }
        // $this->load->library('excel');
    }

    public function index() {
        // print_r($this->router->method);die;
        if ($this->session->userdata('validated')) {
            $filter = '';
            $filter_cust = '';
            $data['user_data'] = $this->session->userdata;
            //$this->load->view('admin-header/header',$data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url('login'));
        }
    }

    public function associations() {
        if ($this->session->userdata('validated')) {



            $data['result'] = $this->admin->get_concepts();
            $getdata=$this->admin->display('add_new_associations');
            $data['result']=$getdata;
            // echo '<pre>';
            // print_r($data['result']);
            $this->load->view('admin/associations', $data);
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }
    }

    function show_frpa_detail()
    {
       if ($this->session->userdata('validated')) {


        
     // $frpa=$this->input->post('frpa');
     $getdata=$this->admin->frpadetail('registration');
     $data['result']=$getdata;
     // echo '<pr>';
     // print_r($data['result']);
        $this->load->view('admin/show_frpa_details',$data);
//$this->load->view('admin-footer/footer');

        }
        else {
    redirect(base_url());              
             }


    }

    function show_iftpcdetail()
    {

         if ($this->session->userdata('validated')) {
     // $frpa=$this->input->post('frpa');
     $getdata=$this->admin->iftpcdetail('registration');
     $data['result']=$getdata;
     // echo '<pr>';
     // print_r($data['result']);
        $this->load->view('admin/show_iftpc_details',$data);
//$this->load->view('admin-footer/footer');

        }
        else {
    redirect(base_url());              
             }
    }
function show_getfwa_details()
{
   if ($this->session->userdata('validated')) {
     // $frpa=$this->input->post('frpa');
     $getdata=$this->admin->fwadetail('registration');
     $data['result']=$getdata;
     // echo '<pr>';
     // print_r($data['result']);
        $this->load->view('admin/show_fwa_details',$data);
//$this->load->view('admin-footer/footer');

        }
        else {
    redirect(base_url());              
             }
}
function show_ipr_details()
{
   if ($this->session->userdata('validated')) {
     // $frpa=$this->input->post('frpa');
     $getdata=$this->admin->iprdetails('registration');
     $data['result']=$getdata;
     // echo '<pr>';
     // print_r($data['result']);
        $this->load->view('admin/show_ipr_details',$data);
//$this->load->view('admin-footer/footer');

        }
        else {
    redirect(base_url());              
             }

}

function show_copyright_details()
{
  if ($this->session->userdata('validated')) {
     // $frpa=$this->input->post('frpa');
     $getdata=$this->admin->copyrightdetails('registration');
     $data['result']=$getdata;
     // echo '<pr>';
     // print_r($data['result']);
        $this->load->view('admin/show_copyright_details',$data);
//$this->load->view('admin-footer/footer');

        }
        else {
    redirect(base_url());              
             }

}
function search_by_title()
{
  if ($this->session->userdata('validated')) {
     $title=$this->input->post('title');
     $getdata=$this->admin->searchbytitle('registration',$title);
     $data['result']=$getdata;
     // echo '<pr>';
     // print_r($data['result']);
        $this->load->view('admin/show_all_searchdetails_details',$data);
//$this->load->view('admin-footer/footer');

        }
        else {
    redirect(base_url());              
             }
}



    public function add_new_assocition()
    {

        if ($this->session->userdata('validated')) {

            $this->load->view('admin/add_new_association');
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }

    }
    function insert_new_assocation()
    {
         if($this->session->userdata('validated')){
            $associations_title=$this->input->post('associations_title');
            $val=array(
             "associations_title"=>$associations_title
             
              );
            $tbl="add_new_associations";
          $this->admin->insert_and_return($tbl,$val); 
          redirect('admin/associations');

         }
         else {
            redirect(base_url());
        }
    

    }

    public function add_concept() {
        if ($this->session->userdata('validated')) {

            $this->load->view('admin/add_concept');
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }
    }

    public function insert_concept() {
        if ($this->session->userdata('validated')) {

            if($_POST){
                // $data['concept_name'] = $this->input->post('c_name');
                // $data['category'] = $this->input->post('category');
                // $data['genre'] = $this->input->post('genre');

                $data['fwa_reg_code'] = $this->input->post('fwa_reg_code');
                $data['fwa_reg_date'] = $this->input->post('fwa_reg_date');
                $data['fwa_exp_date'] = $this->input->post('fwa_exp_date');

                $data['frapa_reg_code'] = $this->input->post('frapa_reg_code');
                $data['frapa_reg_date'] = $this->input->post('frapa_reg_date');
                $data['frapa_exp_date'] = $this->input->post('frapa_exp_date');

                $data['tm_reg_code'] = $this->input->post('tm_reg_code');
                $data['tm_reg_date'] = $this->input->post('tm_reg_date');
                $data['tm_exp_date'] = $this->input->post('tm_exp_date');

                $data['cr_reg_code'] = $this->input->post('cr_reg_code');
                $data['cr_reg_date'] = $this->input->post('cr_reg_date');
                $data['cr_exp_date'] = $this->input->post('cr_exp_date');


                // $data['reg_for'] = $this->input->post('reg_for');
                // $data['author'] = $this->input->post('author');
                // $data['synopsis'] = $this->input->post('synopsis');

                $this->admin->insert_concept($data);

                redirect('admin/associations');
            }
        } else {
            redirect(base_url());
        }
    }

// function edit_assciation()
// {
//   if ($this->session->userdata('validated')) {
//           $getdata=$this->admin->display('concepts');
//           $data['result']=$getdata;    
//             $this->load->view('admin/edit_concept',$data);
//             $this->load->view('admin-footer/footer');
//         } else {
//             redirect(base_url());
//         }

// }



    function delete_assciation($id)
    {
$this->admin->delete_Data('id', $id, 'concepts');
       redirect('admin/associations');
    }
function edit_concept($id)
{
  if($this->session->userdata('validated')) {
      $clm="id";
      $tbl="concepts";
   $getdata=$this->admin->get_record_where($tbl,$clm,$id);
   $data['result']=$getdata;
   $this->load->view('admin/edit_concept',$data);
   $this->load->view('admin-footer/footer');
   }else {
            redirect(base_url());
        }

}

public function edit_insert_concept()
{
 if ($this->session->userdata('validated')) {
// $c_name=$this->input->post('c_name');
 $id=$this->input->post('id'); 
// $category=$this->input->post('category');
// $genre=$this->input->post('genre');
$fwa_reg_code=$this->input->post('fwa_reg_code');
$fwa_reg_date=$this->input->post('fwa_reg_date');
$fwa_exp_date=$this->input->post('fwa_exp_date');
$frapa_reg_code=$this->input->post('frapa_reg_code');
$frapa_reg_date=$this->input->post('frapa_reg_date');
$frapa_exp_date=$this->input->post('frapa_exp_date');
$tm_reg_code=$this->input->post('tm_reg_code');
$tm_reg_date=$this->input->post('tm_reg_date');
$tm_exp_date=$this->input->post('tm_exp_date');
$cr_reg_code=$this->input->post('cr_reg_code');
$cr_reg_date=$this->input->post('cr_reg_date');
$cr_exp_date=$this->input->post('cr_exp_date');
// $reg_for=$this->input->post('reg_for');
// $author=$this->input->post('author');
// $synopsis=$this->input->post('synopsis');

$val=array(

// "concept_name"=>$c_name,
"id"=>$id, 
// "category"=>$category,
// "genre"=>$genre,
"fwa_reg_code"=>$fwa_reg_code,
"fwa_reg_date"=>$fwa_reg_date,
"fwa_exp_date"=>$fwa_exp_date,
"frapa_reg_code"=>$frapa_reg_code,
"frapa_reg_date"=>$frapa_reg_date,
"frapa_exp_date"=>$frapa_exp_date,
"tm_reg_code"=>$tm_reg_code,
"tm_reg_date"=>$tm_reg_date,
"tm_exp_date"=>$tm_exp_date,
"cr_reg_code"=>$cr_reg_code,
"cr_reg_date"=>$cr_reg_date,
"cr_exp_date"=>$cr_exp_date,
// "reg_for"=>$reg_for,
// "author"=>$author,
// "synopsis"=>$synopsis
 );
$tbl="concepts";
$this->admin->update_Data('id',$val,$tbl);

 redirect('admin/associations');
            }
      else {
            redirect(base_url());
        }
}



    public function title_registration()
    {  if ($this->session->userdata('validated')) {
           
           $getdata=$this->admin->display('registration');
           $data['result']=$getdata;
           // echo '<pre>';
           // print_r($data['result']);
            $this->load->view('admin/title_registration',$data);
            $this->load->view('admin-footer/footer');
    }
    }
   public function add_titleregistration()
   {
      if ($this->session->userdata('validated')) {

            $this->load->view('admin/add_titleregistration');
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }

   }
   public function insert_registration_concept()
   {
        if ($this->session->userdata('validated')) {

            $title=$this->input->post('title');
            $category=$this->input->post('category');
            $genre=$this->input->post('genre');
            $writer=$this->input->post('writer');
            $discription=$this->input->post('discription');
            // $comedy=$this->input->post('comedy');

            $frapa_reg_code=$this->input->post('frapa_reg_code');
            $frapa_reg_date=$this->input->post('frapa_reg_date');
            $frapa_exp_date=$this->input->post('frapa_exp_date');
            $tm_reg_code=$this->input->post('tm_reg_code');
            $tm_reg_date=$this->input->post('tm_reg_date');
            $tm_exp_date=$this->input->post('tm_exp_date');
            $fwa_reg_code=$this->input->post('fwa_reg_code');
            $fwa_reg_date=$this->input->post('fwa_reg_date');
            $fwa_exp_date=$this->input->post('fwa_exp_date');
            $file_namee = $_FILES['concepts']['name']; 
            if (isset($_FILES['concepts'])) {
            $errors = array();
            $file_namee = $_FILES['concepts']['name'];
            $file_size = $_FILES['concepts']['size'];
            $file_tmp = $_FILES['concepts']['tmp_name'];
            $file_type = $_FILES['concepts']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['concepts']['name'])));

            $expensions = array("doc","odt","jpeg","jpg");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "concepts/" . $file_namee);
                echo "Success";
            }
        }

            $cr_reg_code=$this->input->post('cr_reg_code');
            $cr_reg_date=$this->input->post('cr_reg_date');
              $cr_exp_date=$this->input->post('cr_exp_date');
           $file_name = $_FILES['image']['name'];
            if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

            $expensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "trademark_image/" . $file_name);
                echo "Success";
            }
        }
              $status=$this->input->post('status');
   
              $diaryno=$this->input->post('diaryno');
              $application_date=$this->input->post('application_date');
              $cr_exp_date=$this->input->post('cr_exp_date');
              $reg_diary_no=$this->input->post('reg_diary_no');
              $Confirmation_date=$this->input->post('Confirmation_date');


            $val=array(

                "title"=>$title,
                "category"=>$category,
                "genre"=>$genre,
                "discription"=>$discription,
                "writer"=>$writer,
                "frapa_reg_code"=>$frapa_reg_code,
                "frapa_reg_date"=>$frapa_reg_date,
                "frapa_exp_date"=>$frapa_exp_date,
                "tm_reg_code"=>$tm_reg_code,
                "tm_reg_date"=>$tm_reg_date,
                "tm_exp_date"=>$tm_exp_date,
                "fwa_reg_code"=>$fwa_reg_code,
                "fwa_reg_date"=>$fwa_reg_date,
                "fwa_exp_date"=>$fwa_exp_date,
                 "concepts" => $file_namee,
                "cr_reg_code"=>$cr_reg_code,
                "cr_reg_date"=>$cr_reg_date,
                "cr_exp_date"=>$cr_exp_date,
                "status"=>$status,
                "image" => $file_name,
                "diaryno"=>$diaryno,
                "application_date"=>$application_date,
                "reg_diary_no"=>$reg_diary_no,
                "Confirmation_date"=>$Confirmation_date

                );
                 $tbl="registration";
                 // echo '<pre>';
                 // print_r( $val);

                $this->admin->insert_and_return($tbl,$val);

                   redirect('admin/title_registration');
            }
        else {
            redirect(base_url());
        }

 }
function  edit_title_registration($registration_id)

{


if ($this->session->userdata('validated')) {

  $clm="registration_id";
  $tbl="registration";
     $getdata=$this->admin->get_record_where($tbl,$clm,$registration_id);
           $data['result']=$getdata;

            $this->load->view('admin/edit_titleregistration',$data);
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }



}

function insert_update_registration_concept()

{
 if ($this->session->userdata('validated')) {

          
           $registration_id=$this->input->post('registration_id'); 
             $title=$this->input->post('title');
            $category=$this->input->post('category');
            $genre=$this->input->post('genre');
            $writer=$this->input->post('writer');
            $discription=$this->input->post('discription');
            // $comedy=$this->input->post('comedy');

            $frapa_reg_code=$this->input->post('frapa_reg_code');
            $frapa_reg_date=$this->input->post('frapa_reg_date');
            $frapa_exp_date=$this->input->post('frapa_exp_date');
            $tm_reg_code=$this->input->post('tm_reg_code');
            $tm_reg_date=$this->input->post('tm_reg_date');
            $tm_exp_date=$this->input->post('tm_exp_date');
            $fwa_reg_code=$this->input->post('fwa_reg_code');
            $fwa_reg_date=$this->input->post('fwa_reg_date');
            $fwa_exp_date=$this->input->post('fwa_exp_date');


            $file_namee = $_FILES['concepts']['name']; 
            if (isset($_FILES['concepts'])) {
            $errors = array();
            $file_namee = $_FILES['concepts']['name'];
            $file_size = $_FILES['concepts']['size'];
            $file_tmp = $_FILES['concepts']['tmp_name'];
            $file_type = $_FILES['concepts']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['concepts']['name'])));

            $expensions = array("doc","ods");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "concepts/" . $file_namee);
                echo "Success";
            }
        }











            $cr_reg_code=$this->input->post('cr_reg_code');
            $cr_reg_date=$this->input->post('cr_reg_date');
           $file_name = $_FILES['image']['name'];
            if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

            $expensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "trademark_image/" . $file_name);
                echo "Success";
            }
        }
              $status=$this->input->post('status');
   
              $diaryno=$this->input->post('diaryno');
              $application_date=$this->input->post('application_date');
              $reg_diary_no=$this->input->post('reg_diary_no');
              $Confirmation_date=$this->input->post('Confirmation_date');


            $val=array(
             "registration_id"=>$registration_id,
                  "title"=>$title,
              "category"=>$category,
              "genre"=>$genre,
              "discription"=>$discription,
              "writer"=>$writer,
              "frapa_reg_code"=>$frapa_reg_code,
              "frapa_reg_date"=>$frapa_reg_date,
               "frapa_exp_date"=>$frapa_exp_date,
                 "tm_reg_code"=>$tm_reg_code,
                 "tm_reg_date"=>$tm_reg_date,
                 "tm_exp_date"=>$tm_exp_date,
                 "fwa_reg_code"=>$fwa_reg_code,
                 "fwa_reg_date"=>$fwa_reg_date,
                 "fwa_exp_date"=>$fwa_exp_date,
                 "concepts"=>$file_namee,
                 "cr_reg_code"=>$cr_reg_code,
                "cr_reg_date"=>$cr_reg_date,
                "status"=>$status,
                "image" => $file_name,
                "diaryno"=>$diaryno,
                "application_date"=>$application_date,
                "reg_diary_no"=>$reg_diary_no,
                "Confirmation_date"=>$Confirmation_date          

                );
                 $tbl="registration";

               $this->admin->update_Data('registration_id',$val,$tbl);
                   redirect('admin/title_registration');
            }
        else {
            redirect(base_url());
        }



}
function delete_title_registration($registration_id)
{
 $this->admin->delete_Data('registration_id', $registration_id, 'registration');
       redirect('admin/title_registration');

}


 public function domain_registration()
 {
 if ($this->session->userdata('validated')) {

            $getdata=$this->admin->display('domain_registration');
            $data['result']=$getdata;
            $this->load->view('admin/domain_registration',$data);
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }
    }

    public function  add_domainregistration()
     {if ($this->session->userdata('validated')) {

            $this->load->view('admin/add_domainregistration');
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }

   }
   public function insert_domainregistration()
   {
      if ($this->session->userdata('validated')) {
        $domanin_name=$this->input->post('domanin_name');
        $register=$this->input->post('register');
        $registeremail=$this->input->post('registeremail');
        $register_contect=$this->input->post('register_contect');
        $reg_date=$this->input->post('reg_date');
        $exp_date=$this->input->post('exp_date');
        $hosting_company=$this->input->post('hosting_company');
            $val=array(
            "domanin_name"=>$domanin_name,
            "register"=>$register,
            "registeremail"=>$registeremail,
            "register_contect"=>$register_contect,
            "reg_date"=>$reg_date,
            "exp_date"=>$exp_date,
            "hosting_company"=>$hosting_company
                   );
            $tbl="domain_registration";
            $this->admin->insert_and_return($tbl,$val);
            redirect('admin/domain_registration');
                  }
                  else {
            redirect(base_url());
              }


   }

   public function edit_domain_registration($domain_id)
   
      {
        if ($this->session->userdata('validated')) {
            
           $clm="domain_id";
            $tbl = "domain_registration";
           $getdata=$this->admin->get_record_where($tbl,$clm,$domain_id);
           $data['result']=$getdata;
           // echo '<pre>';
           // print_r($data['result']);
           
            $this->load->view('admin/edit_domainregistration',$data);
            $this->load->view('admin-footer/footer');
              } else {
            redirect(base_url());
                    }

   }
   

function edit_insert_domainregistration()

{
if ($this->session->userdata('validated')) {
        $domain_id=$this->input->post('domain_id'); 
        $domanin_name=$this->input->post('domanin_name'); 
        $register=$this->input->post('register');
        $registeremail=$this->input->post('registeremail');
        $register_contect=$this->input->post('register_contect');
        $reg_date=$this->input->post('reg_date');
        $exp_date=$this->input->post('exp_date');
        $hosting_company=$this->input->post('hosting_company');
      $val=array(
              "domain_id"=>$domain_id,
              "domanin_name"=>$domanin_name,
              "register"=>$register,
              "registeremail"=>$registeremail,
              "register_contect"=>$register_contect,
              "reg_date"=>$reg_date,
              "exp_date"=>$exp_date,
              "hosting_company"=>$hosting_company
                 );
            $tbl="domain_registration";
            $this->admin->update_Data('domain_id',$val,$tbl);
            redirect('admin/domain_registration');
                  }
              else {
           redirect(base_url());
                  } 

  }


  function  delete_domain_registration($domain_id)
  {
       
       $this->admin->delete_Data('domain_id', $domain_id, 'domain_registration');
       redirect('admin/domain_registration');

  }
  function show_details()
  {

      if ($this->session->userdata('validated')) {

        $getdata=$this->admin->display('showdetails');
        $data['result']=$getdata;
        $this->load->view('admin/show_details',$data);
        $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }

  }


function  add_showdetails()
{
  if ($this->session->userdata('validated')) {
      $this->load->view('admin/add_showdetails');
      $this->load->view('admin-footer/footer');
        } 
        else {
            redirect(base_url());
        }
}
function inserting_show_details()
{
    if ($this->session->userdata('validated')) {
        $showname=$this->input->post('showname');
        error_reporting(0);
         $file_namem = $_FILES['broadstory']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_namem = $_FILES['broadstory']['name'];
            $file_size = $_FILES['broadstory']['size'];
            $file_tmp = $_FILES['broadstory']['tmp_name'];
            $file_type = $_FILES['broadstory']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['broadstory']['name'])));

            $expensions = array("doc", "odc" ,"odt" );
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "broadstory/" . $file_namem);
                echo "Success";
            }

}

$file_namemmmm = $_FILES['detail_brod_story']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
           $file_namemmmm = $_FILES['detail_brod_story']['name'];
            $file_size = $_FILES['detail_brod_story']['size'];
            $file_tmp = $_FILES['detail_brod_story']['tmp_name'];
            $file_type = $_FILES['detail_brod_story']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['detail_brod_story']['name'])));

            $expensions = array("doc", "odc" );
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "detail_brod_story/" . $file_namemmmm);
                echo "Success";
            }

}

$file_namemm = $_FILES['story']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_namemm = $_FILES['story']['name'];
            $file_size = $_FILES['story']['size'];
            $file_tmp = $_FILES['story']['tmp_name'];
            $file_type = $_FILES['story']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['story']['name'])));

            $expensions = array("doc", "ods" );
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "story/" . $file_namemm);
                echo "Success";
            }

}

$file_namemmm = $_FILES['characdetails']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_namemmm = $_FILES['characdetails']['name'];
            $file_size = $_FILES['characdetails']['size'];
            $file_tmp = $_FILES['characdetails']['tmp_name'];
            $file_type = $_FILES['characdetails']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['characdetails']['name'])));

            $expensions = array("doc","ods");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "characdetails/" . $file_namemmm);
                echo "Success";
            }

}









$file_namemmmmmm = $_FILES['showpresentation']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
          $file_namemmmmmm  = $_FILES['showpresentation']['name'];
            $file_size = $_FILES['showpresentation']['size'];
            $file_tmp = $_FILES['showpresentation']['tmp_name'];
            $file_type = $_FILES['showpresentation']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['showpresentation']['name'])));

            $expensions = array("pdf","doc");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "showpresentation/" . $file_namemmmmmm );
                echo "Success";
            }

}


     $file_name = $_FILES['image']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

            $expensions = array("jpeg", "jpg", "png");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "image/" . $file_name);
                echo "Success";
            }

}
$val=array(
  "showname"=>$showname,
"broadstory"=>$file_namem,
  "story" =>$file_namemm,
"characdetails"=>$file_namemmm,
"detail_brod_story"=>$file_namemmmm,
"showpresentation"=>$file_namemmmmmm,
"image"=>$file_name
  );
$tbl="showdetails";
$this->admin->insert_and_return($tbl,$val);


redirect('admin/show_details');
            }
        else {
            redirect(base_url());
        }
}
function delete_show_detail($show_id)
{

  $this->admin->delete_Data('show_id', $show_id, 'showdetails');
       redirect('admin/show_details');
}
function edit_show_details($show_id)
   
{
  if ($this->session->userdata('validated')) {
            
           $clm="show_id";
            $tbl = "showdetails";
           $getdata=$this->admin->get_record_where($tbl,$clm,$show_id);
           $data['result']=$getdata;
           // echo '<pre>';
           // print_r($data['result']);
           
            $this->load->view('admin/edit_show',$data);
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }

   }

function update_inserting_show_details()
{

    if ($this->session->userdata('validated')) {
$showname=$this->input->post('showname');
 $show_id=$this->input->post('show_id'); 
error_reporting(0);
 $file_namem = $_FILES['broadstory']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_namem = $_FILES['broadstory']['name'];
            $file_size = $_FILES['broadstory']['size'];
            $file_tmp = $_FILES['broadstory']['tmp_name'];
            $file_type = $_FILES['broadstory']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['broadstory']['name'])));

            $expensions = array("doc", "odc" );
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "broadstory/" . $file_namem);
                echo "Success";
            }

}

$file_namemmmm = $_FILES['detail_brod_story']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
           $file_namemmmm = $_FILES['detail_brod_story']['name'];
            $file_size = $_FILES['detail_brod_story']['size'];
            $file_tmp = $_FILES['detail_brod_story']['tmp_name'];
            $file_type = $_FILES['detail_brod_story']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['detail_brod_story']['name'])));

            $expensions = array("doc", "odc" );
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "detail_brod_story/" . $file_namemmmm);
                echo "Success";
            }

}

$file_namemm = $_FILES['story']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_namemm = $_FILES['story']['name'];
            $file_size = $_FILES['story']['size'];
            $file_tmp = $_FILES['story']['tmp_name'];
            $file_type = $_FILES['story']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['story']['name'])));

            $expensions = array("doc", "odc" );
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "story/" . $file_namemm);
                echo "Success";
            }

}

$file_namemmm = $_FILES['characdetails']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_namemmm = $_FILES['characdetails']['name'];
            $file_size = $_FILES['characdetails']['size'];
            $file_tmp = $_FILES['characdetails']['tmp_name'];
            $file_type = $_FILES['characdetails']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['characdetails']['name'])));

            $expensions = array("doc", "odc");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "characdetails/" . $file_namemmmm);
                echo "Success";
            }

}

$file_namemmmmmm = $_FILES['showpresentation']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
          $file_namemmmmmm  = $_FILES['showpresentation']['name'];
            $file_size = $_FILES['showpresentation']['size'];
            $file_tmp = $_FILES['showpresentation']['tmp_name'];
            $file_type = $_FILES['showpresentation']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['showpresentation']['name'])));

            $expensions = array("pdf","doc");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "showpresentation/" . $file_namemmmmmm );
                echo "Success";
            }

}


     $file_name = $_FILES['image']['name']; 
        if (isset($_FILES['image'])) {
            $errors = array();
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_tmp = $_FILES['image']['tmp_name'];
            $file_type = $_FILES['image']['type'];
            $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

            $expensions = array("jpeg", "jpg", "doc");
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'File size must be excately 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "image/" . $file_name);
                echo "Success";
            }

}
$val=array(
  "showname"=>$showname,
  "show_id"=>$show_id,
"broadstory"=>$file_namem,
  "story" =>$file_namemm,
"characdetails"=>$file_namemmm,
"detail_brod_story"=>$file_namemmmm,
"showpresentation"=>$file_namemmmmmm,
"image"=>$file_name
  );
$tbl="showdetails";
$this->admin->update_Data('show_id',$val,$tbl);


redirect('admin/show_details');
            }
        else {
            redirect(base_url());
        }





}
function report()
{
if ($this->session->userdata('validated')) {
 

         // extract(id);
        
     
        $getdata=$this->admin->display('showdetails');
            $data['show']=$getdata;
            // echo '<pre>';
            // print_r($data['show']);

        $getdata=$this->admin->display('registration');
           $data['result']=$getdata;

            $getdata=$this->admin->display('registration');
           $data['category']=$getdata;

        // echo '<pre>';
        // print_r($data['result']);
            $this->load->view('admin/report',$data);
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }

  }


  function search_show()
  {
     if ($this->session->userdata('validated')) {
       $showname=$this->input->post('showname');  
       // $genre=$this->input->post('genre');
       // $category=$this->input->post('category');
       // $writer=$this->input->post('writer');
          $getdata=$this->admin->showresult($showname);
           $data['result']=$getdata;
           // echo '<pre>';
           // print_r($data['result']); 
        
            $this->load->view('admin/display_show_table',$data);
            $this->load->view('admin-footer/footer');
         }else  {
      redirect(base_url());
                }
        }

  function serch_genre()
  {
  if ($this->session->userdata('validated')) {
  $genre=$this->input->post('genre'); 

    $getdata=$this->admin->genre('registration','genre',$genre);
    $data['genere']=$getdata;
    // echo '<pre>';
    // print_r($data['genere']); 

    $this->load->view('admin/display_genere_table',$data);
            $this->load->view('admin-footer/footer');
  }
  else  {
      redirect(base_url());
                }

}
function search_by_category()
{
    if ($this->session->userdata('validated')) {
  $category=$this->input->post('category');
  $getdata=$this->admin->category($category);
  $data['category']=$getdata;

  // echo '<pre>';
  // print_r($data['category']);

$this->load->view('admin/display_category_table',$data);
//$this->load->view('admin-footer/footer');


 }
 else  {
      redirect(base_url());
                }


}

function search_by_writer()
{
 if ($this->session->userdata('validated')) {
 $writer=$this->input->post('writer'); 
  $getdata=$this->admin->writer('registration','registration_id',$writer);
  $data['result']=$getdata;
  $this->load->view('admin/display_writer_table',$data);
//$this->load->view('admin-footer/footer');

}
else {
    redirect(base_url());
                

}
}
function search_by_expire()
{
    $exp_date=$this->input->post('exp_date');
    $getdata=$this->admin->expdate($exp_date);

    $data['expire_data']=$getdata;
    // echo '<pre>';
    // print_r( $data['expire_data']);
    $this->load->view('admin/display_expire_table',$data);
}
function search_by_show()
{
if ($this->session->userdata('validated')) {
 

         // extract(id);
        
     
        $getdata=$this->admin->display('showdetails');
            $data['show']=$getdata;
            // echo '<pre>';
            // print_r($data['show']);

        // $getdata=$this->admin->display('registration');
        //    $data['result']=$getdata;

        //     $getdata=$this->admin->display('registration');
        //    $data['category']=$getdata;

        // echo '<pre>';
        // print_r($data['result']);
            $this->load->view('admin/search_by_show',$data);
            $this->load->view('admin-footer/footer');
        } else {
            redirect(base_url());
        }

  

}
function search_show_details()
{
  if ($this->session->userdata('validated')) {
      $showname=$this->input->post('showname');  
          $getdata=$this->admin->searchshowresult($showname);
           $data['result']=$getdata;
           // echo '<pre>';
           // print_r($data['result']); 
        
            $this->load->view('admin/display_show_table',$data);
            $this->load->view('admin-footer/footer');
         }else  {
      redirect(base_url());
                }
}
function search_by_writerdata()
{
   if ($this->session->userdata('validated')) {
      $writer=$this->input->post('writer');  
          $getdata=$this->admin->searchbywriterdata($writer);
           $data['result']=$getdata;
            // echo '<pre>';
            // print_r($writer); 
        // 
            $this->load->view('admin/display_writerdata_table',$data);
            $this->load->view('admin-footer/footer');
         }else  {
      redirect(base_url());
                }
}

 /*public function exportUseReportList() {
     $getdata=$this->admin->genre('registration','genre',$genre);
    $data['genere']=$getdata;
         
          
        // exit;
        $this->load->library('excel');
        $phpExcel = new PHPExcel();
        $prestasi = $phpExcel->setActiveSheetIndex(0);
        //merger
        $phpExcel->getActiveSheet()->mergeCells('A1:X1');
        //manage row hight
        $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
        //style alignment
        $styleArray = array(
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $phpExcel->getActiveSheet()->getStyle('A1:X1')->applyFromArray($styleArray);
        //border
        $styleArray1 = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        //background
        $styleArray12 = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => array(
                    'rgb' => 'FFEC8B',
                ),
            ),
        );
        //freeepane
        $phpExcel->getActiveSheet()->freezePane('A3');
        //coloum width
        $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);

        $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(30);


//         $prestasi->setCellValue('A2', 'NAME');
//        $prestasi->setCellValue('B2', 'Email');

       
        $prestasi->setCellValue('A2', 'User Name');
        $prestasi->setCellValue('B2', 'Email');
        $prestasi->setCellValue('C2', 'City');
        $prestasi->setCellValue('D2', 'Language');
        $prestasi->setCellValue('E2', 'Section');
        $prestasi->setCellValue('F2', 'Last Login Date');
        // $prestasi->setCellValue('J2', 'Registered Date');

        




//        echo "<pre>"; 
//       exit;
        $data = $data['result'];
        $no = 0;
        $rowexcel = 2;
        foreach ($data as $row) {
            //print_r($row);exit;
//echo $city_name;exit;
            $no++;
            $rowexcel++;
            //$prestasi->setCellValue('A' . $rowexcel, $row['JBCid']);
            $prestasi->setCellValue('A' . $rowexcel, $row['user_name']);
            $prestasi->setCellValue('B' . $rowexcel, $row['email']);            
            //$prestasi->setCellValue('E' . $rowexcel, $row['mobile_no']);   
            //$prestasi->setCellValue('F' . $rowexcel, $row['tel_no']);
            $prestasi->setCellValue('C' . $rowexcel, $row['city']);
             $prestasi->setCellValue('D' . $rowexcel, $row['language']);
             $prestasi->setCellValue('E' . $rowexcel, $row['section']);
             $prestasi->setCellValue('F' . $rowexcel, $row['last_login']);
             //$prestasi->setCellValue('J' . $rowexcel, $row['create_date']);
        }

        $date_format = "d-m-Y";
        $prestasi->setTitle("User List");
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"Active Report.xls\"");
        header("Cache-Control: max-age=0");
        $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");
        $objWriter->save("php://output");
    }*/

    public function export_to_excel() {

        $tbl = "registration";
        $clm = "genre";
         $val = $this->input->get('genre');

        $data['result'] = $this->admin->genre($tbl,$clm,$val);

        $this->load->library('excel');
        $phpExcel = new PHPExcel();
        $prestasi = $phpExcel->setActiveSheetIndex(0);
        //merger
        $phpExcel->getActiveSheet()->mergeCells('A1:Q1');
        //manage row hight
        $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
        //style alignment
        $styleArray = array(
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $phpExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($styleArray);
        //border
        $styleArray1 = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        //background
        $styleArray12 = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => array(
                    'rgb' => 'FFEC8B',
                ),
            ),
        );
        //freeepane
        $phpExcel->getActiveSheet()->freezePane('A3');
        //coloum width
        $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(30);
  

        // $prestasi->setCellValue('A2', 'Sr no.');
        $prestasi->setCellValue('A2', 'Title');
        $prestasi->setCellValue('B2', 'Category');
        $prestasi->setCellValue('C2', 'Genre');
        $prestasi->setCellValue('D2', 'Writer');
        $prestasi->setCellValue('E2', 'Description');
        $prestasi->setCellValue('F2', 'FRAPA Registration Code');
        $prestasi->setCellValue('G2', 'FRAPA Registration Date');
        $prestasi->setCellValue('H2', 'FRAPA Expiry Date');
        $prestasi->setCellValue('I2', 'IFTPC Registration Code');
        $prestasi->setCellValue('J2', 'IFTPC Registration Date');
        $prestasi->setCellValue('K2', 'IFTPC Expiry Date');
        $prestasi->setCellValue('L2', 'FWA Registration Code');
        $prestasi->setCellValue('M2', 'FWA Registration Date');
        $prestasi->setCellValue('N2', 'FWA Expiry Date');
        $prestasi->setCellValue('O2', 'IPR Registration Code');
        $prestasi->setCellValue('P2', 'IPR Registration Date');
        $prestasi->setCellValue('Q2', 'IPR Expiry Date');
        // $prestasi->setCellValue('S2', 'Status');
        // $prestasi->setCellValue('T2', 'Assign To');
        // $prestasi->setCellValue('U2', 'Caller rating');
        // $prestasi->setCellValue('V2', 'Executive Comment');
        // $prestasi->setCellValue('W2', 'NCU Called the lead');
        // $prestasi->setCellValue('X2', 'Delivery days');
        // $prestasi->setCellValue('Y2', 'Current Product in use Comment');
        // $prestasi->setCellValue('Z2', 'DEU Status');

        $data = $data['result'];
//echo '<pre>';print_r($data);exit;

         $no = 0;
        $rowexcel = 2;

        foreach ($data as $row) {

            $no++;
            $rowexcel++;

            $prestasi->setCellValue('A' . $rowexcel, $row['title']);
            $prestasi->setCellValue('B' . $rowexcel, $row['category']);
            $prestasi->setCellValue('C' . $rowexcel, $row['genre']);
            $prestasi->setCellValue('D' . $rowexcel, $row['writer']);
            $prestasi->setCellValue('E' . $rowexcel, $row['discription']);
            $prestasi->setCellValue('F' . $rowexcel, $row['frapa_reg_code']);
            $prestasi->setCellValue('G' . $rowexcel, $row['frapa_reg_date']);
            $prestasi->setCellValue('H' . $rowexcel, $row['frapa_exp_date']);
            $prestasi->setCellValue('I' . $rowexcel, $row['tm_reg_code']);
            $prestasi->setCellValue('J' . $rowexcel, $row['tm_reg_date']);
            $prestasi->setCellValue('K' . $rowexcel, $row['tm_exp_date']);
            $prestasi->setCellValue('L' . $rowexcel, $row['fwa_reg_code']);
            $prestasi->setCellValue('M' . $rowexcel, $row['fwa_reg_date']);
            $prestasi->setCellValue('N' . $rowexcel, $row['fwa_exp_date']);
            $prestasi->setCellValue('O' . $rowexcel, $row['cr_reg_code']);
            $prestasi->setCellValue('P' . $rowexcel, $row['cr_reg_date']);
            $prestasi->setCellValue('Q' . $rowexcel, $row['cr_exp_date']);
            // $prestasi->setCellValue('R' . $rowexcel, $row['regi_time']);
            // $prestasi->setCellValue('S' . $rowexcel, $status);
            // $prestasi->setCellValue('T' . $rowexcel, $assignname);
            // $prestasi->setCellValue('U' . $rowexcel, $row['caller_rate']);
            // $prestasi->setCellValue('V' . $rowexcel, $row['NCU_comment']);
            // $prestasi->setCellValue('W' . $rowexcel, $row['NCU_called_time']);
            // $prestasi->setCellValue('X' . $rowexcel, $Noofdays);
            // $prestasi->setCellValue('Y' . $rowexcel, $row['current_product_comment']);
            // $prestasi->setCellValue('Z' . $rowexcel, $deustatus);
        }
        $prestasi->setTitle('Users Data List');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"genre_data.xls\"");
        header("Cache-Control: max-age=0");
        //  $objWriter->setPreCalculateFormulas(FALSE);
        $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");

        ob_end_clean();
        $objWriter->save("php://output");
    }
    function export_to_excel_writer()
    {
         $tbl = "registration";
        $clm = "writer";
         $val = $this->input->get('writer');

        $data['result'] = $this->admin->writer($tbl,$clm,$val);
        $this->load->library('excel');
        $phpExcel = new PHPExcel();
        $prestasi = $phpExcel->setActiveSheetIndex(0);
        //merger
        $phpExcel->getActiveSheet()->mergeCells('A1:Q1');
        //manage row hight
        $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
        //style alignment
        $styleArray = array(
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $phpExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($styleArray);
        //border
        $styleArray1 = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        //background
        $styleArray12 = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => array(
                    'rgb' => 'FFEC8B',
                ),
            ),
        );
        //freeepane
        $phpExcel->getActiveSheet()->freezePane('A3');
        //coloum width
        $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(30);
  

        // $prestasi->setCellValue('A2', 'Sr no.');
        $prestasi->setCellValue('A2', 'Title');
        $prestasi->setCellValue('B2', 'Category');
        $prestasi->setCellValue('C2', 'Genre');
        $prestasi->setCellValue('D2', 'Writer');
        $prestasi->setCellValue('E2', 'Description');
        $prestasi->setCellValue('F2', 'FRAPA Registration Code');
        $prestasi->setCellValue('G2', 'FRAPA Registration Date');
        $prestasi->setCellValue('H2', 'FRAPA Expiry Date');
        $prestasi->setCellValue('I2', 'IFTPC Registration Code');
        $prestasi->setCellValue('J2', 'IFTPC Registration Date');
        $prestasi->setCellValue('K2', 'IFTPC Expiry Date');
        $prestasi->setCellValue('L2', 'FWA Registration Code');
        $prestasi->setCellValue('M2', 'FWA Registration Date');
        $prestasi->setCellValue('N2', 'FWA Expiry Date');
        $prestasi->setCellValue('O2', 'IPR Registration Code');
        $prestasi->setCellValue('P2', 'IPR Registration Date');
        $prestasi->setCellValue('Q2', 'IPR Expiry Date');
        // $prestasi->setCellValue('S2', 'Status');
        // $prestasi->setCellValue('T2', 'Assign To');
        // $prestasi->setCellValue('U2', 'Caller rating');
        // $prestasi->setCellValue('V2', 'Executive Comment');
        // $prestasi->setCellValue('W2', 'NCU Called the lead');
        // $prestasi->setCellValue('X2', 'Delivery days');
        // $prestasi->setCellValue('Y2', 'Current Product in use Comment');
        // $prestasi->setCellValue('Z2', 'DEU Status');

        $data = $data['result'];
// echo '<pre>';print_r($data);exit;

         $no = 0;
        $rowexcel = 2;

        foreach ($data as $row) {

            $no++;
            $rowexcel++;

            $prestasi->setCellValue('A' . $rowexcel, $row['title']);
            $prestasi->setCellValue('B' . $rowexcel, $row['category']);
            $prestasi->setCellValue('C' . $rowexcel, $row['genre']);
            $prestasi->setCellValue('D' . $rowexcel, $row['writer']);
            $prestasi->setCellValue('E' . $rowexcel, $row['discription']);
            $prestasi->setCellValue('F' . $rowexcel, $row['frapa_reg_code']);
            $prestasi->setCellValue('G' . $rowexcel, $row['frapa_reg_date']);
            $prestasi->setCellValue('H' . $rowexcel, $row['frapa_exp_date']);
            $prestasi->setCellValue('I' . $rowexcel, $row['tm_reg_code']);
            $prestasi->setCellValue('J' . $rowexcel, $row['tm_reg_date']);
            $prestasi->setCellValue('K' . $rowexcel, $row['tm_exp_date']);
            $prestasi->setCellValue('L' . $rowexcel, $row['fwa_reg_code']);
            $prestasi->setCellValue('M' . $rowexcel, $row['fwa_reg_date']);
            $prestasi->setCellValue('N' . $rowexcel, $row['fwa_exp_date']);
            $prestasi->setCellValue('O' . $rowexcel, $row['cr_reg_code']);
            $prestasi->setCellValue('P' . $rowexcel, $row['cr_reg_date']);
            $prestasi->setCellValue('Q' . $rowexcel, $row['fwa_exp_date']);
            // $prestasi->setCellValue('R' . $rowexcel, $row['regi_time']);
            // $prestasi->setCellValue('S' . $rowexcel, $status);
            // $prestasi->setCellValue('T' . $rowexcel, $assignname);
            // $prestasi->setCellValue('U' . $rowexcel, $row['caller_rate']);
            // $prestasi->setCellValue('V' . $rowexcel, $row['NCU_comment']);
            // $prestasi->setCellValue('W' . $rowexcel, $row['NCU_called_time']);
            // $prestasi->setCellValue('X' . $rowexcel, $Noofdays);
            // $prestasi->setCellValue('Y' . $rowexcel, $row['current_product_comment']);
            // $prestasi->setCellValue('Z' . $rowexcel, $deustatus);
        }
        $prestasi->setTitle('Users Data List');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"writer_data.xls\"");
        header("Cache-Control: max-age=0");
        //  $objWriter->setPreCalculateFormulas(FALSE);
        $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");

        ob_end_clean();
        $objWriter->save("php://output");
    }
function export_to_excel_category()
{
        // $tbl = "registration";
        // $clm = "category";
         $val = $this->input->get('category');

        $data['category'] = $this->admin->category($val);
        // print_r($data['category'] );exit;
        $this->load->library('excel');
        $phpExcel = new PHPExcel();
        $prestasi = $phpExcel->setActiveSheetIndex(0);
        //merger
        $phpExcel->getActiveSheet()->mergeCells('A1:Q1');
        //manage row hight
        $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
        //style alignment
        $styleArray = array(
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $phpExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($styleArray);
        //border
        $styleArray1 = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        //background
        $styleArray12 = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => array(
                    'rgb' => 'FFEC8B',
                ),
            ),
        );
        //freeepane
        $phpExcel->getActiveSheet()->freezePane('A3');
        //coloum width
        $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(30);
  

        // $prestasi->setCellValue('A2', 'Sr no.');
        $prestasi->setCellValue('A2', 'Title');
        $prestasi->setCellValue('B2', 'Category');
        $prestasi->setCellValue('C2', 'Genre');
        $prestasi->setCellValue('D2', 'Writer');
        $prestasi->setCellValue('E2', 'Description');
        $prestasi->setCellValue('F2', 'FRAPA Registration Code');
        $prestasi->setCellValue('G2', 'FRAPA Registration Date');
        $prestasi->setCellValue('H2', 'FRAPA Expiry Date');
        $prestasi->setCellValue('I2', 'IFTPC Registration Code');
        $prestasi->setCellValue('J2', 'IFTPC Registration Date');
        $prestasi->setCellValue('K2', 'IFTPC Expiry Date');
        $prestasi->setCellValue('L2', 'FWA Registration Code');
        $prestasi->setCellValue('M2', 'FWA Registration Date');
        $prestasi->setCellValue('N2', 'FWA Expiry Date');
        $prestasi->setCellValue('O2', 'IPR Registration Code');
        $prestasi->setCellValue('P2', 'IPR Registration Date');
        $prestasi->setCellValue('Q2', 'IPR Expiry Date');
        // $prestasi->setCellValue('S2', 'Status');
        // $prestasi->setCellValue('T2', 'Assign To');
        // $prestasi->setCellValue('U2', 'Caller rating');
        // $prestasi->setCellValue('V2', 'Executive Comment');
        // $prestasi->setCellValue('W2', 'NCU Called the lead');
        // $prestasi->setCellValue('X2', 'Delivery days');
        // $prestasi->setCellValue('Y2', 'Current Product in use Comment');
        // $prestasi->setCellValue('Z2', 'DEU Status');

        $data = $data['category'];
// echo '<pre>';print_r($data);exit;

         $no = 0;
        $rowexcel = 2;

        foreach ($data as $row) {

            $no++;
            $rowexcel++;

            $prestasi->setCellValue('A' . $rowexcel, $row['title']);
            $prestasi->setCellValue('B' . $rowexcel, $row['category']);
            $prestasi->setCellValue('C' . $rowexcel, $row['genre']);
            $prestasi->setCellValue('D' . $rowexcel, $row['writer']);
            $prestasi->setCellValue('E' . $rowexcel, $row['discription']);
            $prestasi->setCellValue('F' . $rowexcel, $row['frapa_reg_code']);
            $prestasi->setCellValue('G' . $rowexcel, $row['frapa_reg_date']);
            $prestasi->setCellValue('H' . $rowexcel, $row['frapa_exp_date']);
            $prestasi->setCellValue('I' . $rowexcel, $row['tm_reg_code']);
            $prestasi->setCellValue('J' . $rowexcel, $row['tm_reg_date']);
            $prestasi->setCellValue('K' . $rowexcel, $row['tm_exp_date']);
            $prestasi->setCellValue('L' . $rowexcel, $row['fwa_reg_code']);
            $prestasi->setCellValue('M' . $rowexcel, $row['fwa_reg_date']);
            $prestasi->setCellValue('N' . $rowexcel, $row['fwa_exp_date']);
            $prestasi->setCellValue('O' . $rowexcel, $row['cr_reg_code']);
            $prestasi->setCellValue('P' . $rowexcel, $row['cr_reg_date']);
            $prestasi->setCellValue('Q' . $rowexcel, $row['fwa_exp_date']);
            // $prestasi->setCellValue('R' . $rowexcel, $row['regi_time']);
            // $prestasi->setCellValue('S' . $rowexcel, $status);
            // $prestasi->setCellValue('T' . $rowexcel, $assignname);
            // $prestasi->setCellValue('U' . $rowexcel, $row['caller_rate']);
            // $prestasi->setCellValue('V' . $rowexcel, $row['NCU_comment']);
            // $prestasi->setCellValue('W' . $rowexcel, $row['NCU_called_time']);
            // $prestasi->setCellValue('X' . $rowexcel, $Noofdays);
            // $prestasi->setCellValue('Y' . $rowexcel, $row['current_product_comment']);
            // $prestasi->setCellValue('Z' . $rowexcel, $deustatus);
        }
        $prestasi->setTitle('Users Data List');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"category_data.xls\"");
        header("Cache-Control: max-age=0");
        //  $objWriter->setPreCalculateFormulas(FALSE);
        $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");

        ob_end_clean();
        $objWriter->save("php://output");
}
    function export_to_excel_title()
    {
      $val = $this->input->get('title');
      $tbl="registration";

        $data['result'] = $this->admin->searchbytitle($tbl,$val);
        // print_r($data['category'] );exit;
        $this->load->library('excel');
        $phpExcel = new PHPExcel();
        $prestasi = $phpExcel->setActiveSheetIndex(0);
        //merger
        $phpExcel->getActiveSheet()->mergeCells('A1:Q1');
        //manage row hight
        $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
        //style alignment
        $styleArray = array(
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $phpExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($styleArray);
        //border
        $styleArray1 = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        //background
        $styleArray12 = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => array(
                    'rgb' => 'FFEC8B',
                ),
            ),
        );
        //freeepane
        $phpExcel->getActiveSheet()->freezePane('A3');
        //coloum width
        $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(30);
  

        // $prestasi->setCellValue('A2', 'Sr no.');
        $prestasi->setCellValue('A2', 'Title');
        $prestasi->setCellValue('B2', 'Category');
        $prestasi->setCellValue('C2', 'Genre');
        $prestasi->setCellValue('D2', 'Writer');
        $prestasi->setCellValue('E2', 'Description');
        $prestasi->setCellValue('F2', 'FRAPA Registration Code');
        $prestasi->setCellValue('G2', 'FRAPA Registration Date');
        $prestasi->setCellValue('H2', 'FRAPA Expiry Date');
        $prestasi->setCellValue('I2', 'IFTPC Registration Code');
        $prestasi->setCellValue('J2', 'IFTPC Registration Date');
        $prestasi->setCellValue('K2', 'IFTPC Expiry Date');
        $prestasi->setCellValue('L2', 'FWA Registration Code');
        $prestasi->setCellValue('M2', 'FWA Registration Date');
        $prestasi->setCellValue('N2', 'FWA Expiry Date');
        $prestasi->setCellValue('O2', 'IPR Registration Code');
        $prestasi->setCellValue('P2', 'IPR Registration Date');
        $prestasi->setCellValue('Q2', 'IPR Expiry Date');
        // $prestasi->setCellValue('S2', 'Status');
        // $prestasi->setCellValue('T2', 'Assign To');
        // $prestasi->setCellValue('U2', 'Caller rating');
        // $prestasi->setCellValue('V2', 'Executive Comment');
        // $prestasi->setCellValue('W2', 'NCU Called the lead');
        // $prestasi->setCellValue('X2', 'Delivery days');
        // $prestasi->setCellValue('Y2', 'Current Product in use Comment');
        // $prestasi->setCellValue('Z2', 'DEU Status');

        $data = $data['result'];
// echo '<pre>';print_r($data);exit;

         $no = 0;
        $rowexcel = 2;

        foreach ($data as $row) {

            $no++;
            $rowexcel++;

            $prestasi->setCellValue('A' . $rowexcel, $row['title']);
            $prestasi->setCellValue('B' . $rowexcel, $row['category']);
            $prestasi->setCellValue('C' . $rowexcel, $row['genre']);
            $prestasi->setCellValue('D' . $rowexcel, $row['writer']);
            $prestasi->setCellValue('E' . $rowexcel, $row['discription']);
            $prestasi->setCellValue('F' . $rowexcel, $row['frapa_reg_code']);
            $prestasi->setCellValue('G' . $rowexcel, $row['frapa_reg_date']);
            $prestasi->setCellValue('H' . $rowexcel, $row['frapa_exp_date']);
            $prestasi->setCellValue('I' . $rowexcel, $row['tm_reg_code']);
            $prestasi->setCellValue('J' . $rowexcel, $row['tm_reg_date']);
            $prestasi->setCellValue('K' . $rowexcel, $row['tm_exp_date']);
            $prestasi->setCellValue('L' . $rowexcel, $row['fwa_reg_code']);
            $prestasi->setCellValue('M' . $rowexcel, $row['fwa_reg_date']);
            $prestasi->setCellValue('N' . $rowexcel, $row['fwa_exp_date']);
            $prestasi->setCellValue('O' . $rowexcel, $row['cr_reg_code']);
            $prestasi->setCellValue('P' . $rowexcel, $row['cr_reg_date']);
            $prestasi->setCellValue('Q' . $rowexcel, $row['fwa_exp_date']);
            // $prestasi->setCellValue('R' . $rowexcel, $row['regi_time']);
            // $prestasi->setCellValue('S' . $rowexcel, $status);
            // $prestasi->setCellValue('T' . $rowexcel, $assignname);
            // $prestasi->setCellValue('U' . $rowexcel, $row['caller_rate']);
            // $prestasi->setCellValue('V' . $rowexcel, $row['NCU_comment']);
            // $prestasi->setCellValue('W' . $rowexcel, $row['NCU_called_time']);
            // $prestasi->setCellValue('X' . $rowexcel, $Noofdays);
            // $prestasi->setCellValue('Y' . $rowexcel, $row['current_product_comment']);
            // $prestasi->setCellValue('Z' . $rowexcel, $deustatus);
        }
        $prestasi->setTitle('Users Data List');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"search_data.xls\"");
        header("Cache-Control: max-age=0");
        //  $objWriter->setPreCalculateFormulas(FALSE);
        $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");

        ob_end_clean();
        $objWriter->save("php://output");


    }
    function export_to_excel_writers()
    {
       $val = $this->input->get('writer');
      

        $data['result'] = $this->admin->searchbywriterdata($val);
        // print_r($data['category'] );exit;
        $this->load->library('excel');
        $phpExcel = new PHPExcel();
        $prestasi = $phpExcel->setActiveSheetIndex(0);
        //merger
        $phpExcel->getActiveSheet()->mergeCells('A1:Q1');
        //manage row hight
        $phpExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(25);
        //style alignment
        $styleArray = array(
            'alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $phpExcel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        $phpExcel->getActiveSheet()->getStyle('A1:Q1')->applyFromArray($styleArray);
        //border
        $styleArray1 = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );
        //background
        $styleArray12 = array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                'startcolor' => array(
                    'rgb' => 'FFEC8B',
                ),
            ),
        );
        //freeepane
        $phpExcel->getActiveSheet()->freezePane('A3');
        //coloum width
        $phpExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('X')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(30);
        $phpExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(30);
  

        // $prestasi->setCellValue('A2', 'Sr no.');
        $prestasi->setCellValue('A2', 'Title');
        $prestasi->setCellValue('B2', 'Category');
        $prestasi->setCellValue('C2', 'Genre');
        $prestasi->setCellValue('D2', 'Writer');
        $prestasi->setCellValue('E2', 'Description');
        $prestasi->setCellValue('F2', 'FRAPA Registration Code');
        $prestasi->setCellValue('G2', 'FRAPA Registration Date');
        $prestasi->setCellValue('H2', 'FRAPA Expiry Date');
        $prestasi->setCellValue('I2', 'IFTPC Registration Code');
        $prestasi->setCellValue('J2', 'IFTPC Registration Date');
        $prestasi->setCellValue('K2', 'IFTPC Expiry Date');
        $prestasi->setCellValue('L2', 'FWA Registration Code');
        $prestasi->setCellValue('M2', 'FWA Registration Date');
        $prestasi->setCellValue('N2', 'FWA Expiry Date');
        $prestasi->setCellValue('O2', 'IPR Registration Code');
        $prestasi->setCellValue('P2', 'IPR Registration Date');
        $prestasi->setCellValue('Q2', 'IPR Expiry Date');
        // $prestasi->setCellValue('S2', 'Status');
        // $prestasi->setCellValue('T2', 'Assign To');
        // $prestasi->setCellValue('U2', 'Caller rating');
        // $prestasi->setCellValue('V2', 'Executive Comment');
        // $prestasi->setCellValue('W2', 'NCU Called the lead');
        // $prestasi->setCellValue('X2', 'Delivery days');
        // $prestasi->setCellValue('Y2', 'Current Product in use Comment');
        // $prestasi->setCellValue('Z2', 'DEU Status');

        $data = $data['result'];
// echo '<pre>';print_r($data);exit;

         $no = 0;
        $rowexcel = 2;

        foreach ($data as $row) {

            $no++;
            $rowexcel++;

            $prestasi->setCellValue('A' . $rowexcel, $row['title']);
            $prestasi->setCellValue('B' . $rowexcel, $row['category']);
            $prestasi->setCellValue('C' . $rowexcel, $row['genre']);
            $prestasi->setCellValue('D' . $rowexcel, $row['writer']);
            $prestasi->setCellValue('E' . $rowexcel, $row['discription']);
            $prestasi->setCellValue('F' . $rowexcel, $row['frapa_reg_code']);
            $prestasi->setCellValue('G' . $rowexcel, $row['frapa_reg_date']);
            $prestasi->setCellValue('H' . $rowexcel, $row['frapa_exp_date']);
            $prestasi->setCellValue('I' . $rowexcel, $row['tm_reg_code']);
            $prestasi->setCellValue('J' . $rowexcel, $row['tm_reg_date']);
            $prestasi->setCellValue('K' . $rowexcel, $row['tm_exp_date']);
            $prestasi->setCellValue('L' . $rowexcel, $row['fwa_reg_code']);
            $prestasi->setCellValue('M' . $rowexcel, $row['fwa_reg_date']);
            $prestasi->setCellValue('N' . $rowexcel, $row['fwa_exp_date']);
            $prestasi->setCellValue('O' . $rowexcel, $row['cr_reg_code']);
            $prestasi->setCellValue('P' . $rowexcel, $row['cr_reg_date']);
            $prestasi->setCellValue('Q' . $rowexcel, $row['fwa_exp_date']);
            // $prestasi->setCellValue('R' . $rowexcel, $row['regi_time']);
            // $prestasi->setCellValue('S' . $rowexcel, $status);
            // $prestasi->setCellValue('T' . $rowexcel, $assignname);
            // $prestasi->setCellValue('U' . $rowexcel, $row['caller_rate']);
            // $prestasi->setCellValue('V' . $rowexcel, $row['NCU_comment']);
            // $prestasi->setCellValue('W' . $rowexcel, $row['NCU_called_time']);
            // $prestasi->setCellValue('X' . $rowexcel, $Noofdays);
            // $prestasi->setCellValue('Y' . $rowexcel, $row['current_product_comment']);
            // $prestasi->setCellValue('Z' . $rowexcel, $deustatus);
        }
        $prestasi->setTitle('Users Data List');
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"search_data.xls\"");
        header("Cache-Control: max-age=0");
        //  $objWriter->setPreCalculateFormulas(FALSE);
        $objWriter = PHPExcel_IOFactory::createWriter($phpExcel, "Excel5");

        ob_end_clean();
        $objWriter->save("php://output");  
    }
    function domain_notification()
    {

         if ($this->session->userdata('validated')) {
     // $frpa=$this->input->post('frpa');
     $getdata=$this->admin->iftpcdetail('domain_registration');
     $data['result']=$getdata;
     // echo '<pr>';
     // print_r($data['result']);
        $this->load->view('admin/show_domain_notification',$data);
//$this->load->view('admin-footer/footer');

        }
        else {
    redirect(base_url());              
             }
    }

    function count_iftpc_data()
   {
   if ($this->session->userdata('validated')) {
      $title=$this->input->get('title');  
          $getdata=$this->admin->count_iftc_data($title);
           $data['result']=$getdata;
            // echo '<pre>';
            // print_r($data['result']); 
        
            $this->load->view('admin/display_count_iftc_table',$data);
            $this->load->view('admin-footer/footer');
         }else  {
      redirect(base_url());
                }
}
function domain_expire()
{
    if ($this->session->userdata('validated')) {
  $domanin_name=$this->input->get('domanin_name'); 
          $getdata=$this->admin->count_domain_expire_data($domanin_name);
           $data['result']=$getdata;
            // echo '<pre>';
            // print_r($data['result']); 
        
            $this->load->view('admin/display_count_domain_expir_table',$data);
            $this->load->view('admin-footer/footer');
         }else  {
      redirect(base_url());
                }
}
function trademark_expire()
{
    if ($this->session->userdata('validated')) {
            $title=$this->input->get('title'); 
          $getdata=$this->admin->count_trademark_expire_data($title);
           $data['trade']=$getdata;
            // echo '<pre>';
            // print_r($data['result']); 
        
            $this->load->view('admin/display_count_trademark_expir_table',$data);
            $this->load->view('admin-footer/footer');
         }else  {
      redirect(base_url());
                }
}

function count_frapa_expire_data()
{
    if ($this->session->userdata('validated')) {
      $title=$this->input->get('title'); 
          $getdata=$this->admin->count_frpa_expire_data($title);
           $data['frpa']=$getdata;
            // echo '<pre>';
            // print_r($data['result']); 
        
            $this->load->view('admin/display_count_frpa_expir_table',$data);
            $this->load->view('admin-footer/footer');
         }else  {
      redirect(base_url());
                }
}
function Enter_title_to_search_registration_data()
{
    if ($this->session->userdata('validated')) {
      $title=$this->input->get('title');
          $getdata=$this->admin->title_search_Data('registration',$title);
           $data['title']=$getdata;
            // echo '<pre>';
            // print_r($data['title']); exit;
        
            $this->load->view('admin/display_title_related_data',$data);
            $this->load->view('admin-footer/footer');
         }else  {
      redirect(base_url());
                }
}
// function count_frapa_expire_data()
// {
//     if ($this->session->userdata('validated')) {
//       $title=$this->input->get('title');
//           $getdata=$this->admin->frpa_search_Data('registration',$title);
//            $data['title']=$getdata;
//             // echo '<pre>';
//             // print_r($data['title']); exit;
        
//             $this->load->view('admin/display_title_related_data',$data);
//             $this->load->view('admin-footer/footer');
//          }else  {
//       redirect(base_url());
//                 }
// }
}
?>