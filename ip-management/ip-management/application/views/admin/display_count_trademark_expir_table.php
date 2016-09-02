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
                        <h4><i class="icon-reorder"></i>List of TradeMark Expiry Details</h4>
                    </div>
                    <div class="widget-body">
                        <div class="portlet-body">
                            <div class="clearfix">

                                <!-- <div class="btn-group">
                                    <a href="<?php echo site_url('admin/add_showdetails'); ?>">
                                        <button id="" class="btn btn-warning">
                                          Add  show Details<i class="icon-plus"></i>
                                        </button>
                                    </a>
                                </div>
                                -->
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

<form action="<?php echo site_url();?>/admin/trademark_expire" method="get" id="misscall" class="printdata" style="margin-top: -69px;
  float: right;" >

                                  <div class="input-append filter" style="">                                   
                                    <input name="title" type="text" style="" placeholder="title" class="span12"  value="<?php
                                           if (isset($filter_search)) {
                                               echo $filter_search;
                                           }?>"/>
                                </div>
                                 <div class="input-append date">
                                    <label> &nbsp;</label>
                                    <button class="btn btn-success" style="margin-left: 10px;margin-top: -17px;" type="submit"  >Search</button>
                                </div>
                         </form>

   <table class="table table-bordered">
                              <tr>
                                <th width="5%">SRNo</th>
                                 <th width="5%">Title</th>
                                <th width="5%">Trademark Registration Code</th>
                                <th width="5%">Trademark Registration Date</th>
                                 <th width="5%">Trademark Expire Date</th>
                                <th width="5%">Trademark Image</th>
                                <th width="5%">Trademark Status</th>
                              </tr>
                              <?php $sr=1; foreach($trade as $val) {


                                  

                               ?>
                          <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                <td><?php echo $val['title'] ?></td>
                                <td><?php echo $val['cr_reg_code']; ?></td>
                               <!--  <td><?php echo $val['cr_reg_date']; ?></td> -->


                            <td><?php
                                  $date=date_create($val['cr_reg_date']);
                                  echo date_format($date,"d-m-y");
                                  ?></td>
                                  <td><?php
                                  $date=date_create($val['cr_exp_date']);
                                  echo date_format($date,"d-m-y");
                                  ?></td>

                                  <td>
                                   <?php  if($val['image']){ ?>
                                    <img width="100px"src="<?php echo base_url();?>/trademark_image/<?php echo $val['image'];?>"></img> 
                                     <?php } ?></td>
                                <td><?php echo $val['status']; ?></td>

                                
                          </tr>
                              <?php $sr++; } ?>
      </table>                                                    