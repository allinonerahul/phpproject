   <table class="table table-bordered">
                              <tr>
                                <th style="width:3%;">SRNo</th>
                                <th width="5%">IFTPC Title</th>
                                <th width="5%">IFTPC Registration Name</th>
                                <th width="5%">IFTPC Registration Date</th>
                                <th width="5%">IFTPC Expiry Date</th>
                              </tr>
                              <?php $sr=1; foreach($result as $val) {

                                if( $val['tm_reg_code'] ==''){
                                
                                  continue;
                                }

                               ?>
                          <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                               <td><?php  echo $val['title'];?></td>
                                <td><?php echo $val['tm_reg_code']; ?></td>
                               <!--  <td><?php echo $val['tm_reg_date']; ?></td>
 -->


                               <td> <?php
                                      $date=date_create($val['tm_reg_date']);
                                      echo date_format($date,"d-m-y"); ?></td>



                               <!--  <td><?php echo $val['tm_exp_date']; ?></td -->

                                         <td> <?php
                                      $date=date_create($val['tm_exp_date']);
                                      echo date_format($date,"d-m-y"); ?></td>


                               <!--  <th><?php echo $val['title'];?></td> -->

                                
                          </tr>
                              <?php $sr++; } ?>
      </table>                                                    