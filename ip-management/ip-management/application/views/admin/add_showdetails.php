<link href="<?php echo base_url(); ?>css/admin/pages/dashboard.css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url();?>/ckeditor/adapters/jquery.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url();?>/ckfinder/ckfinder.js"></script>-->
<!-- BEGIN PAGE -->
<style type="text/css">
    .title{
        background:#EEE;
        padding:10px;
        width: 445px;
        margin-bottom:20px; 
    }
</style>
<div id="main-content">
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
                    <li><a href="<?php echo site_url('admin/associations'); ?>"></a><span class="divider">&nbsp;</span></li>
                    <li><a href="#"></a><span class="divider-last">&nbsp;</span></li>
                </ul>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div id="page" class="dashboard">

            <div class="row-fluid">
                <div class="span12">
                    <!-- BEGIN SAMPLE FORMPORTLET-->
                    <div class="widget">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i>Add Show Details</h4>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo site_url(); ?>/admin/inserting_show_details" class="form-horizontal" name="add_article" id="add_article" method="post" enctype="multipart/form-data">

                                
                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Show Name<font color="red"> *</font></label>
                                          <div class="controls">
                                      <input type="text" placeholder="showname" class="input-xlarge" name="showname" required/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Broad Story<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="file" placeholder="" class="input-xlarge" name="broadstory" required/>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Story<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="file" placeholder="" class="input-xlarge" name="story" 
                                          required/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Charac Details<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="file" placeholder="" class="input-xlarge" name="characdetails"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>



                              <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Detailed Broad Story<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="file" placeholder="" class="input-xlarge" name="detail_brod_story"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>



                                   <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Show Presentation<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="file" placeholder="" class="input-xlarge" name="showpresentation"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>


                                     <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >SET Pictures<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="file" placeholder="" class="input-xlarge" name="image"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>







                              <!--  <div class="title"> <b>IFTPC</b></div>

                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Code/ No.<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="iftpc_reg_code"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="iftpc_reg_date" id="iftpc_reg_date" required/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" date-formate="yyyy/mm/dd" placeholder="" class="input-xlarge" name="iftpc_exp_date" id="iftpc_exp_date"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>                            -->      

                              
                                <!-- <input type="hidden" name="producttype" value="cr"> -->
                              
                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary"> SUBMIT </button>
                                </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
            </div>
        </div>			
    </div>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/scripts/form_validation.js"></script>
 <!--       
<script>

  $(function() {
    $( "#iftpc_reg_date" ).datepicker(

  {dateFormat :'yy-mm-dd'}
      );

  });
</script>

<script>
 $(function() {
    $( "#iftpc_exp_date" ).datepicker(
{dateFormat :'yy-mm-dd'}
      );
  });

</script> -->