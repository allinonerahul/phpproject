<?php $arrAccess = isset($this->session->userdata['access_rights']) ? $this->session->userdata['access_rights'] : array(); ?>
<!-- BEGIN PAGE -->
<div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('admin'); ?>"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                    </li>
                    <li><a href="#">Dashboard</a><span class="divider-last">&nbsp;</span></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <?php // if(in_array('all',$arrAccess) || in_array('4',$arrAccess)){ ?>
        <a href="<?php echo site_url("admin/associations"); ?>" >
                <div class="span3 responsive" data-tablet="span3" data-desktop="span2">
                    <div class="circle-wrap">
                        <div class="stats-circle blue-color">
                            <i class=""><img src="<?php echo base_url() ?>/uploads/images/association.png" style="width:86px; max-width: 57% ! important; margin-top: 3px;"  /></i>
                        </div>
                        <p>
                            <strong>Associations</strong>
                        </p>
                    </div>
                </div>
            </a>
          <?php // } ?>


<a href="<?php echo site_url(); ?>/admin/title_registration" >
                <div class="span3 responsive" data-tablet="span3" data-desktop="span2">
                    <div class="circle-wrap">
                        <div class="stats-circle blue-color">
                            <i class=""><img src="<?php echo base_url() ?>/uploads/images/Regis.png" style="width:86px; max-width: 57% ! important; margin-top: 3px;"  /></i>
                        </div>
                        <p>
                            <strong>Registration</strong>
                        </p>
                    </div>
                </div>
            </a>

<a href="<?php echo site_url(); ?>/admin/domain_registration" >
                <div class="span3 responsive" data-tablet="span3" data-desktop="span2">
                    <div class="circle-wrap">
                        <div class="stats-circle blue-color">
                            <i class=""><img src="<?php echo base_url() ?>/uploads/images/domainregis.png" style="width:86px; max-width: 57% ! important; margin-top: 3px;"  /></i>
                        </div>
                        <p>
                            <strong>Domain Registration</strong>
                        </p>
                    </div>
                </div>
            </a>




<a href="<?php echo site_url(); ?>/admin/show_details" >
                <div class="span3 responsive" data-tablet="span3" data-desktop="span2">
                    <div class="circle-wrap">
                        <div class="stats-circle blue-color">
                            <i class=""><img src="<?php echo base_url() ?>/uploads/images/order.png" style="width:86px; max-width: 57% ! important; margin-top: 3px;"  /></i>
                        </div>
                        <p>
                            <strong>Show Details</strong>
                        </p>
                    </div>
                </div>
            </a>
<a href="<?php echo site_url(); ?>/admin/report" >
                <div class="span3 responsive" data-tablet="span3" data-desktop="span2">
                    <div class="circle-wrap">
                        <div class="stats-circle blue-color">
                            <i class=""><img src="<?php echo base_url() ?>/uploads/images/order.png" style="width:86px; max-width: 57% ! important; margin-top: 3px;"  /></i>
                        </div>
                        <p>
                            <strong>Report</strong>
                        </p>
                    </div>
                </div>
            </a>
<a href="<?php echo site_url(); ?>/admin/search_by_show" >
                <div class="span3 responsive" data-tablet="span3" data-desktop="span2">
                    <div class="circle-wrap">
                        <div class="stats-circle blue-color">
                            <i class=""><img src="<?php echo base_url() ?>/uploads/images/order.png" style="width:86px; max-width: 57% ! important; margin-top: 3px;"  /></i>
                        </div>
                        <p>
                            <strong>ShowReport</strong>
                        </p>
                    </div>
                </div>
            </a>

       <a href="<?php echo site_url(); ?>/admin/domain_notification" >
                <div class="span3 responsive" data-tablet="span3" data-desktop="span2">
                    <div class="circle-wrap">
                        <div class="stats-circle blue-color">
                            <i class=""><img src="<?php echo base_url() ?>/uploads/images/order.png" style="width:86px; max-width: 57% ! important; margin-top: 3px;"  /></i>
                        </div>
                        <p>
                            <strong>DomainNotification</strong>
                        </p>
                    </div>
                </div>
            </a>     

    </div>
    <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>

