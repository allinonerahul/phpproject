<?php $arrAccess = isset($this->session->userdata['access_rights']) ? $this->session->userdata['access_rights'] : array(); ?>

<div id="container" class="row-fluid">
    <div id="sidebar" class="nav-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li class="element">
                <a href="<?php echo site_url("admin"); ?>" class="">
                    <span class="icon-box"> <i class="icon-dashboard"></i></span> Dashboard
                </a>
            </li>

            <li class="has-sub">
                <a href="<?php echo site_url('admin/associations') ?>" class="">
                    <span class="icon-box"> <img src="<?php echo base_url() ?>/uploads/images/association.png" style="max-width: 123% !important;" /></span>Associations
                </a>
            </li> 

            <li class="has-sub">
                <a href="<?php echo site_url('admin/title_registration') ?>" class="">
                    <span class="icon-box"> <img src="<?php echo base_url() ?>/uploads/images/Regis.png" style="max-width: 123% !important;" /></span>Registration
                </a>
            </li> 

            <li class="has-sub">
                <a href="<?php echo site_url('admin/domain_registration') ?>" class="">
                    <span class="icon-box"> <img src="<?php echo base_url() ?>/uploads/images/domainregis.png" style="max-width: 123% !important;" /></span>Domain Registration
                </a>
            </li>      

  <li class="has-sub">
                <a href="<?php echo site_url('admin/show_details') ?>" class="">
                    <span class="icon-box"> <img src="<?php echo base_url() ?>/uploads/images/order.png" style="max-width: 123% !important;" /></span>Show Details
                </a>
            </li>  
<li class="has-sub">
                <a href="<?php echo site_url('admin/report') ?>" class="">
                    <span class="icon-box"> <img src="<?php echo base_url() ?>/uploads/images/order.png" style="max-width: 123% !important;" /></span>Report
                </a>
            </li>  

<li class="has-sub">
                <a href="<?php echo site_url('admin/search_by_show') ?>" class="">
                    <span class="icon-box"> <img src="<?php echo base_url() ?>/uploads/images/order.png" style="max-width: 123% !important;" /></span>ShowReport
                </a>
            </li>  
<li class="has-sub">
                <a href="<?php echo site_url('admin/domain_notification') ?>" class="">
                    <span class="icon-box"> <img src="<?php echo base_url() ?>/uploads/images/order.png" style="max-width: 123% !important;" /></span>DomainNotification
                </a>
            </li>  


    </div>
