  <table class="table table-bordered">
                              <tr>
                                
                                <th style="width:8px">SRNo</th>
                                <th style="width:8px">Title</title>

                                <th style="width:8px">Diaryno</th>
                                <th style="width:8px">Application Date</th>
                                <th style="width:8px">RegisterDiaryNo</th>
                                 <th style="width:8px">Conformation Date</th>
                              </tr>


                              <?php $sr=1; foreach($result as $val) {


                                  if($val['reg_diary_no']=='')
                                  {
                                    continue;
                                  }

                               ?>
                          <tr>
                                <td style="width:5px"><?php echo $sr; ?></td>
                                 
                                <td><?php echo $val['title']; ?></td>
                                <td><?php echo $val['diaryno']; ?></td>

                                <td><?php
                                    $date=date_create($val['application_date']);
                                    echo date_format($date,"d-m-y");
                                    ?></td>


                               <!--  <td><?php echo $val['application_date']; ?></td> -->
                                <td><?php echo $val['reg_diary_no']; ?></td>
                         <!--        <td><?php echo $val['Confirmation_date']; ?></td>   -->
                         <td><?php
                                    $date=date_create($val['Confirmation_date']);
                                    echo date_format($date,"d-m-y");
                                    ?></td>
                                
                          </tr>
                              <?php $sr++; } ?>
      </table>                                                    