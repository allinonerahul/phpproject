<link href="<?php echo base_url(); ?>css/admin/pages/dashboard.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url();?>/ckeditor/adapters/jquery.js"></script>
<!--<script type="text/javascript" src="<?php echo base_url();?>/ckfinder/ckfinder.js"></script>-->
<!-- BEGIN PAGE -->
<style type="text/css">
.title {
  background:#EEE;
  padding:10px;
  width: 470px;
  margin-bottom:20px;
}
</style>
<div id="main-content" style="width: 150%;"> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="container-fluid"> 
    <!-- BEGIN PAGE HEADER-->
    <div class="row-fluid">
      <div class="span12"> 
        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
        <ul class="breadcrumb">
          <li> <a href="<?php echo site_url('admin'); ?>"><i class="icon-home"></i></a><span class="divider"&nbsp;</span> </li>
          <!--  <!--   <li><a href="<?php echo site_url('admin/associations'); ?>"></a><span class="divider">&nbsp;</ -->
          </li>
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
              <h4><i class="icon-reorder"></i>show Details</h4>
            </div>
            <div class="widget-body"> 
              <!-- BEGIN FORM-->
              
              <div class="row-fluid">
                <div class="row-s">
                  <div class="col-md-4">
                    <div class="control-group">
                      <label class="control-label" >search By Show<font color="red"> *</font></label>
                      <div class="controls">
                        <select name="showname"  class="input-xlarge" id="showname" onChange="getshow(this.value)";>
                          <option>--SelectShow--</option>
                          <?php foreach($show as $value) {  



                                            ?>
                          <option value="<?php echo $value['show_id'];?>"><?php echo $value['showname'];?></option>
                          <?php } ?>
                        </select>


                        <div id="getResult"></div>
                      </div>
                    </div>
                  </div>
                  <!-- div class="col-md-4">
                    <div class="control-group">
                      <label class="control-label" >search By Genre<font color="red"> *</font></label>
                      <div class="controls">
                        <select name=" genre"  class="input-xlarge" id="genre" onChange="getshow()";>
                          <option>--SelectShow--</option>
                          <?php foreach($result as $value) { 

 ?>
                          <option value="<?php echo $value['registration_id'];?>"><?php echo $value['genre'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="control-group">
                      <label class="control-label" >search  By Category<font color="red"> *</font></label>
                      <div class="controls">
                        <select name=" category"  class="input-xlarge" id="category" onChange="getshow()";>
                          <option>--SelectCategory--</option>
                          <?php foreach($result as $value) { ?>
                          <option value="<?php echo $value['registration_id'];?>"><?php echo $value['category'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div                              
>
                <div class="row-s">
                  <div class="col-md-4">
                    <div class="control-group">
                      <label class="control-label" >search By Author<font color="red"> *</font></label>
                      <div class="controls">
                        <select name="writer"  class="input-xlarge" id="writer" onChange="getshow()";>
                          <option>--Selectwriter--</option>
                          <?php foreach($result as $value) { ?>
                          <option value="<?php echo $value['registration_id'];?>"><?php echo $value['writer'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="control-group">
                      <label class="control-label" >search By  Expiry<font color="red"> *</font></label>
                      <div class="controls">
                        <input type="text" name="exp_date"  class="input-xlarge" id="exp_date">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1">
                    <input type="button" onClick="getexpire();" value="submit" style="margin-top:30px;">
                    </button>
                  </div>
                </div> -->
              </div>
              
             <!--  <div id="getgenrdata"></div>
              <div id="categorydata"></div>
              <div id="getwriterdata"></div>
              <div id="expiredata"></div> -->
              
              <!--   <div class="form-actions">
                                    <button type="submit" class="btn btn-primary"> SUBMIT </button>
                                </div>
                            </form> --> 
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
function getshow(show_id)
{
// alert(show_id);
//var  datastring = "showname="+show_id;
// alert(datastring);
$.ajax({

      url : '<?php echo site_url();?>/admin/search_show_details',
      type : 'POST',
      data : {"showname":show_id, 'noheader':1},

     success: function(data){
       $('#getResult').html(data);
         

     },
     error: function(){
      alert('error');
     }

});
  
return false;
}


// </script> 
// <script>
// function getgenre(registration_id)
// {
//      // alert(id);

//      var datastring ="genre=" + registration_id+'&noheader=1';
//      // alert(datastring);
//      $.ajax({

//        url : '<?php echo site_url();?>/admin/serch_genre',
//        type : 'POST',
//        data : datastring,
//         success: function(msg) {
//                 $('#getResult').html(msg);
//             }
//         });
//         return false;
//  }

// </script> 
// <script>
// function getcategory(category_id)
// {
// var datastring ="category=" + category_id +'&noheader=1';
// $.ajax({

//       url :'<?php echo site_url();?>/admin/search_by_category',
//       type :'POST',
//       data :datastring,
//       success: function(msg){

//                $('#getResult').html(msg);

//       }
  

//   });
// return false;
// }


// </script> 
// <script>
// function getwriter(writer_id)
// {
//   // alert(writer_id);
 
  
//   var datastringg ="writer=" + writer_id +'&noheader=1';

//     $.ajax({

//   url :'<?php echo site_url();?>/admin/search_by_writer',
//   type: 'POST',
//   data : datastringg,
//   success: function(msg){

//     $("#getResult").html(msg);
//   }

// });
//   return false;
// }
// </script> 
// <script>

// function getexpire()
// {
//   var dateval =$('#exp_date').val();

//    $.ajax({

//   url :'<?php echo site_url();?>/admin/search_by_expire',
//   type: 'POST',
//   data : {'exp_date':dateval},
//   success: function(msg){

//     $("#getResult").html(msg);
//   }

// });
//   return false;

// } 

// </script> 
// <script>
//  $(function() {
//     $( "#exp_date" ).datepicker(
// {dateFormat :'yy-mm-dd'}
//       );
//   });

// </script>