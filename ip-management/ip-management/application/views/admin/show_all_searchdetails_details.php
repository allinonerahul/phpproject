

<?php $title_1 =$result[0]['title'];?>

<a style="margin-top:22px;" class="btn btn-primary" href="<?php echo site_url() ?>/admin/export_to_excel_title?title=<?php echo $title_1; ?>">Export to Excel</a>
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
                                
                                <th style="width:8px">Trademark Image</th>
                                <th style="width:8px">Trademark Status</th>
                                <th style="width:8px">Copyright Diary no</th>
                                <th style="width:8px"> Copyright application Date </th>
                                <th style="width:8px">Copyright Reg_diary_no</th>
                                <th style="width:8px">Copyright confirmation Date</th>
                                
                                  
                              
                              <!--   <th style="width:8px">Action</th> -->
                              </tr>


                              <?php $sr=1; foreach($result as $val){ 

// echo '<pre>';
// print_r($result);

                                ?>
                          <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                <td><?php echo $val['title']; ?></td>
                                <td><?php echo $val['category']; ?></td>
                                <td><?php echo $val['genre']; ?></td> 
                                <td><?php echo $val['writer']; ?></td> 
                                <td width="30%"><?php echo $val['discription']; ?></td>
                                <td><?php echo $val['frapa_reg_code']; ?></td>

                                <td> <?php
                                      $date=date_create($val['frapa_reg_date']);
                                        echo date_format($date,"d-m-y");
                                        ?></td>

                               <td> <?php
                                      $date=date_create($val['frapa_exp_date']);
                                        echo date_format($date,"d-m-y");
                                        ?></td>
                               

                                <td><?php echo $val['tm_reg_code']; ?></td>
                                 <td> <?php
                                      $date=date_create($val['tm_reg_date']);
                                        echo date_format($date,"d-m-y");
                                        ?></td>
                              
                              <td> <?php
                                      $date=date_create($val['tm_exp_date']);
                                        echo date_format($date,"d-m-y");
                                        ?></td>
                               

                                <td><?php echo $val['fwa_reg_code']; ?></td>
                                <td> <?php
                                      $date=date_create($val['fwa_reg_date']);
                                        echo date_format($date,"d-m-y");
                                        ?></td>

                                
                            <!--     <td><?php echo $val['fwa_exp_date']; ?></td> -->
                                <td><a href="<?php echo base_url();?>/concepts/<?php echo $val['concepts'];?>"><?php echo $val['concepts'];?></a></td>
<!-- <td><a href="<?php echo base_url();?>/detail_brod_story/<?php echo $val['detail_brod_story']; ?>"><?php echo $val['detail_brod_story'];?></a></td> -->
                                <td><?php echo $val['cr_reg_code']; ?></td>
                                <td><?php echo $val['cr_reg_date']; ?></td>
                                <td>
                                <?php if($val['image'] ) { ?>
                                <img src="<?php echo base_url();?>trademark_image/<?php echo $val['image'];?>">
                                <?php } ?></td>
                                <td><?php echo $val['status']; ?></td>
                                <td><?php echo $val['diaryno']; ?></td>


                                    <td> <?php
                                      $date=date_create($val['application_date']);
                                        echo date_format($date,"d-m-y");
                                        ?></td>


                                
                                <td><?php echo $val['reg_diary_no'];?></td>
                                <td> <?php
                                      $date=date_create($val['Confirmation_date']);
                                        echo date_format($date,"d-m-y");
                                        ?></td>

                                
                       <td><a class="btn btn-warning" href="<?php echo site_url();?>/admin/edit_title_registration/<?php echo $val['registration_id']?>">Edit</a>
    <a class="btn btn-danger" href="<?php echo site_url();?>/admin/delete_title_registration/<?php echo $val['registration_id']?>">Delete</a></td>
                              </tr>
                              <?php $sr++; } ?>
                            </table>                                                       
                    