<?php
class Login_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        //$this->load->library('Encryptdecrypt');
        $this->load->database(); 
    }
    function loginValidate($username,$password) {
        $where = array('username' => $username, 'password' => $password);
        $query = $this->db->get_where('admin',$where);
       // echo $this->db->last_query();exit;
        if($query->num_rows() == 1){
            $row = $query->row();
            $data = array(
                'id' => $row->id,
                'name' => $row->fname,
                'email' => $row->email,
                'user_type' => $row->user_type,
                //'access_rights' => explode(',', $row->access_rights),
                'validated' => true
            );
            
            $set_session = $this->session->set_userdata($data);
            return true;
        }
        return false;
    }
    public function emailValidate($email) {

        $query = $this->db->query("select * from admin where email='".$email."' and status='1'");
        echo $this->db->last_query();
        if ($query->num_rows == 1) {
            $row = $query->row();
            $pass = $row->password;
            $password = $this->encryptdecrypt->decrypt($pass);
            $arrpwd = 1;
            $this->sendPassword($password, $email);
        } else {
             $arrpwd = 0;
        }
        //echo $arrpwd;exit;
        return $arrpwd;
    }

    function sendPassword($password, $email) {
//       
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from('anandrathod.genie@gmail.com', 'Anand Rathod');
        $this->email->to($email);
        $this->email->subject(' Your Password on PCT ');
        $text_body = "Your Password For PCT is :$password";
        $this->email->message($text_body);

        if ($this->email->send()) {
            //redirect('/login/resetLinkSuccess');
        } else {
            echo $this->email->print_debugger();
        }
    }
}
?>
