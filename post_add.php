<?php
include 'template/core/auth.php';
?>
<?php
include 'template/header.php';
?>
<?php global $url ?>


<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-white mb-4 py-3 ps-2">
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url;?>/post_list.php">Post</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Post</li>
            </ol>
        </nav>
    </div>
</div>
<?php
if(isset($_POST['addPostBtn'])){
    postAdd();
}

        ?>
<form class="row" method="post" enctype="multipart/form-data">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex">
                        <i class="feather-plus-circle  text-primary h4 mr-2"></i>
                        <h4 class="mb-0">Create New Posts</h4>
                    </div>
                    <a href="<?php echo $url;?>/post_list.php" class="feather-list btn btn-outline-primary"></a>
                </div>
                <hr>
                <div class="form-group">
                    <label for="">Post title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group mb-0">
                    <label for="description">Post description</label>
                    <textarea name="description" class="description" id="description" class="form-control"
                        rows="15"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex form-group">
                        <i class="feather-plus-circle  text-primary h4 mr-2"></i>
                        <h4 class="mb-0">Select Category</h4>
                    </div>
                    <a href="<?php echo $url;?>/category_add.php" class="feather-layers btn btn-outline-primary"></a>
                </div>
                <hr>
                <div class="form-group">
                    <?php foreach (categories() as $c){
                                ?>
                    <div class="form-check">
                        <input class="form-check-input" value="<?php echo $c['id']; ?>" type="radio" name="category_id"
                            id="category_id">
                        <label class="form-check-label" for="category_id">
                            <?php echo $c['title'] ?>
                        </label>
                    </div>
                    <?php } ?>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary" name="addPostBtn">Add post</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include 'template/footer.php';
?>