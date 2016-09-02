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
                            <h4><i class="icon-reorder"></i> Registration</h4>
                        </div>
                        <div class="widget-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo site_url(); ?>/admin/insert_update_registration_concept" class="form-horizontal" name="add_article" id="add_article" method="post" enctype="multipart/form-data">

                                <?php foreach($result as $value) {  


                             ?>
                                <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Title<font color="red"> *</font></label>
                                          <div class="controls">
                                  <input type="text" placeholder="Title" class="input-xlarge" name="title" value="<?php echo $value['title']; ?>"/>

         <input type="hidden" placeholder="Title" class="input-xlarge" name="registration_id" id="registration_id" value="<?php echo $value['registration_id']; ?>"/>


                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Category<font color="red"> *</font></label>
                                          <div class="controls">
                                          <select  name="category"/>
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

                                    <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Writer<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="writer" value="<?php echo $value['writer'];?>"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>



                               <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Description<font color="red"> *</font></label>
                                          <div class="controls">
                                        <textarea  name="discription"rows="4" cols="50"><?php echo $value['discription'];?>

                                          </textarea>

                                          </div>
                                        </div>
                                    </div>
                                </div>






                             <div class="title"><b>FRAPA</b></div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Code/ No.<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="frapa_reg_code" value="<?php echo $value['frapa_reg_code'];?>" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="frapa_reg_date" id="frapa_reg_date" value="<?php echo $value['frapa_reg_date']; ?>"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="frapa_exp_date" id="frapa_exp_date" value="<?php echo $value['frapa_exp_date'];?>" />
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
                                          <input type="text" placeholder="" class="input-xlarge" name="tm_reg_code" value="<?php echo $value['tm_reg_code'];?>" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="tm_reg_date" id="tm_reg_date" value="<?php echo $value['tm_reg_date'];?>" />
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="tm_exp_date" id="tm_exp_date" value="<?php echo $value['tm_exp_date'];?>"/>
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
                                          <input type="text" placeholder="" class="input-xlarge" name="fwa_reg_code" value="<?php echo $value['fwa_reg_code'];?>"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="fwa_reg_date" id="fwa_reg_date" value="<?php echo $value['fwa_reg_date'];?>"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Expiry Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="fwa_exp_date" id="fwa_exp_date" value="<?php echo $value['fwa_exp_date'];?>"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                  <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Concept<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="file" placeholder="" class="input-xlarge" name="concepts" id="concepts"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>                                     


                                <div class="title"><b>TradeMark</b></div>
                                  <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Code/ No.<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="cr_reg_code" value="<?php echo $value['cr_reg_code'];?>"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Registration Date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="cr_reg_date" id="cr_reg_date" value="<?php echo $value['cr_reg_date'];?>"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Image<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="file" placeholder="" class="input-xlarge" name="image" id="image"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>


                                  <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Status<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="status" id="status" value="<?php echo $value['status'];?>">
                                          </div>
                                        </div>
                                    </div>
                                </div>





                                  <div class="title"><b>CopyRight</b></div>
                                  <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Diary no<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="diaryno" id="diaryno" value="<?php echo $value['diaryno'];?>">
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                 <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >application date <font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="application_date" id="application_date" value="<?php echo $value['application_date']; ?>">
                                          </div>
                                        </div>
                                    </div>
                                </div>

                                  <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Reg diary no <font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="reg_diary_no" id="reg_diary_no" value="<?php echo $value['reg_diary_no'];?>">
                                          </div>
                                        </div>
                                    </div>
                                </div>


                                  <div class="row-fluid">            
                                  <div class="span6 ">
                                    <div class="control-group">
                                      <label class="control-label" >Confirmation date<font color="red"> *</font></label>
                                          <div class="controls">
                                          <input type="text" placeholder="" class="input-xlarge" name="Confirmation_date" id="Confirmation_date" value="<?php echo $value['Confirmation_date'];?>"/>
                                          </div>
                                        </div>
                                    </div>
                                </div>






                        <?php }  ?> 
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
    $( "#frapa_reg_date" ).datepicker(

  {dateFormat :'yy-mm-dd'}
      );

  });
</script>

<script>
 $(function() {
    $( "#frapa_exp_date" ).datepicker(
{dateFormat :'yy-mm-dd'}
      );
  });
</script>
<script>
 $(function() {
    $( "#tm_reg_date" ).datepicker(
{dateFormat :'yy-mm-dd'}
      );
  });
</script>
<script>
 $(function() {
    $( "#tm_exp_date" ).datepicker(
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
    $( "#cr_reg_date" ).datepicker(
{dateFormat :'yy-mm-dd'}
      );
  });
</script>
<script>
 $(function() {
    $( "#cr_exp_date" ).datepicker(
{dateFormat :'yy-mm-dd'}
      );
  });
</script>
<script>
 $(function() {
    $( "#application_date" ).datepicker(
{dateFormat :'yy-mm-dd'}
      );
  });
</script>
<script>
 $(function() {
    $( "#Confirmation_date" ).datepicker(
{dateFormat :'yy-mm-dd'}
      );
  });
</script>