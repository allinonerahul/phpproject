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
                              <!--   <th style="width:8px">Action</th> -->
                             <!--    <th style="width:5px">Action</th> -->
                              </tr>
                              <?php $sr=1; foreach($result as $val){ //echo '<pre>';

                                // print_r($result);
                              ?>
                              <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                <td><?php echo $val['showname'] ?></td>
                                <td><a href="<?php echo base_url();?>/broadstory/<?php echo $val['broadstory'] ?>"><?php echo $val['broadstory'];?></a></td>
                                <td><a href="<?php echo base_url();?>/story/<?php echo $val['story'] ?>"><?php echo $val['story']; ?></a></td>
                                <td><a href="<?php echo base_url();?>/characdetails/<?php echo $val['characdetails'];?>"><?php echo $val['characdetails'];?></a></td>
                                <td><a href="<?php echo base_url();?>/detail_brod_story/<?php echo $val['detail_brod_story']; ?>"><?php echo $val['detail_brod_story'];?></a></td>
                                <td><a href="<?php echo  base_url();?>/showpresentation/<?php echo $val['showpresentation'] ?>"><?php echo $val['showpresentation'];?></td>
                                <td><?php if($val['image']){?><img width="70px" src="<?php echo base_url();?>image/<?php echo $val['image'];?>"></img><?php } ?></td>
                       <!--  <td><a class="btn btn-warning" href="<?php echo site_url();?>/admin/edit_show_details/<?php echo $val['show_id']?>">Edit</a>
    <a class="btn btn-danger" href="<?php echo site_url();?>/admin/delete_show_detail/<?php echo $val['show_id'];?>">Delete</a></td>  -->
                              </tr>
                              <?php $sr++; } ?>
                            </table>
                            