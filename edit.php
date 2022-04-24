<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>

               <div class="row">
                        <div class="col-12">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb bg-white p-2">
                                  <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                  <li class="breadcrumb-item active" aria-current="page">Category</li>
                                </ol>
                              </nav>
                        </div>
                        <div class="col-12 col-md-9">
                           <?php

                              $id = $_GET['id'];
                              $catname = category($id);

                              if (isset($_POST['upBtn'])) {
                                 category_up();
                                 }
                           
                           ?>
                           <form action="#" method="post">
                                 <div class="card">
                                       <div class="card-header">
                                          <div class="d-flex justify-content-between align-items-center">
                                                <h5 class="fw-bolder m-0"><i data-feather="layers" class="text-info me-3"></i> Edit Category</h5>
                                          </div>
                                       </div>
                                       <div class="card-body">
                                             <div class="row">
                                                <div class="col">
                                                   <input value="<?php echo $id ?>" autofocus type="hidden" class="form-control" name="id" required>
                                                   <input value="<?php echo $catname['title'] ?>" type="text" class="form-control" name="title" required>
                                                </div>
                                                <div class="col">
                                                   <button type="submit" class="btn btn-info text-light fw-bolder px-3" name="upBtn">Update</button>
                                                </div>
                                             </div>
                                       </div>
                                 </div>
                           </form>
                           <?php include "list_categories.php" ?>

                        </div>
              </div>

<?php include "template/footer.php" ?>
