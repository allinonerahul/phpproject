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
                                <th style="width:5px">Sr no.</th>
                                <th style="width:5px" >Show Name</th>
                                <th style="width:50px">Broad Story</th>
                                <th style="width:8px">Story</th>
                                <th style="width:8px">Charac Details</th>
                                <th style="width:8px">Detailed Broad Story </th>
                                <th style="width:8px">Show Presentation</th>
                                <th style="width:8px">SET Pictures</th>
                                <th style="width:8px">Action</th>
                             <!--    <th style="width:5px">Action</th> -->
                              </tr>
                              <?php $sr=1; foreach($result as $val){ ?>
                              <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                <td><?php echo $val['showname'] ?></td>
                                <td><a href="<?php echo base_url();?>/broadstory/<?php echo $val['broadstory'] ?>"><?php echo $val['broadstory'];?></a></td>
                                <td><a href="<?php echo base_url();?>/story/<?php echo $val['story'] ?>"><?php echo $val['story']; ?></a></td>
                                <td><a href="<?php echo base_url();?>/characdetails/<?php echo $val['characdetails'];?>"><?php echo $val['characdetails'];?></a></td>
                                <td><a href="<?php echo base_url();?>/detail_brod_story/<?php echo $val['detail_brod_story']; ?>"><?php echo $val['detail_brod_story'];?></a></td>
                                <td><a href="<?php echo  base_url();?>/showpresentation/<?php echo $val['showpresentation'] ?>"><?php echo $val['showpresentation'];?></td>
                                <td><?php if($val['image']){ ?><img width="70px" src="<?php echo base_url();?>image/<?php echo $val['image'];?>"></img><?php } ?></td>
                        <td><a class="btn btn-warning" href="<?php echo site_url();?>/admin/edit_show_details/<?php echo $val['show_id']?>">Edit</a>
    <a class="btn btn-danger" href="<?php echo site_url();?>/admin/delete_show_detail/<?php echo $val['show_id'];?>">Delete</a></td> 
                              </tr>
                              <?php $sr++; } ?>
                            </table>
                            
                           
                        </div>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
            </div>
        </div>

        <!-- END ADVANCED TABLE widget-->

        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->
</div>
