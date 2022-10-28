<?php session_start(); ?>
<?php require_once 'front_panel/head.php' ?>
<title>Home</title>
<?php require_once 'front_panel/side-header.php' ?>
<?php global $url ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                </ol>
            </nav>

            <div class="">
                <div class="dropdown mb-4 text-right d-flex justify-content-end">
                    <button class="btn btn-primary dropdown-toggle feather-calendar" type="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Sort news
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item feather-list" href="">
                                Default</a></li>
                        <li><a class="dropdown-item feather-arrow-down-circle" href="?orderBy=created_at&orderType=asc">
                                Oldest to Newest</a></li>
                        <li><a class="dropdown-item feather-arrow-up-circle" href="?orderBy=created_at&orderType=desc">
                                Newest to Oldest</a></li>
                    </ul>
                </div>
                <?php
                if (isset($_GET['orderBy']) && isset($_GET['orderType'])) {
                    $orderBy = $_GET['orderBy'];
                    $orderType = strtoupper($_GET['orderType']);
                    $posts = fPosts($orderBy, $orderType);
                } else {
                    $posts = fPosts();
                }
                foreach ($posts as $p) {
                include 'single_post.php' ;
                }
                ?>
            </div>
        </div>
        <?php require_once "right_sidebar.php"; ?>
    </div>
</div>


<?php require_once 'front_panel/foot.php' ?>