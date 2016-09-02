<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
  <meta charset="utf-8"/>
  <title>Login page</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-fileupload.css" />
  <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin-css/style.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin-css/style_responsive.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/admin-css/style_default.css" rel="stylesheet" id="style_color" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/uniform/css/uniform.default.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/chosen-bootstrap/chosen/chosen.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css" />
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin-js/jquery-1.8.3.min.js"></script>

</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body>
<div id="login-body">
  <div class="login-header">
      <!-- BEGIN LOGO -->
      <a class="brand">
          <!--Healthcare-->
          <!--<img alt="<?php echo $site_details['site_name']; ?>" title="<?php echo $site_details['site_name']; ?>" src="<?php echo base_url(); ?>/uploads/images/<?php echo $site_details['site_logo']; ?>" style="height:60px;width:110px;float:left;"/>-->
      </a>
      <div id="logo" class="center">
<!--          <img src="<?php echo base_url(); ?>img/logo.png" alt="logo" class="center" />-->
          <h4><?php echo $site_details['site_name']; ?></h4>
      </div>
      <!-- END LOGO -->
  </div>

  <!-- BEGIN LOGIN -->
  <div id="login" style="background: url('<?php echo base_url() ?>/uploads/images/login_bg_trans.png')">
    <!-- BEGIN LOGIN FORM -->
    <form id="loginform" class="form-vertical no-padding no-margin" action="<?php echo site_url(); ?>/login/processLogin" method="post">
<!--      <input type="hidden" name="session_type" value="<?php if($this->uri->segment(2) == 'enquiry') echo 'Enquiry'; else echo 'Insurance'; ?>"/>-->
      <div class="lock">
<!--          <i class="icon-lock"></i>-->
          <!-- <img src="<?php echo base_url('uploads/images/logo.png')?>"/> -->
          <h4>[ IP Management ]</h4>
      </div>
      <div class="control-wrap">
          <!--<h4>User Login</h4>-->
          <p id="ajxlist"></p>
          <?php if(isset($msg) && $msg != '') { ?>
            <div class="alert alert-error">
                <button class="close" data-dismiss="alert">×</button>
                <span><?php echo $msg; ?></span>
            </div>
          <?php } ?>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-user"></i></span><input id="input-username" name="username" class='span3' autocomplete="off" type="text" placeholder="Username" value="<?php if(isset ($_COOKIE['username'])) echo $_COOKIE['username']; ?>"/>
                  </div>
              </div>
          </div>
          <div class="control-group">
              <div class="controls">
                  <div class="input-prepend">
                      <span class="add-on"><i class="icon-key"></i></span><input id="input-password" name="password" class='span3' autocomplete="off" type="password" placeholder="Password" value="<?php if(isset ($_COOKIE['password'])) echo $_COOKIE['password']; ?>"/>
                  </div>
                  <!--<div class="mtop10">
                      <div class="block-hint pull-left small">
                          <input type="checkbox" name="remember" id="" value="1" <?php if(isset($_COOKIE['remember_me'])) { echo 'checked="checked"'; } else { echo ''; } ?> /> Remember Me
                      </div>
                      <div class="pull-right">
                          <a style='color: #000;' href="<?php echo site_url('login/forgetPassword'); ?>" class="" id="">Forgot Password?</a>
                      </div>
                  </div>-->

                  <div class="clearfix space5"></div>
                  
                  
              </div>
              

          </div>
          <input type="submit" id="login-btn" class="btn btn-block login-btn" value="Login" />       
      </div>

      
    </form>
    <!-- END LOGIN FORM -->        
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div id="login-copyright">
    <?php echo $site_details['site_name']; ?> @All Rights reserved
  </div>
  <!-- END COPYRIGHT -->
  <!-- BEGIN JAVASCRIPTS -->
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>admin/admin-js/jquery.blockui.js"></script>
<!--  <script src="<?php echo base_url(); ?>js/scripts.js"></script>-->
  <!-- END JAVASCRIPTS -->
  </div>
</body>
<!-- END BODY -->
</html>