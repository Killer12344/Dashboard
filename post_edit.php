<?php require_once "core/auth.php" ?>
<?php include "template/header.php" ?>

               <div class="row">
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
                        <?php

                           $id = $_GET['id'];
                           $postname = post($id);

                           if (isset($_POST['upPostBtn'])) {
                              post_up();
                              }

                           ?>
                           <form method="post">
                                 <div class="card">
                                       <div class="card-header">
                                          <div class="d-flex justify-content-between align-items-center">
                                                   <h5 class="fw-bolder m-0"><i data-feather="plus-circle" class="text-info me-3"></i>Update Post</h5>
                                                   <a href="post_list.php">
                                                      <i data-feather="list" class="text-info"></i>
                                                   </a>
                                          </div>
                                       </div>
                                       <div class="card-body">
                                                <div class="my-3">
                                                   <label for="" class="my-1 text-secondary">Post Title</label>
                                                   <input type="hidden" value="<?php echo $id ?>" name="id">
                                                   <input autofocus type="text" class="form-control" name="title" value="<?php echo $postname['title'] ?>" required>
                                                </div>
                                                <div class="my-3">
                                                   <label for="" class="my-1 text-secondary">Select Category</label>
                                                   <select name="category_id" class="form-select" name="category_id">
                                                      <?php
                                                         foreach (categories() as $c){
                                                      ?> 
                                                         <option value="<?php echo $c['id']; ?>" <?php echo $c['id']==$postname['category_id']?"selected":" " ?>><?php echo $c['title']; ?></option>
                                                      <?php
                                                         }

                                                      ?>
                                                   </select>
                                                </div>
                                                <div class="my-3">
                                                   <label for="" class="my-1 text-secondary">Post Description</label>
                                                   <textarea name="description" class="form-control" rows="10"><?php echo $postname['description'] ?></textarea>
                                                </div>
                                                <button type="submit" class="btn btn-info text-light fw-bolder px-3" name="upPostBtn">Update Post</button>
                                       </div>
                                 </div>
                           </form>
                        </div>
              </div>

<?php include "template/footer.php" ?>
