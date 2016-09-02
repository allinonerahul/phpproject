<link href="<?php echo base_url(); ?>css/admin/pages/dashboard.css" rel="stylesheet" />
<!-- BEGIN PAGE -->
<div id="main-content" style="width: 227%;">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <ul class="breadcrumb">
                    <li>
                        <a href="<?php echo site_url('admin/search_title'); ?>"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
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
                        <h4><i class="icon-reorder"></i>Add Registration</h4>
                    </div>
                    <div class="widget-body">
                        <div class="portlet-body">
                            <div class="clearfix">

                               <!--  <div class="btn-group">
                                    <a href="<?php echo site_url('admin/add_titleregistration'); ?>">
                                        <button id="" class="btn btn-warning">
                                           Registration<i class="icon-plus"></i>
                                        </button>



                                    </a>
                                </div> -->
                            </div>

                    
                                <!-- <form action="<?php echo site_url();?>/admin/Enter_title_to_search_registration_data" method="get" id="misscall" class="printdata" style="margin-top: -69px;float: right;" >

                                  <div class="input-append filter" style="">                                   
                                    <input name="title" type="text" style="" placeholder="Enter Title" class="span12">
                                           
                                </div>
                                 <div class="input-append date">
                                    <label> &nbsp;</label>
                                    <button class="btn btn-success" style="margin-left: 10px;margin-top: -17px;" type="submit"  >Search</button>
                                </div>
                         </form>
                                -->
                        
                            
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
                                <th style="width:5px" >Title</th>
                                <th style="width:50px">Category</th>
                                <th style="width:8px">Genre</th>
                                <th style="width:8px">Writer</th>
                                <th style="width:8px">Description</th>
                                <th style="width:8px">FRAPA Registration Code</th>
                                <th style="width:8px">FRAPA Registration Date</th>
                                <th style="width:8px">FRAPA Expiry Date</th>
                                <th style="width:8px">IFTPC Title Registered</th>
                              <!--   <th style="width:8px">IFTPC Category </th> -->
                                <th style="width:8px">IFTPC Registration Date</th>
                                <th style="width:8px">IFTPC Expiry Date</th>
                                <th style="width:8px">FWA Registration Code</th>
                                <th style="width:8px">FWA Registration Date</th>
                              <!--   <th style="width:8px">FWA Expiry Date</th> -->
                                <th style="width:8px">Concepts</th>
                                <th style="width:8px">Trademark Registration Code</th>
                                <th style="width:8px">Trademark Registration Date</th>
                                  <th style="width:8px">Trademark Expiry Date</th>
                                <th style="width:8px">Trademark Image</th>
                                <th style="width:8px">Trademark Status</th>
                                <th style="width:8px">Copyright Diary no</th>
                                <th style="width:8px"> Copyright application Date </th>
                                <th style="width:8px">Copyright Reg Diary No</th>
                                <th style="width:8px">Copyright confirmation Date</th>
                                
                                  
                              
                                <th style="width:8px">Action</th>
                              </tr>


                              <?php $sr=1; foreach($title as $val){ 

// echo '<pre>';
// print_r($result);

                                ?>
                          <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                <td><?php echo $val['title']; ?></td>
                                <td><?php echo $val['category']; ?></td>
                                <td><?php echo $val['genre']; ?></td> 
                                <td><?php echo $val['writer']; ?></td> 
                                <td width="10%"><?php echo $val['discription']; ?></td>
                                <td><?php echo $val['frapa_reg_code']; ?></td>
                          
                                <td><?php $date=date_create($val['frapa_reg_date']);
                                echo date_format($date,"d-m-y");?></td>


                          
                                   <td><?php $date=date_create($val['frapa_exp_date']);
                                echo date_format($date,"d-m-y");?></td>

                                <td><?php echo $val['tm_reg_code']; ?></td>
                              

                                      <td><?php $date=date_create($val['tm_reg_date']);
                                echo date_format($date,"d-m-y");?></td>

                                        <td><?php $date=date_create($val['tm_exp_date']);
                                echo date_format($date,"d-m-y");?></td>


                                <td><?php echo $val['fwa_reg_code']; ?></td>



                               
                                 <td><?php $date=date_create($val['fwa_reg_date']);
                                echo date_format($date,"d-m-y");?></td>



                            <!--     <td><?php echo $val['fwa_exp_date']; ?></td> -->
                                <td><a href="<?php echo base_url();?>/concepts/<?php echo $val['concepts'];?>"><?php echo $val['concepts'];?></a></td>
<!-- <td><a href="<?php echo base_url();?>/detail_brod_story/<?php echo $val['detail_brod_story']; ?>"><?php echo $val['detail_brod_story'];?></a></td> -->
                                <td><?php echo $val['cr_reg_code']; ?></td>
                                <!-- <td><?php echo $val['cr_reg_date']; ?></td> -->
                                       <td><?php $date=date_create($val['cr_reg_date']);
                                echo date_format($date,"d-m-y");?></td>


                               
                                 <td><?php $date=date_create($val['cr_exp_date']);
                                echo date_format($date,"d-m-y");?></td>

                                <td>
                                <?php if($val['image'] ) { ?>
                                <img width=150px src="<?php echo base_url();?>trademark_image/<?php echo $val['image'];?>">
                                <?php } ?></td>
                                <td><?php echo $val['status']; ?></td>
                                <td><?php echo $val['diaryno']; ?></td>
                                 <td><?php $date=date_create($val['application_date']);
                                echo date_format($date,"d-m-y");?></td>

                               <!--  <td><?php echo $val['application_date'];?></td> -->
                                <td><?php echo $val['reg_diary_no'];?></td>

                                <td><?php $date=date_create($val['Confirmation_date']);
                                echo date_format($date,"d-m-y");?></td>
                                
                                <!-- <td><?php echo $val['Confirmation_date'];?></td>
 -->
                       <td><a class="btn btn-warning" href="<?php echo site_url();?>/admin/edit_title_registration/<?php echo $val['registration_id']?>">Edit</a>
    <a class="btn btn-danger" href="<?php echo site_url();?>/admin/delete_title_registration/<?php echo $val['registration_id']?>">Delete</a></td>
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
