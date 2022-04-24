<?php require_once "core/auth.php" ?>
<?php include "core/isAdmin.php" ?>
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
      <div class="col-12 col-md-8">
         <div class="card">
               <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                      <h5 class="fw-bolder m-0"><i data-feather="users" class="text-info me-3 mb-2"></i>User List</h5>

                  </div>
               </div>
            <div class="card-body">
            <table class="table table-bordered bg-light mt-4 table-hover text-center">
                                    
                                    <thead class="bg-info text-light text-center">
                                       <tr>
                                          <th>ID</th>
                                          <th>NAME</th>
                                          <th>EMAILL</th>
                                          <th>ROLE</th>
                                          <th>CREATED</th>
                                       </tr>
                                    </thead>
                                    <tbody>

                                       <?php 
                                          foreach (users() as $p) {
                                             ?>
                                             <tr>
                                                <td><?php echo $p['id'] ?></td>
                                                <td><?php echo $p['name']?></td>
                                                <td><?php echo $p['email'] ?></td>
                                                <td><?php echo $role[$p['role']] ?></td>
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
