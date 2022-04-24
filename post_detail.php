<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>
<?php 
   $id = $_GET['id'];
   $current = post($id); 
?>


<div class="row">
   <!-- post details -->
      <div class="col-12">
               <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                     <ol class="breadcrumb bg-white p-2">
                        <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Post</li>
                        <li class="breadcrumb-item active" aria-current="page">
                           <?php
                              echo category($current['category_id'])['title'];
                           ?>
                        </li>
                     </ol>
               </nav>
            </div>
      <div class="col-12 col-md-6">
         <div class="card">
               <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                      <h5 class="fw-bolder m-0"><i data-feather="info" class="text-info me-3"></i>Post Details</h5>
                      <a href="post_add.php">
                         <i data-feather="plus-circle" class="text-info"></i>
                      </a>
                  </div>
               </div>
               <div class="card-body">
                  <h4 class="fw-bolder">
                     <?php echo post($id)['title']; ?>
                  </h4>
                  <div class="my-3">
                     <i data-feather="user" class="text-info mb-2"></i>
                     <?php echo user($current['user_id'])['name'] ?>
                     <i data-feather="layers" class="text-success mb-2"></i>
                     <?php echo category($current['category_id'])['title']; ?>
                     <i data-feather="calendar" class="text-secondary mb-2"></i>
                     <?php echo showTime("j-M-Y h:i a", strtotime($current['created_at'])) ?>
                  </div>
                  <?php echo html_entity_decode($current['description']) ?>
               </div>
         </div>
      </div>
   <!-- viewers -->
      <div class="col-12 col-md-6">
         <div class="card">
               <div class="card-header">
                  <div class="d-flex justify-content-between align-items-center">
                      <h5 class="fw-bolder m-0"><i data-feather="eye" class="text-info me-3"></i>Viewer</h5>
                      <div class="text-info">
                        <button href="#" class="btn btn-sm btn-outline-info full-btn">
                           <img src="assets/vendor/img/maximize-2.svg">
                        </button>

                      </div>
                  </div>
               </div>
               <div class="card-body">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Who</th>
                           <th>Device</th>
                           <th>Created</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach (viewerPost($id) as $v) {
                           ?>
                           <tr>
                              <td class="text-nowrap text-capitalize"><?php 
                                 if ($v['user_id']==0) {
                                    echo "guest";
                                 }else {
                                    echo user($v['user_id'])['name'];
                                 }

                              ?></td>
                              <td><?php echo $v['device'] ?></td>
                              <td><?php echo showTime("y-m-d",strtotime($v['created_at']))  ?></td>
                           </tr>
                        <?php
                        } ?>
                     </tbody>
                  </table>
               </div>
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
