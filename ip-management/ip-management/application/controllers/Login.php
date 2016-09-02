<?php
ini_set('error_reporting', E_ALL);
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Login extends CI_Controller {
    
       function __construct() {
        parent::__construct(); 
            $this->load->library('session');
                 //$this->load->library('Encryptdecrypt');
        $noheader = $this->input->get_post('noheader');
        $this->load->library('pagination');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->model('login_model', 'loginmodel');
        $this->load->model('admin_model', 'admin');
        
    }
    
      public function index($msg = NULL) {
        $data['msg'] = $msg;
        $data['site_details'] = $this->admin->getSiteDetails();
        $this->load->view('admin/login', $data);
     }
    
      public function processLogin() {
       //$session_type = $this->input->post('session_type');
       $username = stripslashes($this->input->post('username'));
       $password = stripslashes($this->input->post('password'));
       $username = $username;
       $password = $password;
      // $enc_password = $this->encryptdecrypt->crypt($password);
        $enc_password =$password;
       $remember = $this->input->post('remember');
       $result = $this->loginmodel->loginValidate($username,$enc_password);
       
       if(!$result){
           $msg = 'Invalid username and/or password.';
           $this->index($msg);
           
       }else{
           if ($remember == 1) {
                setcookie('username', $username, time() + 60 * 60 * 24 * 100, "/");
                setcookie('password', $password, time() + 60 * 60 * 24 * 100, "/");
                setcookie('remember_me', $remember, time() + 60 * 60 * 24 * 100, "/");
            } else {
                setcookie('username', 'gone', time() - 60 * 60 * 24 * 100, "/");
                setcookie('password', 'gone', time() - 60 * 60 * 24 * 100, "/");
                setcookie('remember_me', 'gone', time() - 60 * 60 * 24 * 100, "/");
            }
            redirect('admin');
       }
    }
    
    public function forgetPassword(){
        $data['msg'] = $this->input->get('msg');
        $data['err'] = $this->input->get('err');
        $data['site_details'] = $this->admin->getSiteDetails();
        $this->load->view('forgetPassword',$data);
    }
    
    public function forgotPwd() {
        $email = $this->input->post('email');
        $success = $this->loginmodel->emailValidate($email);
        if($success){
            $msg = 'Please check your mail for further proceedings!';
            redirect("login/forgetPassword?msg=$msg");
        }else{
            $err = 'Invalid Email id!';
            redirect("login/forgetPassword?err=$err");
        }
    }
    
    
    public function doLogout() {
        $array_items = array('id' => '', 'name' => '', 'email' => '', 'user_type' => '', 'validated' => FALSE);
        $this->session->unset_userdata($array_items);
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>
