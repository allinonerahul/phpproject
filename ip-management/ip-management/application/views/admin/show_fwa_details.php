<table class="table table-bordered">
                              <tr>
                                <th style="width:8px">SRNo</th>
                                <th style="width:8px">Title</th>
                                <th style="width:8px">FWA Registration Code</th>
                                <th style="width:8px">FWA Registration Date</th>
                              <!--   <th style="width:8px">FWA Expiry Date</th> -->
                              </tr>
                              <?php $sr=1; foreach($result as $val) {

                                if($val['fwa_reg_code'] ==''){
                                    continue;
}
                               ?>
                          <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                <td><?php echo $val['title'];?></td>
                                <td><?php echo $val['fwa_reg_code']; ?></td>
                              <!--   <td><?php echo $val['fwa_reg_date']; ?></td>
 -->


                               <td> <?php
                                      $date=date_create($val['fwa_reg_date']);
                                        echo date_format($date,"d-m-y");
                                        ?></td>
                               <!--  <td><?php echo $val['fwa_exp_date']; ?></td> -->
                           <!--      <td><?php echo $val['title'];?></td> -->

                                
                          </tr>
                              <?php $sr++; } ?>
      </table>                                                    