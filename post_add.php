<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>
                        <?php
                           
                           if (isset($_POST['addPostBtn'])) {
                                 post_add();
                              }
                        
                        ?>
               <form method="post" class="row">
                        <div class="col-12">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb bg-white p-2">
                                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">
                                     <a href="post_list.php">Post</a>
                                  </li>
                                  <li class="breadcrumb-item active" aria-current="page">Add Post</li>
                                </ol>
                              </nav>
                        </div>
                        <div class="col-12 col-md-8">
                              <div class="card">
                                       <div class="card-header">
                                          <div class="d-flex justify-content-between align-items-center">
                                                   <h5 class="fw-bolder m-0"><i data-feather="plus-circle" class="text-info me-3"></i> Add Post</h5>
                                                   <a href="post_list.php">
                                                      <i data-feather="list" class="text-info"></i>
                                                   </a>
                                          </div>
                                       </div>
                                       <div class="card-body">
                                                <div class="my-3">
                                                   <label for="" class="my-1 text-secondary">Post Title</label>
                                                   <input autofocus type="text" class="form-control" name="title" required>
                                                </div>

                                                <div class="mt-3">
                                                   <label for="" class="my-1 text-secondary">Post Description</label>
                                                   <textarea name="description" id="summernote" class="form-control"></textarea>
                                                </div>
                                       </div>
                              </div>
                        </div>

                        <div class="col-12 col-md-4">
                           <div class="card">
                              <div class="card-header">
                                 <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bolder m-0"><i data-feather="layers" class="text-info me-3"></i> Select Category</h5>
                                    <a href="post_list.php">
                                       <i data-feather="list" class="text-info"></i>
                                     </a>
                                 </div>
                              </div>
                              <div class="card-body">
                                 <div class="mt-3">
                                    <label for="" class="my-1 text-secondary">Choose Category</label>
                                       <?php
                                          foreach (categories() as $c){
                                          ?> 
                                    <div class="form-check">
                                       <input class="form-check-input" type="radio" value="<?php echo $c['id']; ?>" name="category_id" id="flexRadioDefault<?php echo $c['id'] ?>">
                                       <label class="form-check-label" for="flexRadioDefault<?php echo $c['id'] ?>">
                                          <?php echo $c['title']; ?>
                                       </label>
                                    </div>
                                    <?php
                                       }
                                    ?>
                                    <div class="mt-3">
                                       <button type="submit" name="addPostBtn" class="btn btn-info text-light fw-bolder">Add Post</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
              </form>

<?php include "template/footer.php" ?>
<script>
    $(document).ready(function() {
      $('#summernote').summernote({
        tabsize: 2,
        height: 200
      });
    });
  </script>
