<?php
require_once('template/core/auth.php');
?>
<?php
require_once 'template/header.php';
?>
<?php global $url?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/dashboard.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Category</li>
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
                    <a href="<?php echo $url;?>/item_list.php" class="feather-list btn btn-outline-primary"></a>
                </div>
                <hr>

                <?php 
                    $id=$_GET['id'];
                    if(isset($_POST['updateCategory'])){
                        if(categoryUpdate()){
                            linkTo('category_add.php');
                        };
                    }
                ?>

                <form action="#" method="post">
                    <div class="d-flex">
                        <div class="form-inline">
                            <input type="text" name="id" hidden value="<?php echo category($id)['id'];?>">
                            <input type="text" class="form-control mr-2" name="title"
                                value="<?php echo category($id)['title'];?>">
                        </div>
                        <button class="btn btn-primary" name='updateCategory'>Update category</button>
                    </div>

                </form>

                <?php include "category_list.php"; ?>

            </div>
        </div>
    </div>
</div>

<?php
include 'template/footer.php';
?>