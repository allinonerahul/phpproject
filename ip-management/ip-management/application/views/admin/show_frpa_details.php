<link href="<?php echo base_url(); ?>css/admin/pages/dashboard.css" rel="stylesheet" />
<!-- BEGIN PAGE -->
<div id="main-content" style="width: 150%;">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('admin'); ?>"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                    </li>
                    <li><a href="#"></a><span class="divider-last">&nbsp;</span></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <!-- BEGIN ADVANCED TABLE widget-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i>List Show Details</h4>
                    </div>
                    <div class="widget-body">
                        <div class="portlet-body">
                            <div class="clearfix">

                                <div class="btn-group">
                                    <a href="<?php echo site_url('admin/add_showdetails'); ?>">
                                        <button id="" class="btn btn-warning">
                                          Add  show Details<i class="icon-plus"></i>
                                        </button>
                                    </a>
                                </div>
                               
                            </div>
                            
                            <div class="space15"></div>
                            <span id="delete_error"></span>
                            <div class="space15"></div>
                            <?php if (isset($msg) && $msg != '') { ?>
                                <div class="alert alert-success">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <?php echo $msg; ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($err) && $err != '') { ?>
                                <div class="alert alert-error">
                                    <button class="close" data-dismiss="alert">×</button>
                                    <?php echo $err; ?>
                                </div>
                            <?php } ?>



    <table class="table table-bordered">
                              <tr>
                                
                                <th style="width:5px">SRNo</th>
                                <th style="width:5px">Title</title>

                                <th style="width:5px">FRAPA Registration Code</th>
                                <th style="width:5px">FRAPA Registration Date</th>
                                <th style="width:5px">FRAPA Expiry Date</th>
                              </tr>


                              <?php $sr=1; foreach($result as $val) { 

                                  if($val['frapa_reg_code'] == ''){
                                    continue;
                                  }

                                ?>
                          <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                 <td><?php echo $val['title'];?></td>
                                <td><?php echo $val['frapa_reg_code']; ?></td>
                                <td><?php
                                      $date=date_create($val['frapa_reg_date']);
                                      echo date_format($date,"d-m-y"); ?></td>
                                <td><?php $date=date_create($val['frapa_exp_date']);
                                       echo date_format($date,"d-m-y"); ?></td>  


                                
                          </tr>
                              <?php $sr++; } ?>
      </table>                                                    