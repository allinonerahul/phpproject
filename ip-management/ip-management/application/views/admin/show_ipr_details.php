<table class="table table-bordered">
                              <tr>
                                <th width="5%">SRNo</th>
                                 <th width="5%">Title</th>
                                <th width="5%">Trademark Registration Code</th>
                                <th width="5%">Trademark Registration Date</th>
                                <th width="5%">Trademark Image</th>
                                <th width="5%">Trademark Status</th>
                              </tr>
                              <?php $sr=1; foreach($result as $val) {


                                     if($val['cr_reg_code']==''){
                                            continue;

                                     }


                               ?>
                          <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                <td><?php echo $val['title'] ?></td>
                                <td><?php echo $val['cr_reg_code']; ?></td>
                               <!--  <td><?php echo $val['cr_reg_date']; ?></td> -->


                            <td><?php
                                  $date=date_create($val['cr_reg_date']);
                                  echo date_format($date,"m-d-y");
                                  ?></td>

                                  <td>
                                   <?php  if($val['image']){ ?>
                                    <img width="100px"src="<?php echo base_url();?>/trademark_image/<?php echo $val['image'];?>"></img> 
                                     <?php } ?></td>
                                <td><?php echo $val['status']; ?></td>

                                
                          </tr>
                              <?php $sr++; } ?>
      </table>                                                    