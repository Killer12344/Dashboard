            <div class="col-12 col-md-4">
                <div class="position-sticky" style="top: 0px; overflow-y: scroll; height: 600px;">
                    <div class="card">
                        <div class="card-body">
                            <?php if (isset($_SESSION['user']['id'])) {?>
                                <h4 class="fw-bolder">
                                    Hi <?php echo $_SESSION['user']['name'] ?>
                                </h4>
                                <a class="btn btn-outline-primary" href="dashboard.php">
                                    Go To Dashboard
                                </a>
                                <?php }else{ ?>
                                    <h4 class="fw-bolder">
                                        Guest
                                    </h4>
                                    <a class="btn btn-outline-primary" href="register.php">
                                        Register
                                    </a>
                                        OR  
                                    <a class="btn btn-outline-primary px-4" href="login.php">
                                        Login
                                    </a>
                                <?php } ?>

                        </div>
                    </div>
                    <h3 class="fw-bolder my-2">Category</h3>
                    <div class="list-group">
                                <a href="index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['cat_id'])? '' : "active" ?>">
                                    All Category
                                </a>
                        <?php 
                            foreach (fCategories() as $c) {
                                ?>
                                 <a href="showCategory.php?cat_id=<?php echo $c['id'] ?>" class="list-group-item list-group-item-action <?php echo isset($_GET['cat_id'])? $_GET['cat_id']==$c['id']?"active" :'': "" ?>">
                                    <?php if ($c['ordering']==1) {
                                        ?>
                                            <i data-feather="paperclip" class="text-primary"></i>
                                        <?php
                                    } ?>
                                    <?php echo $c['title'] ?>
                                 </a>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="mb-3">
                        <h3 class="my-2 fw-bolder">Ads</h3>
                        <img src="assets/vendor/img/google-green-ad-button-1920.png" class="img-fluid" alt="">  
                    </div>
                    <form action="search-by-date.php" method="post">
                            <input type="date" class="form-control mb-3" name="start">
                            <input type="date" class="form-control mb-3" name="end">
                            <button class="btn btn-primary">Search</button>
                    </form>
                </div>
            </div>