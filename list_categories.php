<table class="table table-bordered text-center bg-light mt-4 table-hover">
                                 <thead class="bg-info text-light">
                                    <tr>
                                       <th>ID</th>
                                       <th>NAME</th>
                                       <th>USER</th>
                                       <th>CONTROL</th>
                                       <th>CREATED</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                       <?php 
                                       
                                          foreach (categories() as $cat) {

                                       ?>

                                          <tr class="<?php echo $cat['ordering']==1?'table-danger':'' ?>">
                                             <td><?php echo $cat['id'] ?></td>
                                             <td><?php echo $cat['title'] ?></td>
                                             <td><?php echo user($cat['user_id'])['name']; ?></td>
                                             <td>
                                                <a class="btn btn-sm btn-warning text-light" href="edit.php?id=<?php echo $cat['id'] ?>"><i data-feather="edit"></i></a>
                                                <a onclick="return confirm(`Sure To Delete This Name '<?php echo $cat['title'] ?>'`)" class="btn btn-sm btn-outline-danger" href="del.php?id=<?php echo $cat['id'] ?>"><i data-feather="trash"></i></a>
                                                <?php if ($cat['ordering']!=1) {?>
                                                <a class="btn btn-sm btn-outline-success" href="pinTo_category.php?id=<?php echo $cat['id'] ?>"><i data-feather="arrow-up"></i></a>
                                                <?php } else {
                                                   ?>
                                                <a class="btn btn-sm btn-outline-success" href="pinToDel_category.php?id=<?php echo $cat['id'] ?>"><i data-feather="arrow-down"></i></a>
                                                   
                                                <?php
                                                }?>
                                             </td>

                                             <td><?php echo showTime("d-m-y",strtotime($cat['created_at']))?> </td>

                                          </tr>

                                       <?php
                                          }
                                       
                                       ?>
                                 </tbody>
                           </table>
