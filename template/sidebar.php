<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar p-1">
    <div class="d-flex justify-content-between align-items-center py-2 mt-2 nav-brand">
        <div class="d-flex justify-content-between align-items-center">
            <span class="bg-primary p-2 rounded mr-1">
                <i class="feather-shopping-bag text-white h4"></i>
            </span>
            <h4 class="font-weight-bolder text-uppercase text-primary mb-0">MyShop</h4>
        </div>
        <button class="hide-sidebar-btn btn btn-light text-primary feather-x d-block d-lg-none" style="font-size:2em">
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <?php global $url?>
            <?php
            if($_SESSION['user']['role'] == 0){
            ?>
                <li class="menu-item ">
                    <a href="<?php echo $url; ?>/dashboard.php" class="menu-item-link">
                        <span class="feather-home">Dashboard</span>
                    </a>
                </li>
            <?php
            }
            ?>

            <li class="menu-item ">
                <a href="<?php echo $url; ?>/index.php" class="menu-item-link">
                    <span class="feather-arrow-right-circle"> Go To News</span>
                </a>
            </li>

            <li class="menu-spacer"></li>

            <li class="menu-title">
                <span>Manage Posts</span>
            </li>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/post_add.php" class="menu-item-link ">
                    <span class="feather-plus-circle">Add Post</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/post_list.php" class="menu-item-link">
                    <span class="feather-list w-75">Post List</span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary">
                        <?php
                        if ($_SESSION['user']['role'] == 2) {
                            echo count(posts());
                        }
                        else echo countTotal('posts');
                        ?>
                    </span>
                </a>
            </li>
            <li class="menu-spacer"></li>

            <?php
            if ($_SESSION['user']['role'] <= 1) {
            ?>
            <li class="menu-title">
                <span>Setting</span>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/category_add.php" class="menu-item-link ">
                    <span class="feather-layers">Category Manager</span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary">
                        <?php
                            echo countTotal('categories');
                            ?>
                    </span>
                </a>
            </li>
            <li class="menu-spacer"></li>
            <?php
                if ($_SESSION['user']['role'] == 0) {
                ?>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/user_list.php" class="menu-item-link">
                    <span class="feather-list w-75">User List</span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary">
                        <?php
                                echo countTotal('users');
                                ?>
                    </span>
                </a>
            </li>
            <li class="menu-spacer"></li>
            <?php
                }
                ?>

            <?php
            }
            ?>
            <?php
            if($_SESSION['user']['role'] == 0){
                ?>
                <li class="menu-item">
                    <a href="<?php echo $url; ?>/ads_add.php" class="menu-item-link ">
                        <span class="feather-plus-circle">Add Ads</span>
                    </a>
                </li>
                <?php
            }
            ?>

            <?php
            if($_SESSION['user']['role'] == 0){
                ?>
                <li class="menu-spacer"></li>
                <li class="menu-item">
                    <a href="<?php echo $url; ?>/payment_transfer.php" class="menu-item-link ">
                        <span class="feather-dollar-sign">Wallet</span>
                    </a>
                </li>
                <li class="menu-spacer"></li>
                <?php
            }
            ?>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/logout.php" class="menu-item-link btn btn-secondary w-100 text-light">
                    <span class="feather-lock">Log out</span>
                </a>
            </li>
        </ul>


    </div>

</div>