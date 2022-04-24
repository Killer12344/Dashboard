<div class="col-12 col-lg-3 col-xl-2 left-side vh-100">
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <div class="d-flex text-info">
                        <i class="bg-info w-100 text-light rounded rounded-2 me-2" data-feather="home"></i>
                        <span class="fw-bold h5 m-0 text-uppercase">MyShop</span>
                    </div>
                    <div>
                        <button class="btn btn-light hide-sidebar d-block d-md-block d-lg-none">
                            <i data-feather="x" class="text-info"></i>
                        </button>
                    </div>
                </div>
                <div class="menu">
                    <ul>
                        <li class="menu-item mt-4">
                            <a href="dashboard.php" class="menu-link ">
                                <span>
                                <i data-feather="database"class="me-2 text-info"></i>
                                    Dashboard
                                </span>
                            </a>
                            <a href="index.php" class="menu-link ">
                                <span>
                                <i data-feather="home"class="me-2 text-info"></i>
                                    Index
                                </span>
                            </a>
                            <a href="wallet.php" class="menu-link ">
                                <span>
                                <i data-feather="dollar-sign"class="me-2 text-info"></i>
                                    Wallet
                                </span>
                            </a>
                        </li>
                        <li class="menu-space"></li>
                    </ul>
                </div>
                <!-- Post Manager -->
                <div class="menu">
                    <ul>
                        <li class="menu-title ms-2">
                            Post Manager
                        </li>
                        <li class="menu-item">
                            <a href="post_add.php" class="menu-link d-flex">
                                <span>
                                <i data-feather="plus-circle"class="me-2 text-info"></i>
                                Add Post
                                </span>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="post_list.php" class="menu-link d-flex">
                                <span>
                                    <i data-feather="list"class="me-2 text-info"></i>
                                    Post List
                                </span>
                                <div class="badge bg-warning rounded rounded-pill">
                                    <?php 
                                        echo totalList("select * from `posts`");
                                    ?>
                                </div>
                            </a>
                        </li>
                        <li class="menu-space"></li>
                    </ul>
                </div>

                <?php if ($_SESSION['user']['role']<= 1) {
                    
                ?>

                <!-- Cat Manager -->
                <div class="menu">
                    <ul>
                        <li class="menu-title ms-2">
                            Category Manager
                        </li>
                        <li class="menu-item">
                            <a href="add_category.php" class="menu-link d-flex">
                                <span>
                                <i data-feather="tool"class="me-2 text-info"></i>
                                Category
                                </span>
                                <div class="badge bg-warning rounded rounded-pill">
                                    <?php 
                                        echo totalList("select * from `categories`");
                                    ?>
                                </div>
                            </a>
                        </li>

                        <li class="menu-space"></li>
                    </ul>
                </div>
                <!-- User Manager -->
                <div class="menu">
                    <ul>
                        <li class="menu-title ms-2">
                            User Manager
                        </li>
                        <li class="menu-item">
                            <a href="user_list.php" class="menu-link d-flex">
                                <span>
                                <i data-feather="users"class="me-2 m-0 text-info"></i>
                                    User
                                </span>
                                <div class="badge bg-warning rounded rounded-pill">
                                    <?php 
                                        echo totalList("select * from `users`");
                                    ?>
                                </div>
                            </a>
                        </li>

                        <li class="menu-space"></li>
                    </ul>
                </div>

                <?php
                } ?>
</div>
