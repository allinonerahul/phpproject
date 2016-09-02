<?php

/**
 * Site Mails.
 *
 * @package
 * @subpackage lib
 * @author     
 * @version    SVN: $Id: siteMails.class.php $
 */
class sendmails {

    protected $mailer;
    protected $charSet;
    protected $contentType;
    protected $senderEmail;
    protected $senderLabel;
    protected $fromEmail;
    protected $fromLabel;
    protected $replyTo;
    protected $address;
    protected $subject;
    protected $body;
    protected $siteName;
    protected $sitePublicPath;
    protected $attachments;

    public function __construct() {

        $this->mailer = 'sendmail';
        $this->charSet = 'utf-8';
        $this->contentType = 'text/html';
        $this->senderEmail = '';
        $this->senderLabel = '';
        $this->fromLabel = '';
        $this->replyTo = config_item('site_mail_reply');
        $this->replyToName = '';
        $this->address = '';
        $this->profile_image = '';
        $this->subject = '';
        $this->body = '';
        $this->bcc = '';
        $this->attachments = '';

        $this->fromName = config_item('mail_from_name');
        $this->fromEmail = config_item('site_mail_from');
        $this->siteName = config_item('mail_from_site');


        $this->supportMail = config_item('site_mail_support');


        $templatePath = config_item('site_url') . 'application/libraries/maillayout.html';
        $this->body = $file = file_get_contents($templatePath);
        //echo $this->body;
    }

     static public function getSiteEmails($emailKey) {

           $sql = "SELECT * from sitemails where emailname='".$emailKey."' ";
            $CI =& get_instance();
            $query  = $CI->db->query($sql);
	       return  $query->result();
    }


    public function sendSfMail() {


        $mail = new PHPMailer();
        $mail->IsSMTP();         // telling the class to use SMTP
        $mail->SMTPDebug = 1;                     // enables SMTP debug information (for testing)
        // 1 = errors and messages
        // 2 = messages only
        $mail->SMTPAuth = config_item('smtp_security');  // enable SMTP authentication
        #$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
        $mail->Host = config_item('smtp_host');      // sets  as the SMTP server
        $mail->Port = config_item('smtp_port');                   // set the SMTP port for the server
        $mail->Username = config_item('smtp_username');  // username
        $mail->Password = config_item('smtp_password');            // password
        // REPLACE VARIABLES
        $this->body = str_replace('##SITE_NAME##', $this->siteName, $this->body);
        $this->body = str_replace('##SITE_URL##', config_item('site_url'), $this->body);
        $this->body = str_replace('##PUBLIC_PATH##', $this->sitePublicPath, $this->body);
        $this->body = str_replace('##PROFILE_IMAGE##', $this->profile_image, $this->body);
        $this->body = str_replace('##EMAIL##', $this->address, $this->body);

        $this->body = str_replace('##SUPPORT_EMAIL##', $this->supportMail, $this->body);

        $mail->AddReplyTo($this->replyTo, $this->replyToName);
        $mail->SetFrom($this->fromEmail, $this->fromName);
        //$mail->ReturnPath = $this->replyTo;
        $mail->Subject = $this->subject;
        $mail->MsgHTML($this->body);
        $mail->AddAddress($this->address, "cyprus.com");
        if ($this->bcc) {
            $mail->AddBCC($this->bcc);
        }
        if ($this->attachments) {
            $mail->AddAttachment($this->attachments);
        }


        //Send the message
        return $mail->Send();
    }

    public function sendRegistrationEmail($arrParams = array()) {
        
        //print_r($arrParams);
        //print_r($arrParams);die;
        $objSiteEmails = self::getSiteEmails("REGISTRATION_MAIL");

        $this->address = $arrParams["email"];
        $this->subject = $objSiteEmails->getSubject();
        $mailcontent = $objSiteEmails->getBody();

        $this->subject = str_replace('##SITE_NAME##', $this->siteName, $this->subject);

        $mailcontent = str_replace('##EMAIL##', $arrParams["email"], $mailcontent);
        $mailcontent = str_replace('##FIRST_NAME##', $arrParams["username"], $mailcontent);
        $mailcontent = str_replace('##SITE_NAME##', $this->siteName, $mailcontent);

        $mailcontent = str_replace('##ACTIVATION_LINK##', url_for('registration/verifyAccount?activationCode=' . $arrParams["activationcode"], true), $mailcontent);

        $this->body = str_replace('##MAIL_CONTENT##', $mailcontent, $this->body);


        $this->sendSfMail();
    }


    public function sendForgotPassword($arrParams = array()) {
        
        $objSiteEmails = self::getSiteEmails("FORGOT_PASSWORD");

        $this->address = $arrParams["email"];
        $this->subject = $objSiteEmails->getSubject();

        $mailcontent = $objSiteEmails->getBody();

        $mailcontent = str_replace('##FIRST_NAME##', $arrParams["username"], $mailcontent);
        $mailcontent = str_replace('##LOGIN_ID##', $arrParams["email"], $mailcontent);
        $mailcontent = str_replace('##PASSWORD##', $arrParams["password"], $mailcontent);

        $this->body = str_replace('##MAIL_CONTENT##', $mailcontent, $this->body);

        $this->sendSfMail();
    }

    public function sendChangePasswordEmail($arrParams = array()) {
        
        $objSiteEmails = self::getSiteEmails("PASSWORD_CHANGE_EMP");

        $this->address = $arrParams["email"];
        $this->subject = $objSiteEmails->getSubject();
        $mailcontent = $objSiteEmails->getBody();


        $this->subject = str_replace('##SITE_NAME##', $this->siteName, $this->subject);

        $mailcontent = str_replace('##FIRST_NAME##', $arrParams["first_name"], $mailcontent);
        $mailcontent = str_replace('##NEW_PASSWORD##', $arrParams["newPassword"], $mailcontent);
        $this->body = str_replace('##MAIL_CONTENT##', $mailcontent, $this->body);

        $this->sendSfMail();
    }


}
