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
                        <h4><i class="icon-reorder"></i>List  Association</h4>
                    </div>

                                    <div class="btn-group">
                                    <a href="<?php echo site_url('admin/add_new_assocition'); ?>">
                                        <button id="" class="btn btn-warning">
                                            Add Association <i class="icon-plus"></i>
                                        </button>
                                    </a>
                                </div>

                    



                    <div style="margin:20px; padding:10px; background:#EEE; width:500px;">
                        <label name="frpa" id="frpa" onclick="getdata();"><b>FRAPA</b></label>
                    </div>

                    <div style="margin:20px; padding:10px; background:#EEE; width:500px;">
                        <label name="iftpc" id="iftpc" onclick="getiftpc();" ><b>IFTPC</b></label>
                    </div>
                   

                    <div style="margin:20px; padding:10px; background:#EEE; width:500px;">
                        <label name="fwa" id="fwa"onclick="getfwa();"><b>FWA</b></label>
                    </div>

                    <div style="margin:20px; padding:10px; background:#EEE; width:500px;">
                        <label name="copyright" id="copyright" onclick="getcopyright();"><b>CopyRight</b></label>
                    </div>

                    <div style="margin:20px; padding:10px; background:#EEE; width:500px;">
                        <label name="ipr" id="ipr" onclick="getipr();"><b>Trademark</b></label>
                    <!-- </div>
                       <div style="margin:20px; padding:10px; background:#EEE; width:500px;">
                        <label name="copyright" id="copyright" onclick="getcopyright();"><b>CopyRight</b></label>
                    </div> -->
                     <?php foreach($result as $value) { ?>
                   <div style="margin:20px; padding:10px; background:#EEE; width:500px;">
                       
                        <label><b><?php echo $value['associations_title'];?></b></label>

                       
                    </div>
                     <?php } ?>


                  <!--   <div class="widget-body">
                        <div class="portlet-body">
                            <div class="clearfix">

                                <!-- <div class="btn-group">
                                    <a href="<?php echo site_url('admin/add_titleregistration'); ?>">
                                        <button id="" class="btn btn-warning">
                                           Registration<i class="icon-plus"></i>
                                        </button>
                                    </a>
                                </div> -->
                               
                            </div>
                                <div id="getipr"></div>
    <div id="getResult"></div>
    <div id="getiftpc"></div>
    <div id="getfwa"></div>
<!--     <div id="ipr"></div> -->
                            
                          <!--   <div class="space15"></div>
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

                       
                           
                        </div>
                    </div> --> 
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

<script>
function getdata()
{
    // alert("hii");
var frpa =$('#frpa').val();
$.ajax({
      url :'<?php echo site_url(); ?>/admin/show_frpa_detail',
      type : 'POST',
      data : {'frpa':frpa,"noheader":"1"},
      success : function(msg)
      {
        $('#getResult').html(msg);
      },
      error : function(msg)
      {
        alert("error");
      }


});
return false;
}
</script>
<script>
function getiftpc()
{
    var iftpc= $('#iftpc').val();

    $.ajax({

        url :'<?php echo site_url();?>/admin/show_iftpcdetail',
        type :'pOST',
        data :{'iftpc':iftpc,"noheader":"1"},
        success: function(msg)
        {
            $('#getResult').html(msg);
        }    


    });
    return false;
}
</script>
<script>
function getfwa()
{
    var fwa= $('#fwa').val();
    $.ajax({

        url :'<?php echo site_url();?>/admin/show_getfwa_details',
        type : 'POST',
        data :{'fwa':fwa,"noheader":"1"},
        success: function(msg)
        {
            $('#getResult').html(msg);
        }


    });
    return false;
}

</script>
<script>
function getipr()
{
var ipr=$('#ipr').val();
$.ajax({
url :'<?php echo site_url();?>/admin/show_ipr_details',
type : 'POST',
data : {'ipr':ipr,"noheader":"1"},
success:function(msg)
{
    $('#getResult').html(msg);
}


});
return false;
}
</script>
<script>
function getcopyright()
{
var copyright= $('#copyright').val();
$.ajax({
    url :'<?php echo site_url(); ?>/admin/show_copyright_details',
    type: 'POST',
    data :{'copyright':copyright,"noheader":"1"},
    success: function(msg)
    {
        $('#getResult').html(msg);
    }
   

});
return false;
}
</script>