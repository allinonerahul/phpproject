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
                            <h4><i class="icon-reorder"></i>Add Associations</h4>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo site_url(); ?>/admin/insert_concept" class="form-horizontal" name="add_article" id="add_article" method="post" enctype="multipart/form-data">

                                
                                <!-- <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Concept Name<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="Concept Name" class="input-xlarge" name="c_name" required/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Category<font color="red"> *</font></label>
                                          <div class="controls">
                                          <select  name="category" required/>
                                          <option value="">--Select--</option>
                                          <option value="Fiction">Fiction</option>
                                          <option value="Non Fiction">Non Fiction</option>
                                            <option value="TVC">TVC</option>    

                                        </select>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Genre<font color="red"> *</font></label>
                                          <div class="controls">
                                          <select  name="genre">
                                            <option value="">--Select--</option>
                                            <option value="Drama">Drama</option>
                                             <option value="Gameshow">Gameshow</option>
                                             <option value="Horror">Horror</option>
                                             <option value="Comedy">Comedy</option>
                                            </select>

                                          </div>
                                        </div>
                                    </div>
                                </div>
 -->


                                <div class="title"><b>FRAPA</b></div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Code/ No.<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="frapa_reg_code" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="frapa_reg_date" id="frapa_reg_date"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="frapa_exp_date" id="frapa_exp_date" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                    <div class="title"> <b>IFTPC</b></div>
                                  <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Code/ No.<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="tm_reg_code" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="tm_reg_date" id="tm_reg_date" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="tm_exp_date" id="tm_exp_date" />
                                          </div>
                                        </div>
                                    </div>
                                </div>








































                               <div class="title"> <b>FWA</b></div>

                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Code/ No.<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="fwa_reg_code"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="fwa_reg_date" id="fwa_reg_date"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="fwa_exp_date" id="fwa_exp_date"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>                                 

                                <!-- <div class="title"><b>FRAPA</b></div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Code/ No.<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="frapa_reg_code" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="frapa_reg_date" id="frapa_reg_date"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="frapa_exp_date" id="frapa_exp_date" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

 -->
                             <!--   <div class="title"> <b>Trademark</b></div>
                                  <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Code/ No.<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="tm_reg_code" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="tm_reg_date" id="tm_reg_date" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="tm_exp_date" id="tm_exp_date" />
                                          </div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="title"><b>IPR</b></div>
                                  <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Code/ No.<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="cr_reg_code"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="cr_reg_date" id="cr_reg_date"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="cr_exp_date"  id="cr_exp_date"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>
<!-- 
                                <hr style="width:460px; margin-bottom:30px;">
                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registered For<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="reg_for" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Author/Writer<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="author"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Synopsis<font color="red"> *</font></label>
                                          <div class="controls">
                                          <textarea class="input-xlarge" name="synopsis"/></textarea>
                                          </div>
                                        </div>
                                    </div>
                                </div> -->
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
       
<script>

$(function() {
    $( "#cr_reg_date" ).datepicker(

{dateFormat :'yy-mm-dd'}
      );
  });
</script>
<script>

$(function() {
    $( "#fwa_reg_date" ).datepicker(

{dateFormat :'yy-mm-dd'}
      );
  });

</script>
<script>
$(function() {
    $( "#fwa_exp_date" ).datepicker(


{dateFormat :'yy-mm-dd'}
      );
  });

</script>
<script>
$(function() {
    $( "#frapa_reg_date" ).datepicker(

    {dateFormat : 'yy-mm-dd'}
      );

     $( "#frapa_exp_date" ).datepicker(

{dateFormat :'yy-mm-dd'}
      );


 $( "#tm_reg_date" ).datepicker(

{dateFormat :'yy-mm-dd'}
  );

 $( "#cr_exp_date" ).datepicker(

{dateFormat : 'yy-mm-dd'}

  );
 $( "#tm_exp_date" ).datepicker(


{dateFormat :'yy-mm-dd'}
  );

  });



</script>