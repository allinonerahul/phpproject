<?php $writer_1 = $result[0]['writer']; ?>

 <a style="margin-top:22px;" class="btn btn-primary" href="<?php echo site_url() ?>/admin/export_to_excel_writer?writer=<?php echo $writer_1; ?>">Export to Excel</a>
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
                                <th style="width:8px">IFTPC Registration Code</th>
                                <th style="width:8px">IFTPC Registration Date</th>
                                <th style="width:8px">IFTPC Expiry Date</th>
                                <th style="width:8px">FWA Registration Code</th>
                                <th style="width:8px">FWA Registration Date</th>
                                <th style="width:8px">FWA Expiry Date</th>
                                <th style="width:8px">IPR Registration Code</th>
                                <th style="width:8px">IPR Registration Date</th>
                                <th style="width:8px">IPR Expiry Date</th>
                                <th style="width:8px">Action</th>
                              </tr>


                              <?php $sr=1; foreach($result as $val){ 

// echo '<pre>';
// print_r($genere);

                                ?>
                          <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                <td><?php echo $val['title']; ?></td>
                                <td><?php echo $val['category']; ?></td>
                                <td><?php echo $val['genre']; ?></td> 
                                <td><?php echo $val['writer']; ?></td> 
                                <td style="width:200px"><?php echo $val['discription']; ?></td>
                                <td><?php echo $val['frapa_reg_code']; ?></td>

                                 <td><?php $date=date_create($val['frapa_reg_date']);
                                echo date_format($date,"d-m-y");?></td>
                                 <td><?php $date=date_create($val['frapa_exp_date']);
                                echo date_format($date,"d-m-y");?></td>
                               
                                
                                <td><?php echo $val['tm_reg_code']; ?></td>

                                <td><?php $date=date_create($val['tm_reg_date']);
                                echo date_format($date,"d-m-y");?></td>
                               <td><?php $date=date_create($val['tm_exp_date']);
                                echo date_format($date,"d-m-y");?></td>
                                
                                <td><?php echo $val['fwa_reg_code']; ?></td>

                                <td><?php $date=date_create($val['fwa_reg_date']);
                                echo date_format($date,"d-m-y");?></td>
                             <td><?php $date=date_create($val['fwa_exp_date']);
                                echo date_format($date,"d-m-y");?></td>
                               

                                <td><?php echo $val['cr_reg_code']; ?></td>

                                <td><?php $date=date_create($val['cr_reg_date']);
                                echo date_format($date,"d-m-y");?></td>
                           
                               <td><?php $date=date_create($val['fwa_exp_date']);
                                echo date_format($date,"d-m-y");?></td>
                              
                       <td><a class="btn btn-warning" href="<?php echo site_url();?>/admin/edit_title_registration/<?php echo $val['registration_id']?>">Edit</a>
    <a class="btn btn-danger" href="<?php echo site_url();?>/admin/delete_title_registration/<?php echo $val['registration_id']?>">Delete</a></td>
                              </tr>
                              <?php $sr++; } ?>
                            </table>                                    