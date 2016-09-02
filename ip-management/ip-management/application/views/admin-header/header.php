<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title><?php echo $site_details['site_name']; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/admin-css/style.css" rel="stylesheet" />

        <link href="<?php echo base_url(); ?>assets/admin-css/style_responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/admin-css/style_default.css" rel="stylesheet" id="style_color" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/uniform/css/uniform.default.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/chosen-bootstrap/chosen/chosen.css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/data-tables/DT_bootstrap.css" />
        <link href="<?php echo base_url(); ?>assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/jqvmap/jqvmap/jqvmap.css" media="screen" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/jquery-ui/jquery-ui-1.10.1.custom.min.css"/>
        <!--<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />-->
        <link href="<?php echo base_url(); ?>assets/admin-css/bootstrap-switch.min.css" rel="stylesheet" />
        
        
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin-css/bootstrap-fileupload.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin-js/jquery-1.8.3.min.js"></script>
        <!--<script src="<?php echo base_url(); ?>js/bootstrap-switch.min.js"></script>-->
        <script src="<?php echo base_url(); ?>assets/admin-js/bootbox.js"></script>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="<?php echo site_url(); ?>/admin" style="float:left; color: #000;">
                        
                        <!-- <img alt="<?php echo $site_details['site_name']; ?>" title="<?php echo $site_details['site_name']; ?>" src="<?php echo base_url(); ?>/uploads/images/<?php echo $site_details['site_logo']; ?>" style="height:56px; width:201px;  margin: 15px;"> -->
                        <div style="margin:23px 0 0 20px; color:#FFF;">
                            <h3><b>IP Management</b></h3>
                           <!--    <h3><b>IP Management</b></h3> -->

                        </div>
                        <!-- <div>
                            <p> notification</p>
                            </div> -->
                        
                    </a>
                    <!-- END LOGO -->
                    <div class="h-lable">
                    <table width="100%" style="border:none; color:#fff; font-size:15px;" cellpadding="0" cellspacing="0">
                    <tr>
                     
                
                      <td  name="frapa_exp_date"id="frapa_exp_date" style="color:#fff;"><a href="<?php echo site_url();?>/admin/count_frapa_expire_data" style="color:#fff; font-weight:600; word-spacing:2px;">Total Number of FRAPA Expire in 7 Days:<?php echo $result;?></a></td>

                      <td name="tm_exp_date" id="tm_exp_date"  style="color:#fff;"><a href="<?php echo site_url();?>/admin/count_iftpc_data" style="color:#fff; font-weight:600; word-spacing:2px;">Total Number of IFTPC Expire in 7 Days:<?php echo $iftpc;?></a> </td>
                      <td name="cr_exp_date" id="cr_exp_date"  style="color:#fff;"><a href="<?php echo site_url();?>/admin/trademark_expire" style="color:#fff; font-weight:600; word-spacing:2px;">Total Number of TradeMark Expir In 7 Days:<?php echo $trademark; ?></a></td>
                     <td name="exp_date" id="exp_date" onclick="getdomain();"  ><a href="<?php echo site_url();?>/admin/domain_expire" style="color:#fff; font-weight:600; word-spacing:2px;">Total Number of Domain Expir in 7 Days : <?php echo $domain; ?></a></td>        
                   
                    </tr>
                
                    </table>
                     <div id="getcount"></div>
                    </div>
                    <!-- END  NOTIFICATION -->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown <?php if($this->uri->segment(2) == 'viewMyProfile' || $this->uri->segment(2) == 'changePassword' || $this->uri->segment(2) == 'viewMyProfile') echo 'active'; ?>">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#000000">
                                    <span class="username" style="color:#fff;"><?php /*echo $user_data['name'];*/ ?></span>
                                    <b class="caret" style="border-bottom-color: #FFFFFF; border-top-color: #FFFFFF;"></b>
                                </a>
                                <ul class="dropdown-menu">
                                 
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url();?>/admin/changePassword"><i class="icon-lock"></i> Change Password</a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url(); ?>/login/doLogout"><i class="icon-key"></i> Log Out</a></li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
      
        <!-- END HEADER -->
        <script>
function getdata()
{
         var tm_exp_date=$('#tm_exp_date').val();
         $.ajax({
            url :'<?php echo site_url();?>/admin/count_iftpc_data',
            type:'POST',
            data :{'tm_exp_date':tm_exp_date,'noheader':1},
           success: function(msg) 
           {
            $('#getcount').html(msg);
           }
 
         });
         return false;
}


</script>
<script>
function  getdomain()
{
 var exp_date=$('#exp_date').val();
         $.ajax({
            url :'<?php echo site_url();?>/admin/domain_expire',
            type:'POST',
            data :{'exp_date':exp_date,'noheader':1},
           success: function(msg) 
           {
            $('#getcount').html(msg);
           }
 
         });
         return false;
}
</script>
<script>
function gettrademark()
{
var cr_exp_date=$('#cr_exp_date').val();
         $.ajax({
            url :'<?php echo site_url();?>/admin/trademark_expire',
            type:'POST',
            data :{'cr_exp_date':cr_exp_date,'noheader':1},
           success: function(msg) 
           {
            $('#getcount').html(msg);
           }
 
         });
         return false;
}
</script>
<script>
function getfrpa()
{
    // alert("hii");
    var frapa_exp_date =$('#frapa_exp_date').val();
    $.ajax({
        url :'<php echo site_url();?>/admin/count_frapa_expire_data',
        tpye:'POST',
        data :{'frapa_exp_date',frapa_exp_date,'noheader':1},
        success: function(msg)
        {
            $('#getcount').html(msg);
        }

    });
    return false;
}
</script>