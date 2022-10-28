<?php require_once 'front_panel/head.php' ?>
<title>Home</title>
<?php require_once 'front_panel/side-header.php' ?>
<?php global $url?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                    <li class="breadcrumb-item"><a href="<?php echo $url;?>/index.php">Home</a></li>
                    <li class="breadcrumb-item"><?php echo category($_GET['category_id'])['title'] ?></li>
                </ol>
            </nav>
            <div class="">

                <?php 
                    foreach(fPostByCategory($_GET['category_id']) as $p){
                        ?>
                <?php include 'single_post.php';?>
                <?php
                    }
                ?>

            </div>
        </div>
        <?php require_once "right_sidebar.php"; ?>
    </div>
</div>


<?php require_once 'front_panel/foot.php' ?>