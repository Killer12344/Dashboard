<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>

<div class="row">
      <div class="col-12">
               <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb bg-white p-2">
                     <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Post</li>
                  </ol>
                  </nav>
            </div>
      <div class="col-12 col-md-12">
         <div class="card">
               <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                      <h5 class="fw-bolder m-0"><i data-feather="list" class="text-info me-3"></i>Post List</h5>
                      <a href="post_add.php">
                         <i data-feather="plus-circle" class="text-info"></i>
                      </a>
                  </div>
               </div>
         <div class="card-body">
            <table class="table table-bordered bg-light mt-4 table-hover">
                                    
                                    <thead class="bg-info text-light text-center">
                                       <tr>
                                          <th>ID</th>
                                          <th>NAME</th>
                                          <th class="text-uppercase">description</th>
                                          <?php if ($_SESSION['user']['role']==0) {
                                             ?>
                                          <th>USER</th>
                                             <?php
                                          } ?>
                                          <th>CATEGORY</th>
                                          <th>Viewer</th>
                                          <th>CONTROL</th>
                                          <th>CREATED</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                       <?php 
                                          foreach (posts() as $p) {
                                             ?>
                                             <tr>
                                                <!-- id -->
                                                <td><?php echo $p['id'] ?></td>
                                                <!-- title -->
                                                <td><?php echo short($p['title'])?></td>
                                                <!-- description -->
                                                <td><?php echo short(strip_tags(html_entity_decode($p['description']))); ?></td>
                                                   <?php if ($_SESSION['user']['role']==0) {
                                                      ?>
                                                <!-- userId -->
                                                <td><?php echo user($p['user_id'])['name']; ?></td>

                                                      <?php
                                                   } ?>
                                                <!-- category id -->
                                                <td><?php echo category($p['category_id'])['title']; ?></td>
                                                <!-- viewers -->
                                                <td><?php echo count(viewerPost($p['id'])) ?></td>
                                                <!-- control -->
                                                <td class="text-center d-flex nowrap">
                                                      <a class="btn btn-sm mx-1 btn-info text-light" href="post_detail.php?id=<?php echo $p['id'] ?>"><i data-feather="info"></i></a>
                                                      <a class="btn btn-sm mx-1 btn-warning text-light" href="post_edit.php?id=<?php echo $p['id'] ?>"><i data-feather="edit"></i></a>
                                                      <a onclick="return confirm(`Sure To Delete This Name '<?php echo $p['title'] ?>'`)" class="btn btn-sm mx-1 btn-outline-danger" href="post_del.php?id=<?php echo $p['id'] ?>"><i data-feather="trash"></i></a>
                                                </td>
                                                <!-- created_at -->
                                                <td><?php echo showTime("y-m-d",strtotime($p['created_at'])) ?></td>
                                             </tr>
                                             <?php
                                          }
                                       ?>
                                    </tbody>
            </table>
         </div>
      </div>
   </div>
</div>



<?php include "template/footer.php" ?>
<script>
    $('.table').DataTable( {
        "order": [[ 0, "desc" ]]
    } );
</script>
