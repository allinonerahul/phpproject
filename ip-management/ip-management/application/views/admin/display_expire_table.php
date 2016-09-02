    <table class="table table-bordered">
                              <tr>
                                <th style="width:5px">Sr no.</th>
                                <th style="width:5px" >Domain Name</th>
                                <th style="width:50px">Registrar</th>
                                <th style="width:8px">Registered Email</th>
                                <th style="width:8px">Registered Contact</th>
                                <th style="width:8px">Registered Date </th>
                                <th style="width:8px">Registration Expiry</th>
                                <th style="width:8px">Hosting Company</th>
                               <th style="width:8px">Action</th>
                              </tr>
                              <?php $sr=1; foreach($expire_data as $val){ ?>
                              <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                <td><?php echo $val['domanin_name'] ?></td>
                                <td><?php echo $val['register'] ?></td>
                                <td><?php echo $val['registeremail'] ?></td>
                                <td><?php echo $val['register_contect'] ?></td>

                                 <td><?php $date=date_create($val['reg_date']);
                                echo date_format($date,"d-m-y");?></td>

                                 <td><?php $date=date_create($val['exp_date']);
                                echo date_format($date,"d-m-y");?></td>
                               s
                                <td><?php echo $val['hosting_company'] ?></td>
 <td><a class="btn btn-warning" href="<?php echo site_url();?>/admin/edit_domain_registration/<?php echo $val['domain_id']?>">Edit</a>
    <a class="btn btn-danger" href="<?php echo site_url();?>/admin/delete_domain_registration/<?php echo $val['domain_id']?>">Delete</a></td>
                              </tr>
                              <?php $sr++; } ?>
                            </table>