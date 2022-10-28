<?php
require_once('template/core/auth.php');
?>
<?php include 'template/core/is_editor&admin.php'?>

<?php
require_once('template/header.php');
?>
<?php global $url?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <i class="feather-layers  text-primary h4 mr-2"></i>
                        <h4 class="mb-0">Category Manager</h4>
                    </div>
                    <a href="<?php echo $url;?>/category_list.php" class="feather-list btn btn-outline-primary"></a>
                </div>
                <hr>

                <?php 
                    if(isset($_POST['addCategory'])){
                        categoryAdd();
                    }
                ?>

                <form action="#" method="post">
                    <div class="d-flex justify-content-between">
                        <div class="form-inline">
                            <input type="text" class="form-control mr-2" name="title">
                        </div>
                        <div class="">
                            <button class="btn btn-primary" name='addCategory'>Add category</button>
                            <a href="#" class="feather-maximize-2 btn btn-outline-secondary full-screen-btn"></a>

                        </div>
                    </div>
                </form>
                <hr>
                <?php include "category_list.php"; ?>
            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>